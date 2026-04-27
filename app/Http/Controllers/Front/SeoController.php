<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    //

    public function about_us(){
        return view('front.about');
    }

    public function gallery(){
        return view('front.gallery');
    }

    

    public function terms_condition(){
        return view('front.terms-condition');
    }

    public function payment_security(){
        return view('front.payment-security');
    }

    public function privacy_policy(){
        return view('front.privacy-policy');
    }

    public function delivery_returns(){
        return view('front.delivery-returns');
    }

    public function cookie_policy(){
        return view('front.cookie-policy');
    }

}
