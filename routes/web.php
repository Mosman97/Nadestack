<?php

use Illuminate\Support\Facades\Route;

/*
 * Startpage of Nadestack also defined as the Newspage
 */
Route::get('/', function () {
    return view('news');
})->name('startpage');



/**
 * Searchroute of Nadestack  
 */
Route::get("/search", function() {


    return view("search");
})->name('search');



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



Route::get("league/overview", function() {



    return view("league.league_overview");
})->name('league_overview');



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
 * Displays Profile related Tickets
 * 
 */
Route::get("/mytickets","ProfileTicketController@index")->middleware('auth')->name("profiletickets"); 




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









/*
 * ----------------------------BEGIN OF ADMIN RELATED ROUTES------------------
 */



/*
 * Index/Startpage of the Adminpanel
 */
Route::get("/admin", "adminpanel\AdminpanelIndexController@index")->middleware('admin')->name('admin');
/*
 * Overview of all News
 */
Route::get('/admin/news', "adminpanel\AdminPanelNewsController@index")->middleware('admin')->name('adminpanel_newsindex');
/*
 * Returns the View to create a new News
 */
Route::get("/admin/news/new", "adminpanel\AdminPanelNewsController@create")->middleware('admin')->name("adminpanel_createnews");


/*
 * Stores /Saves a newly created News in the Datbase
 */
Route::post("/admin/news/store", "adminpanel\AdminPanelNewsController@store")->middleware('admin')->name("adminpanel_storenews");

/*
 * Deletes a News with the given News ID
 */
Route::post("/admin/news/delete/{id}", "adminpanel\AdminPanelNewsController@destroy")->middleware('admin')->name("adminpanel_deltenews");

/*
 * Edits a News with the given ID
 */
Route::get("/admin/news/edit/{id}", "adminpanel\AdminPanelNewsController@edit")->middleware('admin')->name("adminpanel_editnews");

/*
 * Updates a News with the given ID
 */
Route::post("/admin/news/update/{id}", "adminpanel\AdminPanelNewsController@update")->middleware('admin')->name("adminpanel_updatenews");



Route::get("admin/player","adminpanel\Playercontroller@index")->middleware("admin")->name("adminpanel_playerindex");





/*
 * -----------------------------END OF ADMIN RELATED ROUTES-------------------
 */


