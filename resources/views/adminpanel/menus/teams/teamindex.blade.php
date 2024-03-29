@extends('adminpanel.templates.dashboardtemplate')
@section('content')


@if(count($teams) == 0)

<div class="alert alert-danger" id='success-alert'>
    No Team with the given Search Parameter Found
</div>

@endif

@if ($errors->any())
@foreach ($errors->all() as $error)
<div>{{$error}}</div>
@endforeach
@endif


@if(session('msg'))


<div class="alert alert-success" id='success-alert'>
    {{ session('msg') }}
</div>

@endif


<script>

    $('document').ready(function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var selected_row = null;

        $('#player_table >tbody >tr > td > input').on('click', function (e) {

            if ($(this).prop('checked')) {


                //Getting Row ID
                selected_row = $(this).parent().parent().attr("id");

                //Enable Buttons
                $(this).parent().parent().find("td:last").find("button").prop('disabled', false);
                $(this).parent().parent().addClass("news_select_highlightning");
                
                
                $('#delete-teamid').val(selected_row);

            } else {

                //Disbale Buttons
                $(this).parent().parent().find("td:last").find("button").prop('disabled', true);

                $(this).parent().parent().removeClass("news_select_highlightning");

                //Reset selected row

                selected_row = null;
            }


        });


        /**
         * Handles the Click if a News has to bee deleted
         */
        $('#delete_news_btn').on('click', function (e) {

            //    console.log(selected_row);

            $.ajax({
                type: 'POST',
                url: "{{route('adminpanel_deltenews','')}}/" + selected_row,
                data: {_token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function (msg) {

                    console.log(msg);

                    if (msg) {

                        location.reload();
                    }
                }
            });


        });


        /* $('#player_edit_btn').on('click', function (e) {
         
         
         window.location.href = "{{route('adminpanel_editnews','')}}/" + selected_row;
         });*/

        /**
         * Search Logic
         */


        /*  $(document).on('keyup', '#player_search', function () {
         
         
         if ($('#player_search').val().length == 0) {
         
         
         location.reload();
         } else {
         
         //stuff happens
         console.log("key");
         
         $.ajax({
         type: 'GET',
         url: "{{route('adminpanel_playerindex')}}",
         data: {_token: "{{ csrf_token() }}", search_input: $('#player_search').val()
         },
         dataType: 'json',
         success: function (result) {
         
         console.log(result);
         
         
         $('#player_table >tbody').html("");
         
         
         for (var i = 0; i < result.length; i++) {
         
         $('#player_table >tbody').append("<tr id='" + result[i]['id'] + "'>");
         $('#player_table > tbody').append("<td><input type='checkbox'></td>");
         $('#player_table >tbody').append("<td>" + result[i]['id'] + "</td>");
         $('#player_table >tbody').append("<td>" + result[i]['username'] + "</td>");
         
         if (result[i]['team_name'] != null) {
         
         $('#player_table >tbody').append("<td>" + result[i]['team_name'] + "</td>");
         } else {
         
         $('#player_table >tbody').append("<td>" + "No Team" + "</td>");
         }
         $('#player_table >tbody').append("<td>" + result[i]['created_at'] + "</td>");
         $('#player_table >tbody').append("</tr>");
         
         
         
         }
         
         
         
         },
         error: function (e) {
         
         console.log(e);
         }
         });
         
         }
         
         
         
         });*/




    });




</script>


<h3 class="text-dark mb-1 text-center" style="padding-bottom: 15px;">Team-Overview</h3>

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
                <td><img src="{{URL::asset('assets/img/teamlogos')}}/{{$team->team_logo}}" width="50px" height="50px"></td>

                <td> {{ $team->team_id }}</td>
                <td> {{ $team->team_name }}</td>
                <td> {{$team->team_tag}}</td>
                <td> TODO</td>
                <td> {{ $team->created_at }}</td>
                <td><div class="btn-group"  style=""role="group" aria-label="Basic example">
                        <a type="button" class="btn btn-info"  id='player_edit_btn' href="{{route('adminpanel_editteam',$team->team_id)}}">Edit Team</a>
                        <button   disabled=""class='btn btn-danger'  id='delete_team_btn' data-toggle="modal" data-target="#deleteteammodal">Delete Team</button>
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
<!-- Ban Modal -->
<div class="modal fade" id="deleteteammodal" tabindex="-1" role="dialog" aria-labelledby="deleteteammodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Banoptions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action='{{route('admin_delete_team')}}'>
                @csrf
                <input name="teamid" value="" id="delete-teamid" hidden="">
                <div class="modal-body">

                    <h3>Do you really want to delete the selected Team?</h3>
                    <div class="form-group row">
                        <div class="col-4">
                            <label  class="col-4 col-form-label">Password:</label>
                        </div>

                        <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>
                                <input id="pw-field" required="" minlength="0" name="pw" type="password" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="delete_news_btn" class="btn btn-danger" >Delete Team</button>
            </form>
        </div>
    </div>
</div>
</div>




@endsection
