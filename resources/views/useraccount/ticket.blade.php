@extends('templates.default_template')

@section('content')
<div class="container-fluid nadestack_body">
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col colum_content_big">
            <h2 class="text-center nadestack_heading_two nadestack-first-element">Ticket: {{$ticket_metadata->title}}</h2>
            <hr class="bg-light">
            <h3 class="text-center nadestack_heading_three" style="color: green">Status: {{$ticket_metadata->status}}</h3>
            <h3 class="text-center nadestack_heading_three">Category: {{$ticket_metadata->category}}</h3>

            {{---Displaying all Respones to this Ticketd Order by Date ASC---}}

            @foreach($ticket_responses as $ticket_response)
            <hr class="bg-light">
            <div class="row">
                <div class="col-md-3">
                    <p>Admin</p>
                    <p>{{$ticket_response->username}}</p>
                    <p>{{$ticket_response->created_at}}</p>
                </div>
                <div class="col">
                    <p>{{$ticket_response->content}}</p>
                </div>
            </div>
            @endforeach


            <hr class="bg-light">
            <h3 class="text-center nadestack_heading_three">Response to Ticket</h3>
            <div class="row">
                <div class="col">
                    <form method="post" enctype="multipart/form-data" action="{{route('responseticket', $ticket_metadata->ticket_id)}}">
                        <div class="form-row form-group">
                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Answer:</label></div>
                            <div class="col-sm-8 input-column"><textarea required minlength="20" maxlength="10000" name="content" class="form-control" style="height: 250px;"></textarea></div>
                        </div>
                        @csrf
                        <div class="form-row form-group">
                            <div class="col-sm-4 col-xl-3 offset-xl-0 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label text-white" for="repeat-pawssword-input-field">File Upload:</label></div>
                            <div class="col"><input type="file"><label>(max. 3 Files and 500 MB in total)</label></div>
                        </div>
                        <hr class="bg-light"/>
                        <div class="form-check text-center"><input required class="form-check-input" type="checkbox" id="formCheck"><label class="form-check-label" for="formCheck">I've read and accept the <a style="color: red;" href="http://www.99damage.de">terms and conditions</a></label></div>
                        <div class="form-row">
                            <div class="col text-center "><button id="submit_btn" class="btn nadestack_btn" type="submit" style="margin-top: 10px;">Answer</button></div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-xl-3"></div>
    </div>
</div>

@endsection
