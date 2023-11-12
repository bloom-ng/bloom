<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{


    
    public function login(Request $request){


       $credentials = $request->validate([
            'email' => 'required|email',
            'password' => ['required',Password::min(8)]
        ]);
       
        
        //dd($request);
        if(Auth::attempt($credentials,$request->input('remember', true))){
            
            $request->session()->regenerate();
                
            return redirect()->intended('/dashboard/home');
        }

        return back()->withErrors(['credentials' => 'Invalid credentials.']);
    }
}
