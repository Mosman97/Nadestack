@extends('templates.default_template')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6 colum_content_big text-center" style="background-color: unset">
                    <img src='{{URL::asset('assets/img/404.jpeg')}}' alt="404-Page not found" style="width: 100%;">
                    <!--<div class="row">
                        <div class="col text-right"><button class="btn btn-primary nadestack_btn" type="button" style="margin-bottom: 15px">Go Home</button></div>
                        <div class="col text-left"><button class="btn btn-primary nadestack_btn" type="button" style="margin-bottom: 15px">Contact Us</button></div>
                    </div>-->
            </div>
            <div class="col-xl-3"></div>
        </div>
    </div>
@endsection
