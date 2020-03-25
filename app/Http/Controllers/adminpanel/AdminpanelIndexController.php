<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminpanelIndexController extends Controller {
    
    
    
    
    
    
    
    public function index(Request $request) {
        
        
        
        return view('adminpanel.adminindex');
        
          
    }

}
