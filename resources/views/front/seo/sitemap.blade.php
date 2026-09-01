<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach(($hubs ?? []) as $hub)
    <url>
        <loc>{{ $hub['loc'] }}</loc>
        <lastmod>{{ $hub['lastmod'] }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
@endforeach
@foreach($pages as $page)
    <url>
        <loc>{{ url('/' . ltrim($page->url_path, '/')) }}</loc>
        <lastmod>{{ optional($page->updated_at)->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>{{ $priority[$page->type] ?? '0.7' }}</priority>
    </url>
@endforeach
</urlset>
