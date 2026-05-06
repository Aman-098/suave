<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Booking;

class ContactController extends Controller
{
    //
    public function index(){
        $tickets=Contact::all();

        return view('admin.tickets',compact('tickets'));
        
    }

    
}
