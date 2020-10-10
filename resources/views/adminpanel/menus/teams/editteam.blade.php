@extends('adminpanel.templates.dashboardtemplate')
@section('content')


<div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center">
    <div class="col-md-1"></div>
    <h3 class="text-dark mb-1 text-center">Edit {{$teamdata->team_name}}</h3>
    <div class="col-md-3"></div>
</div>



<hr>
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

<ul class="nav nav-pills">
    <li  style="margin-left: 20px !important;font-size: 25px;" class="active"><a data-toggle="pill" href="#home">Team Settings</a></li>
    <li  style="margin-left: 20px !important;font-size: 25px;"><a data-toggle="pill" href="#menu1">Playermanagement</a></li>
</ul>

<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <form method="POST" action="{{route('adminpanel_updateteam',$teamdata->team_id)}}">
            @csrf
            <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
                <div class="col-md-1"></div>
                <h4 class="text-center">General Settings</h4>
                <div class="col-md-3"></div>
            </div>

            <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
                <label class="col-md-1">Teamname:</label>
                <input class="col form-control" type="text" name="teamname" required value="{{$teamdata->team_name}}">
                <div class="col-md-3"></div>
            </div>

            <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
                <label class="col-md-1">Teamtag:</label>
                <input class="col form-control" type="text" name="teamtag" required value="{{$teamdata->team_tag}}">
                <div class="col-md-3"></div>
            </div>

            <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
                <label class="col-md-1">Orga:</label>
                <input class="col form-control" type="text" name="orga">
                <div class="col-md-3"></div>
            </div>

            <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
                <label class="col-md-1">Website:</label>
                <input class="col form-control" type="text" name="website" value="{{$teamdata->team_website}}">
                <div class="col-md-3"></div>
            </div>

            <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
                <label class="col-md-1">Description:</label>
                <textarea class="col form-control"  name="description"style="height: 120px;" type="text">{{$teamdata->team_desc}}</textarea>
                <div class="col-md-3"></div>
            </div>

            <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
                <label class="col-md-1">Teamlogo:</label>
                <img   class="col-md-2"src="{{URL::asset('assets/img/teamlogos')}}/{{$teamdata->team_logo}}" style="width: auto;height:auto;">
                <div class="col-md-2"><button class="btn btn-danger">Remove Teamlogo</button></div>
                <div class="col-md-7"></div>
            </div>

            <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
                <div class="col-md-1"></div>
                <h4 class="text-center">Social Settings</h4>
                <div class="col-md-3"></div>
            </div>


            <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
                <label class="col-md-1">Twitter:</label>
                <input class="col form-control" type="text" name="twitter" value="{{$teamdata->twitter_url}}">
                <div class="col-md-3"></div>
            </div>

            <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
                <label class="col-md-1">Twitch:</label>
                <input class="col form-control" type="text" name="twitch" value="{{$teamdata->twitch_url}}">
                <div class="col-md-3"></div>
            </div>

            <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
                <label class="col-md-1">Instagram:</label>
                <input class="col form-control" type="text" name="instagram" value="{{$teamdata->instagram_url}}">
                <div class="col-md-3"></div>
            </div>

            <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
                <label class="col-md-1">Youtube:</label>
                <input class="col form-control" type="text" name="youtube" value="{{$teamdata->youtube_url}}">
                <div class="col-md-3"></div>
            </div>
            <hr>
            <div class="text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow" style="margin-top: 18px; margin-bottom: 18px">
                <div class="col-md-1"></div>
                <button type="submit" class="btn btn-success">Update Teamsettings</button>
                <div class="col-md-3"></div>
            </div>



        </form>
    </div>
    <div id="menu1" class="tab-pane fade">
        <hr>
        <h3>Teammember Management</h3>
        <hr>


        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2"><button  type="button"  data-toggle="modal" data-target="#addplayermodal"class="btn btn-light"><label><i class="fa fa-plus" aria-hidden="true"></i></label> Add Player</button></div>
        </div>
        <div class="table-responsive" style="padding-top: 10px;">
            <table class="table  text-center" id="player_table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Profilepicture</th>
                        <th>User-ID</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th></th>
                        <th></th>
                </thead>
                <tbody>


                    @foreach ($teammembers as $user)
                    <tr id='{{ $user->id}}'>
                <form action="{{route('adminpanel_updateteammember',$teamdata->team_id)}}" method="POST">
                    @csrf
                    <input hidden="" name="userid" value="{{$user->id}}">
                    <td><input type="checkbox"></td>
                    <td><img src="{{URL::asset('assets/img/profile_pictures/')}}/{{$user->avatar_url}}" width="50px" height="50px"></td>
                    <td> {{ $user->id }}</td>
                    <td> {{$user->username}}</td>
                    <td><input  name="teamrole" disabled=""type="number"min="1" max="5" value="{{$user->team_role}}"></td>
                    <td><button class="btn btn-success" disabled="" type="submit" name="update" value="update">Update Settings</button></td>
                    <td><button class="btn btn-danger" disabled="" type="submit" name="kick" value="kick" >Kick Teammember</button></td>
                </form>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>




    </div>
