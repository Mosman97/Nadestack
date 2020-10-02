@extends('adminpanel.templates.dashboardtemplate')
@section('content')


    <div style="margin-top: 18px; margin-bottom: 18px">
        <button type="button" class="btn btn-warning">Warn User</button>
        <button type="button" class="btn btn-danger">Ban User</button>
    </div>

    <h3 class="text-dark mb-1" style="padding-bottom: 15px;">Edit User {{$userdata->username}}</h3>
    <!-- if user is not verified -->
    <button type="button" class="btn btn-lg btn-success">Verify User</button>

    <form>
        @csrf
        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Username:</label>
            <input required class="col form-control" type="text" id="username" value="{{$userdata->username}}">
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Verification ID:</label>
            <input class="col form-control" type="text" id="verifyid" readonly>
            <div class="col-md-3"></div>
        </div>

        @if ($userdata->team_id != NULL)
        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Team:</label>
            <a class="col form-control text-left" readonly href="{{route('adminpanel_editteam',$userdata->team_id)}}">Teamname</a>
            <div class="col-md-3"></div>
        </div>
        @endif

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">First Name</label>
            <input class="col form-control" type="text" id="firstname" value="{{$userdata->forname}}">
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Last Name</label>
            <input class="col form-control" type="text" id="lastname" value="{{$userdata->lastname}}">
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Birthday</label>
            <input class="col form-control" id="birthday" type="date" value="{{$userdata->birthday}}">
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Description</label>
            <textarea class="col form-control" style="height: 120px;" type="text" id="description">{{$userdata->description}}</textarea>
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">SteamID</label>
            <input class="col form-control" type="text" id="steamid" readonly value="{{$userdata->steamid}}">
            <div class="col-md-3"></div>
        </div>
        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <div class="col-md-1"></div>
            <button type="button" class="btn btn-danger">Remove Steam Connection</button>
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Avatar</label>
            <img  src="{{URL::asset('assets/img/profile_pictures/')}}/{{$userdata->avatar_url}}" style="width: 300px;height: 300px;">
            <div class="col-md-3"></div>
        </div>
        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <div class="col-md-1"></div>
            <button type="button" class="btn btn-danger">Remove Avatar</button>
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Twitter</label>
            <input class="col form-control" type="text" id="twitter" value="{{$userdata->twitter_url}}">
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Instagram</label>
            <input class="col form-control" type="text" id="instagram" value="{{$userdata->instagram_url}}">
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Twitch</label>
            <input class="col form-control" type="text" id="twitch" value="{{$userdata->twitch_url}}">
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Youtube</label>
            <input class="col form-control" type="text" id="youtube" value="{{$userdata->youtube_url}}">
            <div class="col-md-3"></div>
        </div>

        <div class="text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow" style="margin-top: 18px; margin-bottom: 18px">
            <div class="col-md-1"></div>
            <button type="button" class="btn btn-success">Save User</button>
            <div class="col-md-3"></div>
        </div>

    </form>
@endsection
