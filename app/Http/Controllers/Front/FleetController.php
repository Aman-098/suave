<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FleetController extends Controller
{
    //
    public function index(){
        return view('front.fleets');
    }

    public function fleet_detail(){
        return view('front.fleet-detail');
    }
}
