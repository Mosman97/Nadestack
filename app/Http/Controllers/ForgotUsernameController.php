<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;
use DB;
use Illuminate\Support\Facades\Mail;
use \App\Mail\ForgotPasswordMail;

class ForgotUsernameController extends Controller {

    function generateForgotUsernameEmail(Request $request) {

        //First the Input will be checked

        $input_validation_rules = [
            'email' => ['bail', 'required', 'email', new \App\Rules\UserEmailExits()]
        ];

        $validation_error_messages = [
            'email.required' => 'You have to fill out the Email field',
            'email.email' => 'you have to fill in a valid Email Adress'
        ];

        $validator = Validator::make($request->all(), $input_validation_rules, $validation_error_messages
        );


        if ($validator->fails()) {
            $message = $validator->errors();

            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        } else {

            //Quering the Username which is linked to the Email
            //Building the Email to Inform the User
            Mail::to($request->get('email'))->send(new \App\Mail\ForgotUsernameMail("heartquake12"));
            
            //TODO New View to Inform the User that an Email has been send to his Account 
            
           return redirect()->back()->with('success','An Email has been send to your Adress');
        }
    }

}
