<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    //
    public function index(){
        $blogs=Blog::where('status',1)->get();

        // recent blogs 
        $recentBlogs = Blog::where('status', 1)
                        ->latest() 
                        ->take(3)
                        ->get();
        return view('front.blogs',compact('blogs','recentBlogs'));
    }

    public function blog_detail($slug){

        // current blog
        $blog = Blog::where('slug', $slug)
                    ->where('status', 1)
                    ->firstOrFail();

        // recent blogs
        $recentBlogs = Blog::where('status', 1)
                        ->latest()
                        ->take(3)
                        ->get();

        return view('front.blog-detail', compact('blog', 'recentBlogs'));
    }
}
