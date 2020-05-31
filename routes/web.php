<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/**
 * BEGIN OF ERROR HANDLING ROUTES
 */
Route::fallback(function() {
    return view('errors.404');
});

/**
 * END OF ERROR HANDLING ROUTES
 */
/*
 * Startpage of Nadestack also defined as the Newspage
 */
/* * Route::get('/', function () {
  return view('news');
  })->name('startpage');* */


Route::get("/", "nadestack\NewsController@index")->name('startpage');

Route::get("news/{news_id}", "nadestack\NewsController@getNewsDetails")
        ->name("viewnews");

Route::post("news/{news_id}", "nadestack\NewsController@storeComment")
        ->name("StoreNewsComment");





/**
 * Searchroute of Nadestack
 */
Route::get("/search", function() {
    return view("search");
})->name('search');


/*
 * --------------BEGINN OF LEAGUE RELATED ROUTES--------------
 */



/**
 * Returns the View for an Overview of all Seasons
 */
Route::get("league/overview", function() {



    return view("league.leagueoverview.season_overview");
})->name('league_overview');


Route::get("league/season/{season_id}", "SeasonController@index")
        ->name("season_overview");


/*
 * displays all Divisions related to the Seasons
 */
Route::get("league/season/{season_id}/divisions", "DivisonController@index")
        ->name("divison_overview");



/*
 * Displays all Groups related to the Division and Season
 */
Route::get("league/season/{season_id}/divison/{divison_id}/groups", "GroupController@index")
        ->name("group_overview");


//Route::get("league/season/{season_id}/divison/{divison_id}/group/{group_id}","")->name("single_group");
/*
 * This Route describes the Client
 */
Route::get("league/client", function() {
    return view("league.download_client");
})->name("client_download");

Route::get("/faq", function() {
    return view("league.faq");
})->name('faq');


/*
 * This Route describes the League Rules
 */
Route::get("league/rules", function() {
    return view("league.rules");
})->name("league_rules");




/*
 * This Route defines My League
 */
Route::get("league/myleague", "MyLeagueController@ViewOrganiser")
        ->name("myleague")->middleware('auth');




/*
 * --------------END OF LEAGUE RELATED ROUTES--------------
 */

/**
 * Route for creating a new Team Ressource (Can only be called if User is not in a Team)s
 */
Route::get("league/createTeam", "TeamRegisterController@index")
        ->name("teamregister")->middleware('auth');

/**
 * Create a new Team Ressource
 */
Route::post("league/createTeam", "TeamRegisterController@createTeam")
        ->name("createnewteam")->middleware('auth');

/**
 * Validate the Inputs via AJAX For Frontend Validation
 */
Route::post("league/createteam/validate", "TeamRegisterController@checkRemoteValidation")
        ->name("validatecreateteam")->middleware('auth');



/*
 * --------------BEGINN OF PROFILE RELATED ROUTES--------------
 */


/*
 * Returns the View of the Userprofile
 */
Route::get("/user/{username}", "UserprofilePageController@getUserProfileData")
        ->name("profilepage");

/*
 * Returns the View of the Profilesettings
 */
Route::get("/mySettings", "ProfileSettingsController@getProfileSettings")
        ->name("profilesettings")->middleware('auth');




Route::post("/notification/{notification_id}/read", function() {

//Auth::user()->unreadNotifications->where('id', $id)->markAsRead();
});


Route::get("/notifications/read", function() {

    Auth::user()->unReadNotifications->markAsRead();
    return redirect()->back();
})->middleware('auth')->name('readAllNotifications');

/**
 * Sets the Steam-ID of the current User, this should be done only once and can only be revoked by an Admin
 */
Route::get("verifySteamAccount", "ProfileSettingsController@setSteamID")
        ->name("setsteamid")->middleware('auth');


/*
 * Updates the ProfileImage
 */
Route::post('/updateProfileImage', "ProfileSettingsController@updateProfilePicture")
        ->name('updateprofilepicture')->middleware('auth');

