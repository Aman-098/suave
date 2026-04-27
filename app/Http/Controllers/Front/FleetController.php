<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Product;

class FleetController extends Controller
{
    //
    public function index(){
        $fleets = Product::with('category')
                    ->where('status',1)
                    ->get()
                    ->groupBy('category.name');
        // dd($fleets); 
        return view('front.fleets',compact('fleets'));
    }
 
    public function fleet_detail($slug){
        $fleet = Product::where('slug', $slug)
        ->where('status', 1)
        ->firstOrFail();

        $related_fleet = Product::with('category')->where('status', 1)
                        ->where('category_id', $fleet->category_id)
                        ->where('id', '!=', $fleet->id)
                        ->limit(3)
                        ->get();

        // dd($fleet->category);
        return view('front.fleet-detail',compact('fleet','related_fleet'));
    }
}
