<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\User;

class EmailVerifyController extends Controller
{
   
    
    function verify() {
        
        return view('auth.verify');
        
          // return view('auth.verify');
        
        if(Auth::check()) {
            
            
          //  return view('auth.verify');
           // return "<script>alert('Ist logged in');</script>";
        }
        
        else {
            
            
           // return view('auth.verify');
        }
        
    }
}
