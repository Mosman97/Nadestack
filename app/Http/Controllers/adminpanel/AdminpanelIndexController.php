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

    /**
     * Handles the NewsIndexpage in the Adminpanel
     * @param Request $request
     * @return type
     */
    public function newsindex(Request $request) {




        //Retrieving 10 News per Page 
        $news_data = News::paginate(10)->toArray();

        //Retrieving all News from the Datbase


        return view("adminpanel.menus.newsindex")->with("news", $news_data);
        

    }

}
