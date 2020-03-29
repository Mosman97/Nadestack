@extends('templates.default_template')

@section('content')

    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col colum_content_big">
                <h1 class="text-center nadestack_heading_one">Ticket title</h1>

                <h2 class="text-center nadestack_heading_two">Status: Open</h2>

                <div class="row">
                    <div class="col-md-3">
                        <p>Syn</p>
                        <p>20.3.20 - 19:22</p>
                    </div>
                    <div class="col">
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <form class="nadestack_form nadestack-first-element" id="profile_settings_form" method="post" enctype="multipart/form-data" action="#">
                            <div class="form-row form-group">
                                <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Description:</label></div>
                                <div class="col-sm-6 input-column"><textarea class="form-control" style="height: 250px;"></textarea></div>
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

            </div>
            <div class="col-xl-3"></div>
        </div>
    </div>

@endsection
