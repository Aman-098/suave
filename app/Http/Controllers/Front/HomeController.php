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
         $fleets = Product::with('category')
                    ->where('status',1)
                    ->get()
                    ->groupBy('category.name');

        // $sliders=Slider::where('status',1)->get();
        // $categories = Category::where('status', 1)
        //             ->withCount('products')
        //             ->limit(5)
        //             ->get();

        // $products=Product::where(['status'=>1,'is_trending'=>1])->get();

        // $videos=Video::where('status',1)->get();
        $blogs = Blog::where('status', 1)
                ->latest()
                ->limit(3)
                ->get();

        // $new_Arrival=Product::where(['status'=>1,'new_arrival'=>1])->get();

        // dd($products);
  
        // return view('front.home',compact('sliders','categories','products','videos','blogs','new_Arrival'));
        return view('front.home',compact('fleets','blogs'));
    }
}
