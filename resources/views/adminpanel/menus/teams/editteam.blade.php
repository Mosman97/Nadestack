@extends('adminpanel.templates.dashboardtemplate')
@section('content')

<div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center">
    <div class="col-md-1"></div>
    <h3 class="text-dark mb-1 text-center">Edit {{$teamdata->team_name}}</h3>
    <div class="col-md-3"></div>
</div>

<hr>

<form>
    @csrf
    <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
        <div class="col-md-1"></div>
        <h4 class="text-center">General Settings</h4>
        <div class="col-md-3"></div>
    </div>

    <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
        <label class="col-md-1">Teamname:</label>
        <input class="col form-control" type="text" id="team_name" required value="{{$teamdata->team_name}}">
        <div class="col-md-3"></div>
    </div>

    <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
        <label class="col-md-1">Teamtag:</label>
        <input class="col form-control" type="text" id="team_tag" required value="{{$teamdata->team_tag}}">
        <div class="col-md-3"></div>
    </div>

    <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
        <label class="col-md-1">Orga:</label>
        <input class="col form-control" type="text" id="orga">
        <div class="col-md-3"></div>
    </div>

    <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
        <label class="col-md-1">Website:</label>
        <input class="col form-control" type="text" id="website" value="{{$teamdata->team_website}}">
        <div class="col-md-3"></div>
    </div>

    <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
        <label class="col-md-1">Description:</label>
        <textarea class="col form-control" style="height: 120px;" type="text" id="description">{{$teamdata->team_desc}}</textarea>
        <div class="col-md-3"></div>
    </div>

    <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
        <label class="col-md-1">Teamlogo:</label>
        <img  src="{{URL::asset('assets/img/teamlogos')}}/{{$teamdata->team_logo}}" style="width: 300px;height: 300px;">
        <div class="col-md-3"></div>
    </div>

    <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
        <label class="col-md-1">Twitter:</label>
        <input class="col form-control" type="text" id="twitter" value="{{$teamdata->twitter_url}}">
        <div class="col-md-3"></div>
    </div>

    <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
        <label class="col-md-1">Twitch:</label>
        <input class="col form-control" type="text" id="twitch" value="{{$teamdata->twitch_url}}">
        <div class="col-md-3"></div>
    </div>

    <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
        <label class="col-md-1">Instagram:</label>
        <input class="col form-control" type="text" id="instagram" value="{{$teamdata->instagram_url}}">
        <div class="col-md-3"></div>
    </div>

    <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
        <label class="col-md-1">Youtube:</label>
        <input class="col form-control" type="text" id="youtube" value="{{$teamdata->youtube_url}}">
        <div class="col-md-3"></div>
    </div>

    <hr>

    <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow" >
        <div class="col-md-1"></div>
        <h4 class="text-center">Players</h4>
        <div class="col-md-3"></div>
    </div>

    <div class="text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow" style="margin-top: 18px; margin-bottom: 18px">
        <div class="col-md-1"></div>
        <button type="button" class="btn btn-success">Save Team</button>
        <div class="col-md-3"></div>
    </div>

</form>



@endsection
