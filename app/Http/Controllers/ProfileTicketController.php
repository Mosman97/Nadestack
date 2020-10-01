<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Ticket;
use App\ticketresponse;
use App\Http\Controllers\DB;

class ProfileTicketController extends Controller {

    public function index(Request $request) {


        $tickets = Ticket::where('creator_id', '=', Auth::user()->id)
            ->orderBy('created_at', "desc")
            ->paginate(5);

        return view("useraccount.tickets_overview")->with("tickets", $tickets);
    }




    public function getTicketDetails($ticket_id) {

        //Get Metadata of the Ticket
        $ticket_metadata = Ticket::select('tickets.*', 'users.username')
                ->where("ticket_id", "=", $ticket_id)
                ->leftJoin('users', 'users.id', "=", "tickets.creator_id")
                ->first();
        //Responses related to the Ticket
        $ticket_responses = ticketresponse::select('ticketresponses.*',"users.username","users.nadestack_admin")
                ->where('ticket_id', "=", $ticket_id)
                ->leftJoin('users', 'users.id', "=", "ticketresponses.user_id")
                ->orderBy("created_at","asc")
                ->get();
        //Returning Ticket with Responses
        return view("useraccount.ticket")
            ->with("ticket_metadata", $ticket_metadata)
            ->with("ticket_responses", $ticket_responses);
    }

    //user antwort auf ein ticket
    //TODO attached files
    public function responseTicket(Request $request, $ticket_id)
    {
        $content = $request->input('content');

        $ticketresponse = ticketresponse::create(
            [
                "ticket_id" => $ticket_id,
                "user_id" => Auth::user()->id,
                "content" => $content,
            ]);

        return back()->with("success", "answer!");
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
        $ticket->category = $ticket_category;
        $ticket->status = 0;
        $ticket->save();

        $newticket = Ticket::where('creator_id', '=', $ticket->creator_id)
            ->orderBy('created_at', 'desc')
            ->first();
        //Create a new TicketResponse
        $ticketresponse = ticketresponse::create(
            [
                "ticket_id" => $newticket->ticket_id,
                "user_id" => Auth::user()->id,
                "content" => $ticket_content,
            ]);

        return back()->with("success", "Your Ticket has been created!");
    }

}
