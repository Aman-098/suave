<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Video;
use App\Models\Blog;

class HomeController extends Controller
{
    //
    public function index(){
        //  $fleets = Product::with('category')
        //             ->where('status',1)
        //             ->limit(3)
        //             ->get()
        //             ->groupBy('category.name');

        $fleets = Category::with(['products' => function ($query) {
            $query->where('status', 1)->take(3);
        }])->get();

        $blogs = Blog::where('status', 1)
                ->latest()
                ->limit(3)
                ->get();

        // dd($products);

        return view('front.home',compact('fleets','blogs'));
    }
}
