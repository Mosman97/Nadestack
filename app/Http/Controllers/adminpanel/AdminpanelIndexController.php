<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\report;
use App\Team;
use App\User;
use App\Ticket;

class AdminpanelIndexController extends Controller {

    public function index(Request $request) {


        $team_count = Team::count();
        $user_count = User::count();
        $open_tickets_count = Ticket::where("status", "=", "0")->count();
        $report_count = report::count();

        //Retrieving Data from Datbase for Information and Visualization in the Dashboard-Index of the Adminpanel

        return view('adminpanel.adminindex')
            ->with("team_count", $team_count)
            ->with("user_count", $user_count)
            ->with("report_count", $report_count)
            ->with( "open_tickets", $open_tickets_count);
    }

}
