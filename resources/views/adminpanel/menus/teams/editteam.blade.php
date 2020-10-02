@extends('adminpanel.templates.dashboardtemplate')
@section('content')


<h3 class="text-dark mb-1 text-center" style="padding-bottom: 15px;">Edit Team</h3>

<hr>

<form>
    @csrf
    <h4 class="text-center">General Settings</h4>

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
        <label class="col-md-1">Description:</label>
        <textarea class="col form-control" style="height: 120px;" type="text" id="description">{{$teamdata->team_desc}}</textarea>
        <div class="col-md-3"></div>
    </div>

    <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
        <label class="col-md-1">Teamlogo:</label>
        <img  src="{{URL::asset('ssets/img/teamlogos')}}/{{$teamdata->team_logo}}" style="width: 300px;height: 300px;">
        <div class="col-md-3"></div>
    </div>

    <h4 class="text-center" style="margin-top: 15px">Players</h4>

    <div class="text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow" style="margin-top: 18px; margin-bottom: 18px">
        <div class="col-md-1"></div>
        <button type="button" class="btn btn-success">Save Team</button>
        <div class="col-md-3"></div>
    </div>

</form>



@endsection
