<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Blog;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
  {
    public function index()
    {
      $urls = collect();

    $urls->push(['loc' => url('/'), 'priority' => '1.0', 'changefreq' => 'weekly']);
      $urls->push(['loc' => url('/about-us'), 'priority' => '0.8', 'changefreq' => 'monthly']);
      $urls->push(['loc' => url('/our-fleets'), 'priority' => '0.9', 'changefreq' => 'weekly']);
      $urls->push(['loc' => url('/contact'), 'priority' => '0.7', 'changefreq' => 'monthly']);
      $urls->push(['loc' => url('/gallery'), 'priority' => '0.6', 'changefreq' => 'monthly']);
      $urls->push(['loc' => url('/blogs'), 'priority' => '0.7', 'changefreq' => 'weekly']);
      $urls->push(['loc' => url('/term-and-conditions'), 'priority' => '0.3', 'changefreq' => 'yearly']);

    Product::where('status', 1)->get(['slug', 'updated_at'])->each(function ($product) use ($urls) {
      $urls->push([
                  'loc' => url('/fleet/' . $product->slug),
                  'priority' => '0.8',
                  'changefreq' => 'weekly',
                  'lastmod' => optional($product->updated_at)->toAtomString(),
                  ]);
    });

    Blog::where('status', 1)->get(['slug', 'updated_at'])->each(function ($blog) use ($urls) {
      $urls->push([
                  'loc' => url('/blog/' . $blog->slug),
                  'priority' => '0.6',
                  'changefreq' => 'monthly',
                  'lastmod' => optional($blog->updated_at)->toAtomString(),
                  ]);
    });

    $xml = view('front.sitemap', compact('urls'))->render();

    return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
    }
  }
