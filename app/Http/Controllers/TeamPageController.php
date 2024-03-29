<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Auth;
use App\User;
use App\teamlog;
use App\Tools\TeamLogHelper;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use File;

class TeamPageController extends Controller {

    public function index(Request $request, $team_id) {

        //Checking if Team exits in Database
        $team = Team::where('team_id', '=', $team_id)->count();

        //If no Result is found in the Database we return 404
        if ($team == 0) {
            abort(404);
        } else if ($team == 1) {

            //Getting Data From Team
            $team = Team::where("team_id", '=', $team_id)->first();
            //Getting Logdata from the Team
            $team_logdata = teamlog::select('teamlogs.*', "performer.username as performer", "target.username as target")
                            ->where("teamlogs.team_id", "=", $team_id)
                            ->leftJoin("users as performer", "performer.id", "=", "teamlogs.user_id")
                            ->leftJoin("users as target", "target.id", "=", "teamlogs.target_id")
                            ->orderBy("created_at", "desc")->paginate(5);


            $team_members = User::select('username','avatar_url','team_role')->where("team_id", "=", $team_id)
                    ->orderBy('team_role', "ASC")->get();

            //If Team was just created we omit a sucess Message
            if ($request->input("message") != null) {
                return view("league.team_profile")->with("message", $request->input("message"))->with("teammembers", $team_members);
            } else {
                //Returning Team-ID page without Notification that a Team
                return view("league.team_profile")->with("teamdata", $team)->with("logdata", $team_logdata)->with("teammembers", $team_members);
            }
        }
    }

    public function edit(Request $request, $team_id) {

        $team_data = Team::select('teams.*', "users.id", "users.username")->leftJoin('users', "users.team_id", "=", 'teams.team_id')
                ->where('teams.team_id', '=', $team_id)
                ->get();

        $s = Team::select('teams.*', "users.id", "users.username")->leftJoin('users', "users.team_id", "=", 'teams.team_id')
                ->where('teams.team_id', '=', $team_id)
                ->first();

        $user_data = User::where("team_id", "=", $team_id)->get();

        return view("league.team_settings")->with("team_data", $team_data)->with("user_data", $user_data);
    }

    /*
     * if a User leaves a Team this function will get called
     */

    public function leaveTeam(Request $request) {

        //Notify the User that he successfully left the Team
        Auth::user()->notify(new \App\Notifications\LeaveTeamNotification());

        //log team leaving
        $log = new teamlog;

        //Create Log Entry for Creation
        $loghelper = new TeamLogHelper();
        $log->action_id = \Ramsey\Uuid\Nonstandard\Uuid::uuid4();
        //TODO fehlt uuid
        $log->action_parent_id = $loghelper->getPlayerKickedUUIDFromDatabase();
        $log->user_id = Auth::user()->id;
        $log->team_id = Auth::user()->team_id;
        $log->action = TeamLogHelper::PLAYER_KICKED_ACTION_DB_NAME;
        $log->save();

        //Removing Team ID From User
        Auth::user()->team_id = NULL;
        Auth::user()->save();

        //Returning back to myLeauge View
        return redirect()->route('myleague');
    }

    /**
     *
     * @param Request $request
     */
    public function AdminLeavesTeam(Request $request) {

        //Checking if Requested ID is a part of the TeamAccount

        $new_admin = Users::where("id", "=", $request
                        ->input('new_admin_id'))
                ->where('team_id', "=", Auth::user()->team_id)
                ->count();


        if ($new_admin == 1) {

            $team_data = Team::where("team_id", "=", Auth::user()->team_id)->first();

            $team_data->team_admin_id = $request->input('new_admin_id');

            $team_data->save();

            //TODO Inform the new Admin that he became Admin?
            //Removeing TEAMID From old Admin
            $old_admin = User::where("id", "=", Auth::user()->id)->first();


            $old_admin->team_id = NULL;

            $old_admin->save();


            return redirect()->back()->with("success", "You left the Team");

            //Removing Admin-Role from Current Admin and let him Leave the Team
        } else {
            return redirect()->back()->with("error", "an Error occured while Proceeding the Admin Role. Please try again later!");
        }
    }

