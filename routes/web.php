<?php

use Illuminate\Support\Facades\Route;

/*
 * Startpage of Nadestack aslo defined as the Newspage
 */
Route::get('/', function () {
    return view('news');
})->name('startpage');




/*
 * --------------BEGINN OF LEAGUE RELATED ROUTES--------------
 */

/*
 * This Route describes the Client
 */
Route::get("league/client", function() {


    return view("league.download_client");
})->name("client_download");


/*
 * This Route describes the League Rules
 */
Route::get("league/rules", function() {


    return view("league.rules");
})->name("league_rules");



/*
 * This Route defines My League
 */
Route::get("league/myleague", "MyLeagueController@ViewOrganiser")->name("myleague")->middleware('auth');




/*
 * --------------END OF LEAGUE RELATED ROUTES--------------
 */

/**
 * Route for creating a new Team Ressource (Can only be called if User is not in a Team)s
 */
Route::get("leauge/createTeam", "TeamRegisterController@index")->name("teamregister")->middleware('auth');

/**
 * Create a new Team Ressource
 */
Route::post("league/createTeam", "TeamRegisterController@createTeam")->name("createnewteam")->middleware('auth');

/**
 * Validate the Inputs via AJAX For Frontend Validation
 */
Route::post("league/createteam/validate", "TeamRegisterController@checkRemoteValidation")->name("validatecreateteam")->middleware('auth');



/*
 * --------------BEGINN OF PROFILE RELATED ROUTES--------------
 */


/*
 * Returns the View of the Userprofile
 */
Route::get("/user/{username}", "UserprofilePageController@getUserProfileData")->name("profilepage");

/*
 * Returns the View of the Profilesettings
 */
Route::get("/mySettings", "ProfileSettingsController@getProfileSettings")->name("profilesettings")->middleware('auth');


/*
 * Updates the ProfileImage
 */
Route::post('/updateProfileImage', "ProfileSettingsController@updateProfilePicture")->name('updateprofilepicture')->middleware('auth');

/*
 * Updates the rest of the Profile
 */
Route::post("updateProfile", "ProfileSettingsController@updateProfileSettings")->name("updateProfile")->middleware('auth');


/*
 * -------------- END OF PROFILE RELATED ROUTES--------------
 */




Route::get("/support", function() {


    return view("league.support");
})->name('support');



/*
 *  --------------BEGINN OF AUTHENTIFICATION RELATED ROUTES--------------
 */

/* Holds all necessary Authentication Routes */
Auth::routes();

/**
 * Overrides the Logout Method (Maybe not Secure enough?)
 */
Route::get('/logout', function() {

    //Logging Out the Guard
    Auth::logout();
    //Return news aka startpage
    return view('news');
});

/**
 * Displays a Forogt Username
 */
Route::get('/forgotUsername', function() {

    return view('emails.ForgotUsername');
})->middleware('guest')->name('account.usernameforget');



/*
 *  --------------END OF AUTHENTIFICATION RELATED ROUTES--------------
 */





/*
 * --------------BEGIN OF TEAM RELEATED ROUTES--------------------
 */



/*
 * Returns the View of the Team with the given Teamid
 */
Route::get("/teams/{teamid}", "TeamPageController@index")->name("teampage");




/*
 * --------------END OF TEAM RELATED ROUTES--------------------------
 */






/**
 * Startpage as Logged-In User
 */
Route::get('/home', 'HomeController@index')->name('home');



