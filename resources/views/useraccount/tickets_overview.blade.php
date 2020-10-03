@extends('templates.default_template')

@section('content')




<div class="container-fluid nadestack_body">


    {{--- If no Tickets are displayed we show a Dialog, if not we display a Table containing Tickets ---}}

    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col colum_content_big">

            <h1 class="text-center nadestack_heading_one">Your Support Tickets</h1>
            <a href="{{route('support')}}" class="btn nadestack_btn" type="button" style="margin-bottom: 15px; background-color: #86C232; color: #222629">New Ticket</a>
            @if(count($tickets)  == 0)
            <div class="alert alert-danger">No Tickets found</div>
            @else
            <table class="table nadestack-tbl text-center" style="color: white;">
                <thead style="background-color: #1C2022;">
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Last Update</th>
                        <th>Created</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                        <td>{{$ticket->title}}</td>
                        <td>{{$ticket->status}}</td>
                        <td>{{$ticket->updated_at}}</td>
                        <td>{{$ticket->created_at}}</td>
                        <td><a type="button" class="btn nadestack_btn" href='{{route('viewticket',$ticket->ticket_id)}}'>View Ticket</a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @endif
            <div class='justify-center'>{{$tickets->render()}}</div>

        </div>

        <div class="col-xl-3"></div>
    </div>






</div>

@endsection
