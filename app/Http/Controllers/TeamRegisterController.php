<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\TeamNameNotTaken;
use App\Rules\TeamTagNotTaken;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use DB;

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


        return redirect()->back()->with("success", "Your Team has been created");
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
