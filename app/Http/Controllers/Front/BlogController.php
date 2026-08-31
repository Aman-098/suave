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

        $metaTitle = ucfirst($blog->title) . ' | SUAVE Executive Travel Blog';
    $metaDescription = Str::limit(strip_tags($blog->description), 155, '...');
    if (empty(trim($metaDescription))) {
        $metaDescription = 'Read the latest news, guides and stories from SUAVE Executive Travel, London supercar and luxury car rental specialists.';
    }

return view('front.blog-detail', compact('blog', 'recentBlogs', 'metaTitle', 'metaDescription'));
}
    }
