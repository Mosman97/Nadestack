@extends('adminpanel.templates.dashboardtemplate')
@section('content')




    <h2 class="text-center nadestack_heading_two nadestack-first-element">Ticket: {{$ticket_metadata[0]['title']}}</h2>
    <hr>
    <h3 class="text-center nadestack_heading_three" style="color: green">Status: Open</h3>
    <h3 class="text-center nadestack_heading_three">Category: {{$ticket_metadata[0]['category']}}</h3>
    <button class="btn btn-warning" type="button">
        <a data-toggle="modal" data-target="#modalComment">Add Comment</a>
    </button>
    <hr style="margin-bottom: 13px">
    
    
    
    
    @foreach($responses as $response)
        <div class="row">
        <div class="col-md-3">
            <p>{{$response->username}}</p>
            <p>{{$response->created_at}}</p>
        </div>
        <div class="col">
            <p>{{$response->content}}</p>
        </div>
    </div>    
       <hr>

    @endforeach

    <!-- Nachrichtsection -->


    <!-- AntwortSection -->
 
    <div class="row" style="margin-top: 15px">
        <div class="col">
            <form class="nadestack_form" method="post" enctype="multipart/form-data" action="#">
                <div class="form-row form-group">
                    <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Answer:</label></div>
                    <div class="col-sm-8 input-column"><textarea class="form-control" style="height: 250px;"></textarea></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 col-xl-3 offset-xl-0 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label text-white" for="repeat-pawssword-input-field">File Upload:</label></div>
                    <div class="col"><input type="file"><label>(max. 3 Files)</label></div>
                </div>
                <div class="form-row">
                    <div class="col text-center nadestack-last-element"><button class="btn btn-danger" type="button" style="margin-top: 10px;">Answer</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection

<!-- modaler dialog für comment -->
<div class="modal fade" id="modalComment" tabindex="-1" role="dialog" aria-hidden="true" style="color: white">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #474B4F; font-family: 'Roboto';">
            <form action="#"  method="POST">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Add Comment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-4 text-center">
                        <textarea class="form-control" style="height: 300px"></textarea>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-danger" type="button">Add Comment</button>
                </div>
            </form>
        </div>
    </div>
</div>
