<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\report;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller {

    public function index(Request $request) {

        if ($request->input('search_query') == NULL) {

            $reports = Report::orderBy('created_at', "desc")->paginate(10);

            return view("adminpanel.menus.reports.reportindex")->with("reports", $reports);
        } else {

            $search_input = $request->input("search_query");
            $reports = Ticket::where("ticket_id", "like", $search_input . "%")
                ->orderBy('created_at', "desc")
                ->paginate(2);

            return view('adminpanel.menus.reports.reportindex')->with("reports",$reports)->with("no_report_found","ss");
        }


    }

}
