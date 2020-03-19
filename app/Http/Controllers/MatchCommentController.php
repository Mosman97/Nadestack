<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    
class MatchCommentController extends Controller
{
   
    
    
    
    function newMatchComment(Request $request) {
        
        
      return redirect()->back()->with('success', ['your message,here']);   
    }
}
