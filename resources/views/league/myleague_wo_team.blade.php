@extends('templates.league_default_template')

@section('content')

<div class="col colum_content_small">
    <h1 class="text-center nadestack_heading_one">Join a team</h1>
    <h2 class="text-center nadestack_heading_two">Find team by name:</h2>
    <div class="row">
        <div class="col-xl-3 text-center"></div>
        <div class="col text-center">
            <form>
                <div class="form-group" id="search_bar">
                    <label class="d-xl-flex justify-content-xl-start align-items-xl-center" id="search_bar_label">
                        <i class="fa fa-search" id="search_bar_icon"></i>
                        <input class="form-control" type="search" id="ip">
                    </label>
                </div>
            </form>
        </div>
        <div class="col-xl-3"></div>
    </div>
    <h2 class="text-center nadestack_heading_two">Create your own team:</h2>
    <div class="row" style="padding-bottom: 15px;">
        <div class="col text-center"><a href="{{route('teamregister')}}"><button class="btn nadestack_btn" type="button">Create a Team</button></a></div>
    </div>
</div>
@endsection
