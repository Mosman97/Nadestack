<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
class UserprofilePageController extends Controller {
    
    
    
    /**
     * 
     * @param Request $request 
     * @param type $userid the UserID
     */
    function getUserProfileData(Request $request, $username) {
        
        
        //Searching User
        
       $user_exits =  User::where("username","=",$username)->count();
        
        
        if($user_exits == 1) {
            
            
            
             $user_data =  User::where("username","=",$username)->get();
            
            
               return view("useraccount.profile")->with("userdata",$user_data);
            
        }
        
        else {
            
            echo("USER NOT FOUND");
        }
        
        
        
        
        
     
    

    }

}
