<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Admin_log;

class AdminLogController extends Controller {

    public function index(Request $request, $userid) {

        $logdata = Admin_log::where('user_id', "=", $userid)
            ->paginate(20);

        return view('adminpanel.userlog')->with("logdata", $logdata);
    }

}
