<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerOrderConfirmedMail;


class DashboardController extends Controller
{
    //
    function index(){

        $user= Auth::user();
        $name=$user->name;

        $bookings=Booking::latest()->get();
        $total_bookings=$bookings->count();
        $confirmed_bookings=Booking::where('status','confirmed')->count();
        $cancelled_bookings=Booking::where('status','cancelled')->count();

        // dd($bookings);
        return view('admin.admin-dashboard',compact('name','bookings','total_bookings','confirmed_bookings','cancelled_bookings'));

    }

    public function edit_order(Request $request, $id){

        if ($request->isMethod('post')) {

            $booking = Booking::find($id);

            if (!$booking) {
                return response()->json([
                    'status' => false,
                    'message' => 'Booking not found!'
                ]);
            }

            $status = $request->input('status');

            $booking->status = $status;
            $update = $booking->save();

            // Send mail when confirmed
            if ($status == 'confirmed') {

                $user_email = $booking->email; 

                Mail::to($user_email)->send(
                    new CustomerOrderConfirmedMail($booking)
                );
            }

            if ($update) {
                return response()->json([
                    'status' => true,
                    'message' => 'Status has been updated!'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to update status'
                ]);
            }

        } else {

            $booking = Booking::findOrFail($id);

            return response()->json([
                'booking' => $booking
            ]);
        }
    }

    // public function edit_order(Request $request,$id){

    //     if($request->isMethod('post')){
    //         // dd($request->input());

    //         $status=$request->input('status');

    //         $update=Booking::where('id', $id)->update([
    //             'status'=>$status
    //         ]);

    //         if($status=='confirmed'){
    //             Mail::to($user_email)->send(new CustomerOrderConfirmedMail($order));
    //         }

    //         if($update){
    //             return response()->json(['status'=>true,'message'=>'Status has been updated!']);

    //         }else{
    //             return response()->json(['status'=>false,'message'=>'Failed to update Status']);
    //         }

    //     }else{
    //         $booking=Booking::findorFail($id);
    //         // dd($category);
    //         return response()->json([
    //             'booking'   => $booking
    //         ]);
    //     }

    // }

    public function customers(){
        $customers=User::where('role','user')->get();
        return view('admin.customers',compact('customers'));
    }
}
