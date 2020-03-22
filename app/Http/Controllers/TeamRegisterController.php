<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\TeamNameNotTaken;
use App\Rules\TeamTagNotTaken;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Team;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\User;

class TeamRegisterController extends Controller {

    /**
     * Returns the Teamregister Page
     * @param Request $request HTTP-Request
     * @return view the View of the Teamregister Page
     */
    public function index(Request $request) {

        return view("league.TeamRegister");
    }

    /**
     * Creates a new Team Ressource
     * @param Request $request
     * @return type
     */
    public function createTeam(Request $request) {


        //Retreiving Data From Request
        $teamname = $request->input('teamname');
        $teamtag = $request->input('teamtag');
        $orga = $request->input('orga');
        $password = $request->input('password');
        $password_con = $request->input('password_con');
        $website = $request->input('website');
        $description = $request->input('description');


        //Retreiving Social Media Informations
        $twitter = $request->input('twitter');
        $youtube = $request->input('youtube');
        $twitch = $request->input('twitch');
        $instagram = $request->input('instagram');

        //Validating Rules for a new Team Ressource
        $team_validation_rules = [
            'teamname' => ['bail', 'required', 'string', 'min:2', 'max:30', new TeamNameNotTaken()],
            'teamtag' => ['bail', 'required', 'min:2', 'max:12', new \App\Rules\TeamTagNotTaken()],
            'password' => 'bail|required|string|min:6|max:30',
            'password_con' => 'bail|required|string|same:password',
            'team_logo' => 'bail|image'
        ];
        //Custom Validation Error-Messages
        $team_validation_msg = [
            'teamname.required' => 'Sie müssen einen Teamnamen eingeben',
            'teamname.min' => 'Teamname ist zu kurz',
            'teamname.max' => 'der Teamname darf maximal 30 Zeichen enthalten',
            'teamtag.required' => 'Sie müssen einen Teamtag festlegen',
            'password.min' => 'das Passwort muss mindestens 6 Zeichen lang sein',
            'password.con' => 'Die Passwörter stimmen nicht überein'
        ];



        $validator = Validator::make($request->all(), $team_validation_rules, $team_validation_msg
        );

        if ($validator->fails()) {
            $message = $validator->errors();

            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }



        //If the Validation Process has no Erros we can create a new TEAM Ressource
        else {

            //Creating a new Instance of the Team-Model
            $new_team = new Team;


            //Required Inputs
            $new_team->team_name = $teamname;
            $new_team->team_tag = $teamtag;
            $new_team->team_password = Hash::make($password);
            $new_team->team_admin_id = Auth::user()->id;

            //Optional Inputs

            $new_team->team_website = $website;
            $new_team->twitter_url = $twitter;
            $new_team->twitch_url = $twitch;
            $new_team->instagram_url = $instagram;
            $new_team->youtube_url = $youtube;



            $new_team->save();






            //Retrieving newly created Teamaccount -ID

            $new_team = Team::where('team_admin_id', "=", Auth::user()->id)->select('team_id')->get()->toArray();

            $new_team_id = $new_team[0]['team_id'];
            
            
       


            //Adding Team to User who created the Team

           User::where('id', "=", Auth::user()->id)->update(['team_id' => $new_team_id]); 
           
           
        




           return Redirect::route('teampage', [$new_team_id])->with('message', 'Your Team has been created!');
        }


        //return redirect()->back()->with("success", "Your Team has been created");
    }

    public function checkRemoteValidation(Request $request) {


        if ($request->ajax()) {

            if ($request->has('teamname')) {


                $team_result = DB::table('teams')->select('team_name')->where('team_name', 'like', $request->input('teamname') . "%")->doesntExist();

                return json_encode($team_result);
            }
        }
    }

}
