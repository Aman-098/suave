<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

/**
 * Injects width/height (and decoding="async") into <img> tags that lack them,
 * by reading the real file from public/. Reserves layout space before the image
 * loads, which is what Core Web Vitals measures as CLS.
 *
 * Safe here because the theme sets `img { height: auto }` globally, so the
 * attributes only supply the aspect ratio - CSS still controls rendered size.
 */
class AddImageDimensions
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (! $this->shouldProcess($request, $response)) {
            return $response;
        }

        $html = $response->getContent();

        if (! is_string($html) || $html === '') {
            return $response;
        }

        $patched = preg_replace_callback(
            '#<img\b[^>]*>#i',
            fn (array $m) => $this->patch($m[0]),
            $html
        );

        if ($patched !== null) {
            $response->setContent($patched);
        }

        return $response;
    }

    protected function shouldProcess(Request $request, Response $response): bool
    {
        if (! $request->isMethod('GET')) {
            return false;
        }

        if ($response->getStatusCode() !== 200) {
            return false;
        }

        if (! method_exists($response, 'getContent') || ! method_exists($response, 'setContent')) {
            return false;
        }

        return str_contains((string) $response->headers->get('Content-Type'), 'text/html');
    }

    protected function patch(string $tag): string
    {
        $hasWidth  = (bool) preg_match('/\swidth\s*=/i', $tag);
        $hasHeight = (bool) preg_match('/\sheight\s*=/i', $tag);

        if ($hasWidth && $hasHeight) {
            return $tag;
        }

        if (! preg_match('/\ssrc\s*=\s*["\']([^"\']+)["\']/i', $tag, $m)) {
            return $tag;
        }

        $dims = $this->dimensions($m[1]);

        if (! $dims) {
            return $tag;
        }

        $extra = '';

        if (! $hasWidth) {
            $extra .= ' width="' . $dims[0] . '"';
        }

        if (! $hasHeight) {
            $extra .= ' height="' . $dims[1] . '"';
        }

        if (! preg_match('/\sdecoding\s*=/i', $tag)) {
            $extra .= ' decoding="async"';
        }

        return rtrim(substr($tag, 0, -1), " /\t\n") . $extra . '>';
    }

    /** @return array{0:int,1:int}|null */
    protected function dimensions(string $src): ?array
    {
        $host = parse_url($src, PHP_URL_HOST);

        if ($host !== null && $host !== parse_url((string) config('app.url'), PHP_URL_HOST)) {
            return null;
        }

        $path = parse_url($src, PHP_URL_PATH);

        if (! is_string($path) || $path === '') {
            return null;
        }

        if (str_ends_with(strtolower($path), '.svg')) {
            return null;
        }

        $cached = Cache::get('imgdim:' . $path, false);

        if ($cached !== false) {
            return $cached ?: null;
        }

        $file = public_path(ltrim(urldecode($path), '/'));
        $dims = null;

        if (is_file($file)) {
            $size = @getimagesize($file);

            if ($size && $size[0] > 0 && $size[1] > 0) {
                $dims = [$size[0], $size[1]];
            }
        }

        Cache::put('imgdim:' . $path, $dims ?? 0, now()->addDays(30));

        return $dims;
    }
}
