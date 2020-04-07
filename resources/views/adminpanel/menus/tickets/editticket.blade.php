@extends('adminpanel.templates.dashboardtemplate')
@section('content')

    <h2 class="text-center nadestack_heading_two nadestack-first-element">Ticket: Bitte AlexRr für freche Plays bannen!</h2>
    <hr>
    <h3 class="text-center nadestack_heading_three" style="color: green">Status: Open</h3>
    <h3 class="text-center nadestack_heading_three">Category: Cheating</h3>

    <div class="row">
        <div class="col">
            <form class="nadestack_form" method="post" enctype="multipart/form-data" action="#">
                <div class="form-row form-group">
                    <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Answer:</label></div>
                    <div class="col-sm-8 input-column"><textarea class="form-control" style="height: 250px;"></textarea></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 col-xl-3 offset-xl-0 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label text-white" for="repeat-pawssword-input-field">File Upload:</label></div>
                    <div class="col"><input type="file"><label>(max. 3 Files and 500 MB in total)</label></div>
                </div>
                <hr class="bg-light"/>
                <div class="form-check text-center"><input class="form-check-input" type="checkbox" id="formCheck"><label class="form-check-label" for="formCheck">I've read and accept the <a style="color: red;" href="http://www.99damage.de">terms and conditions</a></label></div>
                <div class="form-row">
                    <div class="col text-center nadestack-last-element"><button id="submit_btn" class="btn nadestack_btn" type="button" style="margin-top: 10px;">Submit Ticket</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection

<a data-toggle="modal" data-target="#modalComment">Add Comment</a>
<!-- modaler dialog für comment -->
<div class="modal fade" id="modalComment" tabindex="-1" role="dialog" aria-hidden="true" style="color: white">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #474B4F; font-family: 'Roboto';">
            <form action="#"  method="POST">

            </form>
        </div>
    </div>
</div>
