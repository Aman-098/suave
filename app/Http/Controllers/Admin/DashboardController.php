<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;


class DashboardController extends Controller
{
    //
    function index(){
        // return "admin dashboard";
        $user= Auth::user();
        // dd($user);
        $name=$user->name;

        // $orders=Order::with('items')->where('payment_status','paid')->get();
        // $total_order=$orders->count();
        // $delivered_order=Order::where('status','delivered')->count();

        // dd($orders);
        return view('admin.admin-dashboard',compact('name'));
        // return view('admin.admin-dashboard',compact('name','orders','total_order','delivered_order'));

    }

    public function edit_order(Request $request,$id){

        if($request->isMethod('post')){
            // dd($request->input());

            $update=Order::where('id', $id)->update([
                'status'=>$request->input('status')
            ]);

            if($update){
                return response()->json(['status'=>true,'message'=>'Status has been updated!']);

            }else{
                return response()->json(['status'=>false,'message'=>'Failed to update Status']);
            }

        }else{
            $order=Order::findorFail($id);
            // dd($category);
            return response()->json([
                'order'   => $order
            ]);
        }

    }

    public function customers(){
        $customers=User::where('role','user')->get();
        return view('admin.customers',compact('customers'));
    }
}
