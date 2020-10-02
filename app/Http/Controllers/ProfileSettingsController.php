<?php

namespace App\Http\Controllers;

use Zyberspace\SteamWebApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Auth;
use App\User;
use DB;
use File;

class ProfileSettingsController extends Controller {

    /**
     *
     * @param Request $request
     */
    public function updateProfileSettings(Request $request) {

        //TODO  implement Confirm Value
        //General Profile Inputs
        $forname = $request->input("forname");
        $surname = $request->input("surname");
        $birthday_date = $request->input("birthday");
        $profile_desc = $request->input("desc");


        //Social Media Inputs
        $social_twitter = $request->input("twitter");
        $social_instagram = $request->input("instagram");
        $social_twitch = $request->input("twitch");
        $social_yt = $request->input("youtube");

        $validation_rules = [
            'forname' => ['string', 'nullable', 'bail', "min:3", "max:30"],
            'surname' => ['string', 'nullable', 'bail', "min:3", "max:30"],
            'birthday' => ['nullable', 'bail', 'date'],
            'desc' => ['string', 'nullable', 'bail', 'max:1000'],
            'twitter' => ['url', 'string', 'bail', 'nullable'],
            'instagram' => ['url', 'string', 'bail', 'nullable'],
            'twitch' => ['url', 'string', 'bail', 'nullable'],
            'youtube' => ['url', 'string', 'bail', 'nullable'],
        ];



        //Custom Error Messages
        $validation_error_messages = [
            'forename.min' => "The Forname appears to be too short",
            'forename.max' => "The Forname appears to be too long",
            'surname.min' => "The Surname appears to be too short",
            'surname.max' => "The Surname appears to be too long",
            'desc.max' => "Your Description is too long",
            'twitter.url' => "Invalid Url",
            'instagram.url' => "Invalid Url",
            'twitch.url' => "Invalid Url",
            'youtube.url' => "Invalid Url"
        ];


        //Validating Input
        $validator = Validator::make($request->all(), $validation_rules, $validation_error_messages);


        //if Validating fails all Errors will return
        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();
        } else {


            //Updating Userprofile


            $user = Auth::user();


            //Updating General Informations
            $user->forname = $forname;
            $user->lastname = $surname;
            $user->birthday = $birthday_date;
            $user->profiledescription = $profile_desc;

            //Updating Socials
            $user->twitter_url = $social_twitter;
            $user->instagram_url = $social_instagram;
            $user->twitch_url = $social_twitch;
            $user->youtube_url = $social_yt;


            $user->save();


            return back()->with("success", "Update");
        }
    }

    function getProfileSettings(Request $request) {

        $user_data = User::where('id', '=', Auth::id())->get();

        return view("useraccount.ProfileSettings")->with("userdata", $user_data);
    }

    /**
     * Handles the change of the Profileimage
     */
    public function updateProfilePicture(Request $request) {


        if ($request->ajax()) {


            $file_validation_rules = [
                'file' => ['bail', 'file', 'image', 'max:2000']
            ];

            $file_validation_error_messages = [
                'file.file' => "The Uploaded Element is not a File",
                'file.image' => "The uploaded File is not an Image",
                'file.max' => "the uploaded File is too big"
            ];


            $validator = Validator::make($request->all(), $file_validation_rules, $file_validation_error_messages);

            if ($validator->fails()) {
                // return var_dump($validator);
            }
            //IF no Validationerrors could be found we can update the Profilepicture of the User
            else {

                $uploaded_image = $request->file('file');
                $image_name = hash("sha512", Auth::user()->id . "" . rand()) . "." . $uploaded_image->getClientOriginalExtension();
                $uploaded_image->move(public_path("/assets/img/profile_pictures"), $image_name);
                $user = Auth::user();

                //Retrieving old Image in order to delete it
                $old_avatar_url = $user->avatar_url;

                //Update new Ressource
                $user->avatar_url = $image_name;
                $user->save();
                //Delete old Image
                File::delete(public_path("/assets/img/profile_pictures/") . $old_avatar_url);

                return json_encode(true);
            }


            //Validate File



            /*  $input_validation_rules = [
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

              } */
        }
    }

    /**
     * This function sets the SteamID of the User in the Database.This can only be called one single Time by the User
     */
    public function setSteamID() {


        $web_api_key = "AD8538EE0A8A99DEFD8E78F54DCD2325";

        $client = new \Zyberspace\SteamWebApi\Client($web_api_key);


       // $steamUser = new \Zyberspace\SteamWebApi\Interfaces\ISteamUser($client);


        $oauth = new \Zyberspace\SteamWebApi\Interfaces\ISteamUserOAuth($client);


       $test = $oauth->GetTokenDetailsV1($web_api_key);
        //$response = $steamUser->GetPlayerSummariesV1("76561198037463757");

        var_dump($test);
    }

}
