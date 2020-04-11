<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ticket;
use App\ticketresponse;

class TicketController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        //If no Searchparameter is omitted we return Tickets sorted by Date
        if ($request->input('search_query') == NULL) {
            //Retrieving 10 Teams per Page Sorted by Date DESC
            $tickets = Ticket::orderBy('created_at', "desc")->paginate(2);

            return view("adminpanel.menus.tickets.ticketindex")->with("tickets", $tickets);
        } else {

            $search_input = $request->input("search_query");


            //Retrieving 50 Results
            $tickets = Ticket::where("ticket_id", "like", $search_input . "%")
                    ->orWhere("creator_id", "like", $search_input . "%")
                    ->orderBy('created_at', "desc")
                    ->paginate(2);

            return view("adminpanel.menus.tickets.ticketindex")->with("tickets", $tickets);
        }


        //    return view("adminpanel.menus.tickets.ticketindex");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
        
        
        $ticket_data = Ticket::where("ticket_id", "=", $id)->get();

        $ticket_responses = ticketresponse::select('ticketresponses.*', 'users.username')
                ->where("ticket_id", "=", $id)
                ->leftJoin("users","users.id", "=", "ticketresponses.user_id")
                ->orderBy('created_at', "asc")
                ->get();


        return view("adminpanel.menus.tickets.editticket")->with("responses", $ticket_responses)->with("ticket_metadata",$ticket_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
