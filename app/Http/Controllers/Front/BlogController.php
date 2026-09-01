<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
    {
        public function index(){
            $blogs=Blog::where('status',1)->get();

        $recentBlogs = Blog::where('status', 1)
            ->latest()
            ->take(3)
            ->get();
            return view('front.blogs',compact('blogs','recentBlogs'));
        }

public function blog_detail($slug){

        $blog = Blog::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        $recentBlogs = Blog::where('status', 1)
            ->latest()
            ->take(3)
            ->get();

        $title = ucfirst($blog->title);
        // A subtitle after a colon is the first thing worth dropping.
        $short = $title;
        if (str_contains($title, ':')) {
            $before = trim(Str::before($title, ':'));
            if (strlen($before) >= 20) { $short = $before; }
        }
        if (strlen($short) <= 52) {
            $metaTitle = $short . ' | Suave';       // room for the brand
        } elseif (strlen($short) <= 60) {
            $metaTitle = $short;                    // fits as-is, do not cut
        } else {
            $metaTitle = rtrim(preg_replace('/\s+\S*$/', '', substr($short, 0, 58)), " ,:-");
        }
    $metaDescription = Str::limit(strip_tags($blog->description), 155, '...');
    if (empty(trim($metaDescription))) {
        $metaDescription = 'Read the latest news, guides and stories from SUAVE Executive Travel, London supercar and luxury car rental specialists.';
    }

$haystack = $blog->title . ' ' . strip_tags($blog->description);
        $relatedVehicles = \App\Models\Product::where('status', 1)->get(['id', 'name', 'slug'])
            ->filter(fn ($p) => strlen($p->name) >= 6 && stripos($haystack, $p->name) !== false)
            ->take(3)->values();

        return view('front.blog-detail', compact('blog', 'recentBlogs', 'relatedVehicles', 'metaTitle', 'metaDescription'));
}
    }