/*
 * Updates the rest of the Profile
 */
Route::post("updateProfile", "ProfileSettingsController@updateProfileSettings")
        ->name("updateProfile")->middleware('auth');




/*
 * Displays Profile related Tickets
 *
 */
Route::get("/mytickets", "ProfileTicketController@index")
        ->middleware('auth')->name("profiletickets");


/*
 * Views the Details of the Ticket with the given ID
 */
Route::get("myticket/{ticket_id}", "ProfileTicketController@getTicketDetails")
        ->middleware('auth')->name("viewticket");


/**
 * Displays the Form to create a new Ticket
 */
Route::get("mytickets/new", function() {


    return view("useraccount.ticket");
})->middleware('auth')->name("newticket");


/*
 * -------------- END OF PROFILE RELATED ROUTES--------------
 */




Route::get("/support", function() {


    return view("league.support");
})->name('support');


/*
 * Creates a new Supportticket
 */

Route::post("/support/new", "ProfileTicketController@store")
        ->middleware("auth")->name("createticket");

/*
 *  --------------BEGINN OF AUTHENTIFICATION RELATED ROUTES--------------
 */

/* Holds all necessary Authentication Routes */
/**
 * Custom Logout Route to prevend Logout-Errors
 */




Auth::routes();


Route::get("/logout", function() {

    Auth::logout();

    return view('about');
})->name('advanced_logout');


/**
 * Displays a Forogt Username
 */
Route::get('/forgotUsername', function() {
    return view('emails.ForgotUsername');
})->middleware('guest')->name('account.usernameforget');


/**
 * Startpage as Logged-In User
 */
Route::get('/home', 'HomeController@index')
        ->name('home');
/*
 *  --------------END OF AUTHENTIFICATION RELATED ROUTES--------------
 */



/*
 * --------------BEGIN OF TEAM RELEATED ROUTES--------------------
 */

/*
 * Returns the View of the Team with the given Teamid
 */
Route::get("/teams/{teamid}", "TeamPageController@index"
)->name("teampage");


Route::get("teams/{teamid}/edit", "TeamPageController@edit")->name('edit_team')->middleware('team_admin');


/**
 * User leaves the Team if he wishes to do
 */
Route::post("/teams/leave", "TeamPageController@leaveTeam")->name("leave_team")->middleware('auth');


/**
 * Save Team-Settings
 */
Route::post("/teams/save", "TeamPageController@saveSettings")->name("save_team")->middleware("team_admin");

Route::post("/teams/updateImage")->name('team_updateTeamlogo')->middleware('auth')->middleware("team_admin");

Route::get("/team/{teamid}/kick/{userid}", "TeamPageController@kickPlayerFromTeam")->name('kick_player_from_team')->middleware('team_admin');



/*
 * --------------END OF TEAM RELATED ROUTES--------------------------
 */



/*
 * --------------BEGIN OF FORUM RELEATED ROUTES--------------------
 */

/**
 * Displays the Root of the Forum aka the Forum-Overview
 */
Route::get("/forum", "ForumController@index")->name('forum');

/*
 * Displays all Threads
 */
Route::get("forum/{forums_category_id}", "ForumThreadsController@index")
->name('viewthreads');

Route::get("/forum/newthread", "ForumThreadsController@threadCreator")
    ->name('createthread');

Route::get("forum/thread/{id}", "ForumPostsController@index")
->name('viewthread');

Route::post("forum/thread/{id}", "ForumThreadsController@newThread")
        ->name('newthread');

Route::post("forum/thread/{id}", "ForumPostsController@createPost")
    ->name('newpost');

Route::post("forum/thread/{id}", "ForumPostsController@closeThread")
    ->name('closethread');

Route::post("forum/thread/{id}", "ForumPostsController@reportPost")
    ->name('reportpost');

/*
 * --------------END OF FORUM ROUTES--------------------
 */

/*
 * ----------------------------BEGIN OF STATISTIC ROUTES------------------
 */