</div>

<! Add Player-->
<!-- Modal -->
<div class="modal fade" id="addplayermodal" tabindex="-1" role="dialog" aria-labelledby="addplayermodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Player to Team</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="msg"></div>
                <div class="input-group col-md-12">
                    <input class="form-control py-2" type="search" placeholder="Name or ID" id="playersearch">
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <div class="col-md-12">
                    <table class="table  text-center" id="addPlayerTbl">

                        <thead>
                        <th></th>
                        <th>User-ID</th>
                        <th>Username</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="addteambtn" disabled="">Add to Team</button>
            </div>
        </div>
    </div>
</div>




<script>$('document').ready(function (e) {


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });




        var hasNewTeamUserSelected = false;
        var newUserID = null;

        $('body').on('click', "#addPlayerTbl > tbody > tr > td > input", function (e) {




            if ($(this).prop("checked")) {

                $(this).parent().parent().addClass("news_select_highlightning");
                hasNewTeamUserSelected = true;
                $('#addteambtn').prop("disabled", false);

                newUserID = $(this).parent().parent().attr("id");
            } else {
                hasNewTeamUserSelected = false;
                $(this).parent().parent().removeClass("news_select_highlightning");
                $('#addteambtn').prop("disabled", true);
                newUserID = null;
            }


        });


        $('#addteambtn').on('click', function (e) {


            if (hasNewTeamUserSelected) {


                $.ajax({
                    url: "{{route('add_user_to_team',$teamdata->team_id)}}",
                    type: "POST",
                    data: {_token: "{{ csrf_token() }}", userid: newUserID},
                    dataType: 'json',
                    success: function (data) {


                        if (data) {

                            $('#msg').html(" User " + newUserID + " was succesfully added to the Team!").fadeIn('slow');
                            $('#msg').addClass("alert");
                            $('#msg').addClass("alert-success");
                            $('#msg').delay(2000).fadeOut('slow');
                            newUserID = false;
                            hasNewTeamUserSelected = false;
                            $('#addPlayerTbl').css("display", "none");
                            $('#playersearch').val("");
                        }


                    }});



            }

        });



        $('#playersearch').on('keyup', function (e) {



            if ($('#playersearch').val().length > 0) {


                $.ajax({
                    url: "{{route('search_users_for_team')}}",
                    type: "GET",
                    data: {searchtext: $('#playersearch').val()},
                    dataType: 'json',
                    success: function (data) {


                        $('#addPlayerTbl > tbody').html("");

                        if (data.length > 0) {

                            $('#msg').fadeOut('fast');
                            $('#addPlayerTbl').css("display", "block");


                            for (var i = 0; i < data.length; i++) {

                                $('#addPlayerTbl > tbody').append("<tr id='" + data[i]['id'] + "'><td><input type='checkbox'></td><td>" + data[i]['id'] + "</td><td>" + data[i]['username'] + "</td></tr>");

                            }
                            // $('#addPlayerTbl > tbody').html("");


                        } else {

                            $('#msg').html("No User could be found").fadeIn('slow');
                            $('#msg').addClass("alert");
                            $('#msg').addClass("alert-danger");
                            // $('#msg').delay(2000).fadeOut('slow');
                            $('#addPlayerTbl').css("display", "none");
                        }

                    }});


            } else {

                $('#addPlayerTbl').css("display", "none");
            }

        });

        var selected_row = null;

        $('#addPlayerTbl').css("display", "none");

        $('#player_table >tbody >tr').find("td:eq(0)").find("input").on('click', function (e) {

            if ($(this).prop('checked')) {


                //Getting Row ID
                selected_row = $(this).parent().parent().attr("id");
                //Enable Buttons
                //$(this).parent().parent().find("td:last").find("button").prop('disabled', false);
                $(this).parent().parent().addClass("news_select_highlightning");
                $(this).parent().parent().find("input").prop("disabled", false);
                $(this).parent().parent().find("button").prop("disabled", false);
            } else {
                //Disbale Buttons
                $(this).parent().parent().find("td:eq(5)").find("input").prop("disabled", true);
                $(this).parent().parent().find("td:eq(6)").find("input").prop("disabled", true);
                $(this).parent().parent().find("button").prop("disabled", true);
                $(this).parent().parent().removeClass("news_select_highlightning");
                //Reset selected row

                selected_row = null;
            }


        }
        );
    });

</script>



@endsection
