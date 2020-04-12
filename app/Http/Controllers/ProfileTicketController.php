<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Ticket;

class ProfileTicketController extends Controller {

    public function index(Request $request) {


        $tickets = Ticket::where('creator_id', '=', Auth::user()->id)->orderBy('created_at', "desc")->paginate(2);

        return view("useraccount.tickets_overview")->with("tickets", $tickets);
    }

    public function getTicketDetails($ticket_id) {


        return view("useraccount.ticket");
    }

    /*
     * Creates a new Ticket
     */

    public function store(Request $request) {

        //Retrieving all Inputs Ressoruce for creating the Ticket
        $ticket_category = $request->input('category');
        $ticket_title = $request->input("title");
        $ticket_content = $request->input('content');

        $ticket = new Ticket;

        $ticket->creator_id = Auth::user()->id;
        $ticket->title = $ticket_title;
        $ticket->content = $ticket_content;
        $ticket->category = $ticket_category;
        $ticket->status = 0;
        $ticket->save();
        
        return back()->with("success","Your Ticket has been created!");
    }

}
