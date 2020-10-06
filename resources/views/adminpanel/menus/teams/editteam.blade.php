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
        <h3>Teammember Management</h3>
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
                        <td><input type="checkbox"></td>
                <td><img src="{{URL::asset('assets/img/profile_pictures/')}}/{{$user->avatar_url}}" width="50px" height="50px"></td>
                        <td> {{ $user->id }}</td>
                        <td> {{$user->username}}</td>
                        <td><input  type="number"min="1" max="5" value="{{$user->team_role}}"></td>
                            <td><button class="btn btn-success" disabled="">Update Settings</button></td>
                        <td><button class="btn btn-danger" disabled="">Kick Teammember</button></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>




    </div>
</div>





   <script>$('document').ready(function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var selected_row = null;
        
        
        
   

        $('#player_table >tbody >tr > td > input').on('click', function (e) {
            
                 console.log(selected_row);

            if ($(this).prop('checked')) {


                //Getting Row ID
                selected_row = $(this).parent().parent().attr("id");

                //Enable Buttons
                $(this).parent().parent().find("td:last").find("button").prop('disabled', false);
                $(this).parent().parent().addClass("news_select_highlightning");

            } else {

                //Disbale Buttons
                $(this).parent().parent().find("td:last").find("button").prop('disabled', true);

                $(this).parent().parent().removeClass("news_select_highlightning");

                //Reset selected row

                selected_row = null;
            }


        }); });

</script>



@endsection
