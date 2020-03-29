<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileTicketController extends Controller {

    public function index(Request $request) {

        return view("useraccount.tickets_overview");
    }

}
