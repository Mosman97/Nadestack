@extends('templates.default_template')

@section('content')

    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-2"></div>
            <div class="col colum_content_small">
                <h1 class="text-center nadestack_heading_one">Download Nadestack Client</h1>
                <div class="row text-center">
                    <div class="col-xl-2"></div>
                    <div class="col"><label class="col-form-label">Download the Client to play. While you are playing on our servers, you need to start the monitoring in Moss. After the match you are able to upload the data to our servers. </label></div>
                    <div class="col-xl-2"></div>
                </div>
                <div class="row" style="padding-bottom: 15px;">
                    <div class="col text-center"><button class="btn nadestack_btn" type="button">Download Client</button></div>
                </div>
                <div class="row text-center">
                    <div class="col"><label class="col-form-label">Supports only Windows 64 Bit</label></div>
                </div>
            </div>
            <div class="col-xl-2"></div>
        </div>
    </div>

@endsection
