<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEnquiry;

class ContactController extends Controller
{
    //
    public function index(){
        return view('front.contact');
    }

    public function save_form(Request $request){
        if($request->isMethod('post')){

            $validated = $request->validate([
                'name'    => 'required|string',
                'email'   => 'required|email',
                'phone' => 'required|string|max:20',
                'message' => 'required|string'
            ]);


            $contact = Contact::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'message' => $validated['message'],
            ]);

            if($contact){

                // Send Email
                // Mail::to(config('mail.admin_email'))->send(new ContactEnquiry($validated));
                

                return response()->json(['status'=>true,'message'=>'Thank you for submission! We will contact you soon!']);
            }else{
                return response()->json(['status'=>false,'message'=>'Failed to submit form ']);
            }

        }

    }

    // public function thank_you(){
    //     return view('front.thankyou');
    // }
}
