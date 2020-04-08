@extends('adminpanel.templates.dashboardtemplate')
@section('content')

<h3 class="text-dark mb-1 text-center" style="padding-bottom: 15px;">Ticket-Overview</h3>

<hr>


<div class="row text-center justify-content-center">
    <div class="col-md-6">
        <form class="form navbar-search" method="GET" action="{{route('adminpanel_teamindex')}}">
            @csrf
            <div class="input-group">
                <input class="bg-white form-control border-0 small" id="team_search" name="search_query" type="text"placeholder="Search Teamname, Team-Tag or Team-ID in Database">
                <div class="input-group-append">
                    <button class="btn btn-primary py-0" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
<hr>

<div class="row">
    <div class="col">
        <a href="#" style="padding-right: 30px;">All</a>
        <a href="#" style="padding-right: 30px;">Sort by Date</a>
        <a href="#" style="padding-right: 30px;">Sort by Username</a>
        <a href="#" style="padding-right: 30px;">Sort by Status</a>
    </div>
    <div class=" col text-right">
      <!--  <button type="button" class="btn btn-danger">Ban User</button> -->
    </div>
</div>

<div class="table-responsive"
     style="padding-top: 10px;">
    <table class="table text-center" id="player_table">
        <thead>
            <tr>
                <th></th>
                <th>Teampicture</th>
                <th>Team-ID</th>
                <th>Teamname</th>
                <th>Team-Tag</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($teams as $team)
            <tr id='{{ $team->team_id}}'>
                <td><input type="checkbox"></td>
                <td> {{ $team->team_id }}</td>
                <td> {{ $team->team_name }}</td>
                <td> {{$team->team_tag}}</td>
                <td> TODO</td>
                <td> {{ $team->created_at }}</td>
                <td><div class="btn-group"  style=""role="group" aria-label="Basic example">
                        <a type="button" disabled="true" class="btn btn-info" id='player_edit_btn' href="{{route('adminpanel_editteam',$team->team_id)}}">Edit Team</a>
                        <div class="divider"></div>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>




<div id="team_pagination" class="mx-auto">

    {{$teams->render()}}
</div>

@endsection