    /**
     * Kicks a Player from the Team
     * @param Request $request
     * @param type $teamid The Team which the User belongs to
     * @param type $userid The User who will get kicked
     * @return type
     */
    public function kickPlayerFromTeam(Request $request, $teamid, $userid) {

        if (Auth::user()->team_id == $teamid) {

            //Delete User ID From the Team Account

            $team_data = Team::where("team_id", "=", $teamid)->first();

            //Getting UserData from the Target-User who will be get kicked from the Team
            $kicked_user_info = User::where("id", "=", $userid)->get();

            //Sending Notification to the Person who got kicked
            Notification::send($kicked_user_info, new \App\Notifications\KickMemberNotification());

            //Updating UserData
            $kicked_user = User::where("id", "=", $userid)->update(array('team_id' => null, 'team_role' => 0));

            //Adding Kicked Player to the TeamLog
            $log_helper = new \App\Tools\TeamLogHelper();

            $kicked_player_logentry = new teamlog;
            $kicked_player_logentry->action_id = \Ramsey\Uuid\Nonstandard\Uuid::uuid4();
            $kicked_player_logentry->action_parent_id = $log_helper->getPlayerKickedUUIDFromDatabase();
            $kicked_player_logentry->user_id = Auth::user()->id;
            $kicked_player_logentry->target_id = $userid;
            $kicked_player_logentry->team_id = $teamid;
            $kicked_player_logentry->action = TeamLogHelper::PLAYER_KICKED_ACTION_DB_NAME;
            $kicked_player_logentry->save();

            return back()->with("message", $kicked_user_info[0]['username'] . " was successfully removed from your Team!");
        }
    }

