<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    function login_user(Request $request){
        
        if($request->isMethod('post')){
            // dd($request->input());
            $validated=$request->validate([
                "email"=>'required|email',
                "password"=>'required'
            ]);

            $credentials = [
                'email'    => $validated['email'],
                'password' => $validated['password'],
                'role'=>'admin',
            ];

            if (Auth::guard('admin')->attempt($credentials)) {

                // session regenerate (IMPORTANT 🔥)
                $request->session()->regenerate();

                return response()->json([
                    'status'  => true,
                    'message' => 'Login successful',
                    'redirect'=> route('admin.dashboard')
                ]);
            }

            return response()->json([
                'status'  => false,
                'message' => 'Invalid credentials'
            ]);
        }
        return view('auth.login');

    }

    function logout_user(){

        Auth::guard('admin')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        // Agar admin nahi hai to kuch aur kar
        return redirect()->back()->with('error', 'Only admin can logout from here');
    }

}