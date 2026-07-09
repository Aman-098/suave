<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Booking;
use App\Mail\AdminNewOrderMail;
use Illuminate\Support\Facades\Mail;

class FleetController extends Controller
{
    //
    public function index(){
        // $fleets = Product::with('category')
        //             ->where('status',1)
        //             ->orderBy('sort_order')
        //             ->get()
        //             ->groupBy('category.name');

        $fleets = Product::with('category')
                ->where('status', 1)
                ->get()
                ->sortBy('sort_order') // products inside category
                ->groupBy('category.name')
                ->sortBy(function ($products) {
                    return $products->first()->category->sort_order ?? 999;
                });
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

        // dd($fleet);
        return view('front.fleet-detail',compact('fleet','related_fleet'));
    }

    public function save_booking(Request $request){
        if($request->isMethod('post')){

            $validated = $request->validate([
                'name'        => 'required|string|max:255',
                'fleet_name'  => 'required|string|max:255',
                'email'       => 'required|email:rfc,dns',
                'phone'       => 'required|string|max:20',
                'fleet_name'  => 'required|string|max:255',

                'pickup_date' => 'required|date',
                'return_date' => 'required|date|after_or_equal:pickup_date',

                'message'     => 'nullable|string'
            ]);


            $booking = Booking::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'fleet_name' => $validated['fleet_name'],
                'pickup_date' => $validated['pickup_date'],
                'return_date' => $validated['return_date'],
                'message' => $validated['message'] ?? null,
            ]);

            if($booking){

                // Send Email
                // Mail::to(config('mail.admin_email'))->send(new AdminNewOrderMail($booking));
                Mail::to(config('mail.admin_email'))
                ->cc('ads.qorvatech@gmail.com')
                ->send(new AdminNewOrderMail($booking));
                

                return response()->json(['status'=>true,'message'=>'Thank you for Booking! We will contact you soon!','redirect'=>route('thankyou')]);
            }else{
                return response()->json(['status'=>false,'message'=>'Failed to submit booking request ']);
            }

        }

    }
}
