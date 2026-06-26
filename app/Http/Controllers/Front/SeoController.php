<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class SeoController extends Controller
{
    //

    public function about_us(){
        return view('front.about');
    }

    public function gallery(){
        $gallery=Gallery::where('status',1)->get();

        return view('front.gallery',compact('gallery'));
    }

    

    public function term_condition(){
        return view('front.termsandcondition');
    }

    

}