Route::get("/statistics", function() {
    return view("statistics.statistics_overview");
})->name('statistics');

Route::get("/statistics/teams", function() {
    return view("statistics.statistics_teams");
})->name('teamstats');

Route::get("/statistics/players", function() {
    return view("statistics.statistics_players");
})->name('playerstats');

Route::get("/statistics/maps", function() {
    return view("statistics.statistics_maps");
})->name('mapstats');

/*
 * --------------END OF STATISTIC ROUTES--------------------
 */

/*
 * ----------------------------BEGIN OF ADMIN RELATED ROUTES------------------
 */



/*
 * Index/Startpage of the Adminpanel
 */
Route::get("/admin", "adminpanel\AdminpanelIndexController@index")
        ->middleware('admin')->name('admin');
/*
 * Overview of all News
 */
Route::get('/admin/news', "adminpanel\AdminPanelNewsController@index")
        ->middleware('admin')->name('adminpanel_newsindex');
/*
 * Returns the View to create a new News
 */
Route::get("/admin/news/new", "adminpanel\AdminPanelNewsController@create")
        ->middleware('admin')->name("adminpanel_createnews");


/*
 * Stores /Saves a newly created News in the Database
 */
Route::post("/admin/news/store", "adminpanel\AdminPanelNewsController@store")
        ->middleware('admin')->name("adminpanel_storenews");

/*
 * Shows a newly created News as preview
 */
Route::post("/admin/news/show", "adminpanel\AdminPanelNewsController@show")
        ->middleware('admin')->name("adminpanel_shownews");

/*
 * Deletes a News with the given News ID
 */
Route::post("/admin/news/delete/{id}", "adminpanel\AdminPanelNewsController@destroy")
        ->middleware('admin')->name("adminpanel_deltenews");

/*
 * Edits a News with the given ID
 */
Route::get("/admin/news/edit/{id}", "adminpanel\AdminPanelNewsController@edit")
        ->middleware('admin')->name("adminpanel_editnews");

/*
 * Updates a News with the given ID
 */
Route::post("/admin/news/update/{id}", "adminpanel\AdminPanelNewsController@update")
        ->middleware('admin')->name("adminpanel_updatenews");



/*
 * Default View for all Players /Users in Nadestack
 */
Route::get("admin/player", "adminpanel\Playercontroller@index")
        ->middleware("admin")->name("adminpanel_playerindex");


/*
 * Edits a playerprofile with the given player-ID
 */
Route::get("admin/player/{player_id}/edit", "adminpanel\Playercontroller@edit")
        ->middleware("admin")->name("adminpanel_editplayer");

/*
 * Overview of all Tickets
 */
Route::get("admin/tickets", "adminpanel\TicketController@index")
        ->middleware("admin")->name("adminpanel_ticketindex");

/*
 * Edits a Ticket with the given ID
 */
Route::get("admin/ticket/{id}/edit", "adminpanel\TicketController@edit")
        ->middleware("admin")->name("adminpanel_editticket");

/**
 * Adds a new Repsonse to the given Ticket-ID Entry
 */
Route::post("admin/ticket/{id}/store", "adminpanel\TicketController@store")
        ->middleware("admin")->name("adminpanel_ticketresponse");

/*
 * Route for the Overview of all teams in the Adminpanel
 */
Route::get("admin/teams", "adminpanel\TeamController@index")
        ->middleware("admin")->name("adminpanel_teamindex");

/*
 * Route for Editing a Team
 */
Route::get("admin/team/{teamid}/edit", "adminpanel\TeamController@edit")
        ->middleware("admin")->name("adminpanel_editteam");


/*
 * -----------------------------END OF ADMIN RELATED ROUTES-------------------
 */

/*
 * -----------------------------BEGIN OF FOOTER ROUTES-------------------
 */

Route::get("/about", function() {
    return view("about");
})->name('about');

/*
 * -----------------------------END OF FOOTER ROUTES-------------------
 */


