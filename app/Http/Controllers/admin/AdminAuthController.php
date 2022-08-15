<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
   
    //Admin Login system

    public function login(Request $request)
    {
        //validate
        $this -> validate($request,[
            'auth'      => 'required',
            'password'  => 'required'
        ]);

        //try to login by guard
        if(
        Auth::guard('admin') ->attempt(['email' => $request -> auth,'password' => $request -> password])||
        Auth::guard('admin') ->attempt(['cell' => $request -> auth,'password' => $request -> password])||
        Auth::guard('admin') ->attempt(['username' => $request -> auth,'password' => $request -> password])
        ){
            return redirect() -> route('dashboard.page');
        }else{
            return redirect() -> route('login.page') -> with('danger','Email or Mobile or Password Not Match');
        }
    
    }


    //admin logout system 
    public function logout()
    {
        Auth::guard('admin') -> logout();
        return redirect() -> route('login.page') -> with('success','Admin Logout Success');
    }

}