    /**
     *
     * @param Request $request
     * @param type $teamid
     */
    public function saveSettings(Request $request) {

        //TODO VALIDATION FOR ALL THE CASES
        //Checking if the Request contains one of the three options if not we redirect back with an Error
        $SAVE_SOCIALS = "socials";
        $SAVE_SETTINGS = "settings";
        $SAVE_ROLES = "roles";

        //Getting Teamdata
        $team_data = Team::where("team_id", "=", Auth::user()->team_id)->first();

        //var_dump($request->input());
        //var_dump($team_data);
        //Checking if Request contains a change in the Socials
        if ($request->input('action') == $SAVE_SOCIALS) {

            //Checking which Socials will get Updated
            $twitter_value = $request->input('twitter');
            $instagram_value = $request->input('instagram');
            $twitch_value = $request->input('twitch');
            $yt_value = $request->input('youtube');

            $socials_validation_rules = [
                'twitter' => ['url', 'string', 'bail', 'nullable'],
                'instagram' => ['url', 'string', 'bail', 'nullable'],
                'twitch' => ['url', 'string', 'bail', 'nullable'],
                'youtube' => ['url', 'string', 'bail', 'nullable'],
            ];

            //Custom Error Messages
            $socials_validation_error_messages = [
                'twitter.url' => "Invalid Twitter URL",
                'instagram.url' => "Invalid Instagram URL",
                'twitch.url' => "Invalid Twitch URL",
                'youtube.url' => "Invalid Youtube URL"
            ];


            /*   $socails_validation_rules = [
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
              ]; */


            //Validating Input
            $validator = Validator::make($request->all(), $socials_validation_rules, $socials_validation_error_messages);


            //if Validating fails all Errors will return
            if ($validator->fails()) {

                return back()->withErrors($validator)->withInput();
            }

            //Updating TeamSocials
            $team_data->youtube_url = $yt_value;
            $team_data->twitch_url = $twitch_value;
            $team_data->twitter_url = $twitter_value;
            $team_data->instagram_url = $instagram_value;


            $team_data->save();

            return redirect()->back()->with("message", "Socials updated!");





            //Determine which user will get his role changed
        } elseif ($request->input('action') == $SAVE_SETTINGS) {


            if ($request->file('team_logo') != NULL) {

                $uploaded_image = $request->file('team_logo');

                $image_name = hash("sha512", Auth::user()->team_id . "" . rand()) . "." . $uploaded_image->getClientOriginalExtension();
                $uploaded_image->move(public_path("/assets/img/teamlogos/"), $image_name);
                //  $user = Auth::user();
                //Retrieving old Image in order to delete it
                $old_team_avatar_url = $team_data->team_logo;


                if ($old_team_avatar_url != NULL) {

                    //Delete old Image
                    File::delete(public_path("/assets/img/teamlogos/") . $old_team_avatar_url);
                }


                $team_data->team_logo = $image_name;

                $team_data->save();





                //Update new Ressource
                //$user->avatar_url = $image_name;
                // $user->save();
            }


            //TODO CHECKIF TEAMTAG OR TEAMNAME IS NOT ALREADY TAKEN
            $team_tag = $request->input('teamtag');
            $team_name = $request->input('teamname');
            $team_desc_value = $request->input('description');
            $team_website = $request->input('website');
            $team_password = $request->input('password');
            $team_password_con = $request->input('password_con');

            //Default Settings Validation rules
            $default_settings_validation_rules = [
                'teamtag' => ['string', 'nullable', 'bail', "min:2", "max:30"],
                'teamname' => ['string', 'nullable', 'bail', "min:2", "max:30"],
                'description' => ['string', 'nullable', 'bail', 'max:1000'],
                'password' => ['min:8', 'string', "bail", "nullable"],
                'password_con' => ['same:password', "nullable", 'bail'],
                'website' => ['url', 'string', 'bail', 'nullable'],
            ];

            //Custom Error Messages for the Default Settings
            $default_settings_validation_error_messages = [
                'password' => "Invalid Password Match",
                'password_con' => "Invalid Password March (Confirmed)",
                'website.url' => "Invalid TeamURL",
            ];

            //Validating Input
            $validator = Validator::make($request->all(), $default_settings_validation_rules, $default_settings_validation_error_messages);


            //if Validating fails all Errors will return
            if ($validator->fails()) {

                echo("error");

                return back()->withErrors($validator)->withInput();
            }


            //Can be deleted if validation works
            if ($team_password != NULL && $team_password_con != NULL) {


                $team_data->team_password = Hash::make($team_password);
            }


            //Updating Teamsettings
            $team_data->team_website = $team_website;


            $team_data->save();

            //Adding Logentry

            $log_helper = new \App\Tools\TeamLogHelper();


            $default_settings_logentry = new teamlog;
            $default_settings_logentry->action_id = \Ramsey\Uuid\Nonstandard\Uuid::uuid4();
            $default_settings_logentry->action_parent_id = $log_helper->getTeamSettingsChanged();
            $default_settings_logentry->user_id = Auth::user()->id;
            $default_settings_logentry->team_id = Auth::user()->team_id;
            $default_settings_logentry->action = TeamLogHelper::DEFAULT_SETTINGS_CHANGED;
            $default_settings_logentry->save();


            return back()->with("message", "General Settings updated!");
        } elseif ($request->input("action") == $SAVE_ROLES) {

            //These Values are related to the  Positions
            $CAPTAIN_ROLE_VALUE = 2;
            $MANAGER_ROLE_VALUE = 3;
            $COACH_ROLE_VALUE = 4;
            $PLAYER_ROLE_VALUE = 5;

            //Getting all Users related to the Team
            $team_users = User::select('id')->where("team_id", "=", Auth::user()->team_id)->get();


            //First we gonna check if the Amount of specific Postion is in Range

            $captain_role_count = 0;
            $manager_role_count = 0;
            $coach_role_count = 0;

            foreach ($team_users as $user) {


                $current_id = $user->id;

                //Sumibtted ID is an Actual Teammeber
                if ($request->input($current_id) != NULL) {

                    $destinated_team_role = $request->input($current_id);


                    if ($destinated_team_role == $CAPTAIN_ROLE_VALUE) {

                        $captain_role_count ++;
                    } elseif ($destinated_team_role == $MANAGER_ROLE_VALUE) {

                        $manager_role_count++;
                    } elseif ($destinated_team_role == $COACH_ROLE_VALUE) {

                        $coach_role_count++;
                    }
                }
            }



            if ($captain_role_count < 3 && $manager_role_count <= 1 && $coach_role_count <= 1) {

            } else {


                return redirect()->back()->with("message", "Your Roles are not correct, please make sure to use the allowed Numbers");
            }


            //If no allowed double Value occured we proceed

            foreach ($team_users as $user) {


                $current_id = $user->id;

                //Sumibtted ID is an Actual Teammeber
                if ($request->input($current_id) != NULL) {

                    $current_team_role = NULL;

                    //Determine which current Role the Teammember holds
                    if ($current_id == $team_data->team_captain_1_id || $current_id == $team_data->team_captain_2_id) {

                        $current_team_role = $CAPTAIN_ROLE_VALUE;
                    } elseif ($current_id == $team_data->team_manager_id) {


                        $current_team_role = $MANAGER_ROLE_VALUE;
                    } elseif ($current_id == $team_data->team_coach_id) {

                        $current_team_role = $COACH_ROLE_VALUE;
                    } else {

                        $current_team_role = $PLAYER_ROLE_VALUE;
                    }

                    //IF a Change Occurs
                    if ($request->input($current_id) != $current_team_role) {

                        $destinated_team_role = $request->input($current_id);

                        //Delete old Position in Database
                        if ($current_team_role == $CAPTAIN_ROLE_VALUE) {

                            if ($current_id == $team_data->team_captain_1_id) {

                                $team_data->team_captain_1_id = NULL;
                                $team_data->save();
                            } else {

                                $team_data->team_captain_2_id = NULL;
                                $team_data->save();
                            }
                        } elseif ($current_team_role == $MANAGER_ROLE_VALUE) {

                            $team_data->team_manager_id = NULL;
                            $team_data->save();
                        } elseif ($current_team_role == $COACH_ROLE_VALUE) {


                            $team_data->team_coach_id = NULL;
                            $team_data->save();
                        }

                        //Set new Position in Database
                        if ($destinated_team_role == $CAPTAIN_ROLE_VALUE) {

                            if ($team_data->team_captain_1_id == NULL) {

                                $team_data->team_captain_1_id = $current_id;
                                $team_data->save();
                                $user->team_role = $CAPTAIN_ROLE_VALUE;
                                $user->save();
                            } elseif ($team_data->team_captain_2_id == NULL) {

                                $team_data->team_captain_2_id = $current_id;
                                $team_data->save();
                                $user->team_role = $CAPTAIN_ROLE_VALUE;
                                $user->save();
                            } else {

                                //Returning Back if Max Captain Limit is reached TODO implement Logic to avoid this
                                return redirect()->back()->with("error", "Max Captain Limit reached!");
                            }
                        } elseif ($destinated_team_role == $MANAGER_ROLE_VALUE) {

                            $team_data->team_manager_id = $current_id;
                            $team_data->save();

                            $user->team_role = $MANAGER_ROLE_VALUE;
                            $user->save();
                        } elseif ($destinated_team_role == $COACH_ROLE_VALUE) {

                            $team_data->team_coach_id = $current_id;
                            $team_data->save();

                            $user->team_role = $COACH_ROLE_VALUE;
                            $user->save();
                        }
                        //If Selected User gets the Player Role Back
                        else {

                            $user->team_role = $PLAYER_ROLE_VALUE;
                            $user->save();

                            switch ($current_id) {

                                case $team_data->team_captain_1_id == $current_id : $team_data->team_captain_1_id = NULL;
                                    $team_data->save();
                            }
                        }

                        $target_db_entry = User::where("id", "=", $current_id)->first();

                        $log_helper = new \App\Tools\TeamLogHelper();
                        $rolechange_logentry = new teamlog;
                        $rolechange_logentry->action_id = \Ramsey\Uuid\Nonstandard\Uuid::uuid4();
                        $rolechange_logentry->action_parent_id = $log_helper->getRoleChangedUUIDFromDatabase();
                        $rolechange_logentry->user_id = Auth::user()->id;
                        $rolechange_logentry->team_id = Auth::user()->team_id;
                        $rolechange_logentry->target_id = $current_id;
                        $rolechange_logentry->logtext = "" . Auth::user()->username . " changed the Role of " . $target_db_entry->username . " from " . $this->createRolePostionLogText($current_team_role) . " to " . $this->createRolePostionLogText($destinated_team_role);
                        $rolechange_logentry->action = TeamLogHelper::ROLE_CHANGED;
                        $rolechange_logentry->save();
                    }
                }
            }


            return redirect()->back()->with("message", "Team Roles updated!");
        } else {

            //if the requested action is not found we redirect the Request back to the Teamsettings Page
            return redirect()->back()->with("error", "Something went wrong please try again Later!");
        }
    }

    public function createRolePostionLogText($val) {


        $ADMIN_ROLE_VALUE = 1;
        $CAPTAIN_ROLE_VALUE = 2;
        $MANAGER_ROLE_VALUE = 3;
        $COACH_ROLE_VALUE = 4;
        $PLAYER_ROLE_VALUE = 5;

        $ADMIN_ROLE = "Admin";
        $CAPTAIN_ROLE = "Captain";
        $MANAGER_ROLE = "Manager";
        $COACH_ROLE = "Coach";
        $PLAYER_ROLE = "Player";




        switch ($val) {

            case $ADMIN_ROLE_VALUE: return $ADMIN_ROLE;
            case $CAPTAIN_ROLE_VALUE: return $CAPTAIN_ROLE;
            case $MANAGER_ROLE_VALUE: return $MANAGER_ROLE;
            case $COACH_ROLE_VALUE: return $COACH_ROLE;
            case $PLAYER_ROLE_VALUE: return $PLAYER_ROLE;
        }

        return "-1";
    }

    /**
     *
     * @param Request $request
     */
    public function uploadTeamLogo(Request $request) {


        /*
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
          } */
    }

}
