<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\News;
use Illuminate\Support\Collection;

class AdminpanelIndexController extends Controller {

    public function index(Request $request) {



        return view('adminpanel.adminindex');
    }



}
