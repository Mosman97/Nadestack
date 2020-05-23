@extends('templates.default_template')

@section('content')


<script>


    $('document').ready(function (e) {



    $('#role_table > tbody >tr > td > select').on('change', function (e) {


    getAllowedRoleAmount();
    });
    function getAllowedRoleAmount() {

    var captain_counter = 0;
    var manager_counter = 0;
    var coach_counter = 0;
    $('#role_table > tbody >tr > td > select').each(function (e) {



    var selected_role_val = $(this).children().children('option:selected').val();
    if (selected_role_val == 2) {


    captain_counter++;
    if (captain_counter > 2) {

    $(this).children().children('option[value=5]').attr("selected", "selected");
    }
    } else if (selected_role_val == 3) {

    manager_counter++;
    if (manager_counter > 1) {


    $(this).children().children('option[value=5]').attr("selected", "selected");
    }
    } else if (selected_role_val == 4) {

    coach_counter++;
    if (coach_counter > 1) {


    $(this).children().children('option[value=5]').attr("selected", "selected");
    }
    }





    });
    if (captain_counter > 2) {


    alert("Captaincount can only be 2");
    } else if (manager_counter > 1) {


    alert("Managercount can only be 1");
    } else if (coach_counter > 1) {


    alert("Coachcount can only be 1");
    }



    }


    });</script>


<script src='{{URL::asset('assets/js/validate/teamregvalidate.js')}}'></script>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-1"></div>
        <div class="col">
            <div id="profile_settings_form_container" style="width: auto;height: auto;">
                <!-- Start: Pretty Registration Form -->
                <div class="row text-white register-form" style="color: rgb(255,255,255);">
                    <div class="col-md-8 offset-md-2">
                        <form  action="{{route('save_team')}}" method="POST" enctype="multipart/form-data"class="text-white nadestack_form" id="profile_settings_form" style="color: rgb(255,255,255);">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3 col-12 text-center">
                                    <a class="btn nadestack_btn" style="margin: 10px 0 10px 10px" href="{{route('teampage',Auth::user()->team_id)}}"><i class="fas fa-arrow-circle-left"></i> Profile</a>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <h1 class="nadestack_heading_one" >Team-Settings</h1>
                                </div>
                            </div>
                            @if (session('message'))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('message') }}
                            </div>
                            @endif
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="team-general-tab" data-toggle="tab" href="#team-general" role="tab" aria-controls="home" aria-selected="true">General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="team-social-tab" data-toggle="tab" href="#team-social" role="tab" aria-controls="contact" aria-selected="false">Social Media</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="team-members-tab" data-toggle="tab" href="#team-members" role="tab" aria-controls="contact" aria-selected="false">Team Member</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!-- Beginn of the genaral information tab -->
                                <div class="tab-pane fade show active" id="team-general" role="tabpanel" aria-labelledby="team-general" >
                                    <div class="nadestack-settings-div" style="margin-top: 20px; ">
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">Teamname:</label></div>
                                            <div class="col-sm-6 input-column"><input class="form-control" type="text" id="teamname" value="{{$team_data[0]['team_name']}}" name="teamname"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Team-Tag :</label></div>
                                            <div class="col-sm-6 input-column"><input class="form-control" type="text" id="teamtag"value="{{$team_data[0]['team_tag']}}" name="teamtag" ></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">Country:</label></div>
                                            <div class="col-sm-6 input-column">
                                                <select class="form-control" required="">
                                                    <optgroup label="Country">
                                                        <option value="12">Deutschland</option>
                                                        <option value="13">Ostdeutschland</option>
                                                        <option value="14">Bayern</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Organization:</label></div>
                                            <div class="col-sm-6 input-column"><input class="form-control" type="text" id="orga" name="orga"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">New Password* :</label></div>
                                            <div class="col-sm-6 input-column"><input class="form-control" type="password" id="password" name="password"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">Confirm New Password* :</label></div>
                                            <div class="col-sm-6 input-column"><input class="form-control" type="password" id="password_con" name="password_con"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">Website:</label></div>
                                            <div class="col-sm-6 input-column"><input class="form-control" value="{{$team_data[0]['team_website']}}"type="url" id="website" name="website"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">Team Description:</label></div>
                                            <div class="col-sm-6 input-column"><textarea class="form-control" style="height: 200px;" id="description" name="description">{{$team_data[0]['team_desc']}}</textarea></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 offset-xl-0 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label text-white" for="repeat-pawssword-input-field">Teamlogo:</label></div>
                                            <div class="col-sm-6 col-xl-9 offset-xl-0 text-justify input-column"><img src="{{ URL::asset('assets/img/teamlogos')}}/{{$team_data[0]['team_logo']}}" style="width: 100px;height: 100px;"></div>
                                            <div class="col-xl-4 offset-xl-3"><input  name="team_logo" type="file" style="margin-top: 10px;"></div>
                                            <div class="col offset-xl-2"></div>
                                        </div>
                                        <hr class="bg-light"/>
                                        <div class="form-check text-center"><input class="form-check-input" type="checkbox" id="formCheck" name="formCheck"><label class="form-check-label" for="formCheck">I've read and accept the <a style="color: red;" href="http://www.99damage.de">terms and conditions</a></label></div>
                                        <div class="form-row">
                                            <div class="col text-center" style="padding-bottom: 15px; padding-top: 12px;"><button name = "action" value="settings"class="btn nadestack_btn" type="submit">Save Settings</button></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of the genaral information tab -->


                                <!-- Beginn of the social media tab -->
                                <div class="tab-pane fade" id="team-social" role="tabpanel" aria-labelledby="team-social" >
                                    <div class="nadestack-settings-div" style="margin-top: 20px">
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center label-column"><i class="fa fa-twitter"></i><span style="padding-left: 10px;">Twitter:</span></div>
                                            <div class="col-sm-6 col-xl-6 d-xl-flex justify-content-xl-center align-items-xl-center input-column"><input class="form-control" type="url" value ="{{$team_data[0]['twitter_url']}}" id="twitter" name="twitter"></div>
                                            <div class="col"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center label-column"><i class="fa fa-instagram"></i><span style="padding-left: 10px;">Instagram:</span></div>
                                            <div class="col-sm-6 col-xl-6 d-xl-flex justify-content-xl-center align-items-xl-center input-column"><input class="form-control" value ="{{$team_data[0]['instagram_url']}}"type="url" id="instagram" name="instagram"></div>
                                            <div class="col"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center label-column"><i class="fa fa-twitch"></i><span style="padding-left: 10px;">Twitch:</span></div>
                                            <div class="col-sm-6 col-xl-6 d-xl-flex justify-content-xl-center align-items-xl-center input-column"><input class="form-control"  value ="{{$team_data[0]['twitch_url']}}"type="url" id="twitch" name="twitch"></div>
                                            <div class="col"></div>
                                        </div>

                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center label-column"><i class="fa fa-youtube"></i><span style="padding-left: 10px;">Youtube:</span></div>
                                            <div class="col-sm-6 col-xl-6 d-xl-flex justify-content-xl-center align-items-xl-center input-column"><input class="form-control"value ="{{$team_data[0]['youtube_url']}}" type="url" id="youtube" name="youtube"></div>
                                            <div class="col"></div>
                                        </div>
                                        <hr class="bg-light"/>
                                        <div class="form-check text-center"><input class="form-check-input" type="checkbox" id="formCheck" name="formCheck"><label class="form-check-label" for="formCheck">I've read and accept the <a style="color: red;" href="http://www.99damage.de">terms and conditions</a></label></div>
                                        <div class="form-row">
                                            <div class="col text-center" style="padding-bottom: 15px; padding-top: 12px;"><button name = "action" value="socials" class="btn nadestack_btn" type="submit">Save Settings</button></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of the social media tab -->

                                <!-- Beginn of the members tab -->
                                <div class="tab-pane fade" id="team-members" role="tabpanel" aria-labelledby="team-members" >
                                    <div class="nadestack-settings-div" style="margin-top: 20px">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col">

                                                <h3 class="nadestack_heading_three text-left">Verbleibende Wechselslots: 3</h3>
                                                <div class="table-responive">
                                                    <table class="table nadestack-tbl text-center" id="role_table">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Joined in</th>
                                                                <th>Role</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach($user_data as $user)
                                                            <tr>
                                                                <td><a href="{{route('profilepage',$user->username)}}">{{$user->username}}</a></td>
                                                                <td>/</td>
                                                                <td>
                                                                    <select @if(Auth::user()->id !=$team_data[0]['team_admin_id'] ) disabled="" @endif  name="{{$user->id}}">
                                                                             <optgroup>
                                                                            @if($user->id == $team_data[0]['team_admin_id'])
                                                                            <option selected="" disabled="">Admin</option>

                                                                            @elseif ($user->id == $team_data[0]['team_captain_1_id'] || $user->id == $team_data[0]['team_captain_2_id'] )

                                                                            <option selected=""value="2">Captain</option>
                                                                            <option value="3">Manager</option>
                                                                            <option value="4">Coach</option>
                                                                            <option value="5">Player</option>
                                                                            @elseif($user->id == $team_data[0]['team_manager_id'])

                                                                            <option value="2">Captain</option>
                                                                            <option selected=""value="3">Manager</option>
                                                                            <option value="4">Coach</option>
                                                                            <option value="5">Player</option>
                                                                            @elseif($user->id == $team_data[0]['team_coach_id'])

                                                                            <option value="2">Captain</option>
                                                                            <option value="3">Manager</option>
                                                                            <option selected="" value="4">Coach</option>
                                                                            <option value="5">Player</option>
                                                                            @else

                                                                            <option value="2">Captain</option>
                                                                            <option value="3">Manager</option>
                                                                            <option value="4">Coach</option>
                                                                            <option selected=""value="5">Player</option>
                                                                            @endif
                                                                        </optgroup>
                                                                    </select>
                                                                </td>
                                                                @if(Auth::user()->id == $team_data[0]['team_admin_id'])
                                                                <td> <a href="{{route('kick_player_from_team',['teamid'=>$team_data[0]['team_id'],'userid'=>$user->id])}}" type="button" class="btn nadestack_btn">Kick Player</a>
                                                                </td>
                                                                @endif
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                        <hr class="bg-light"/>
                                        <div class="form-check text-center"><input class="form-check-input" type="checkbox" id="formCheck" name="formCheck"><label class="form-check-label" for="formCheck">I've read and accept the <a style="color: red;" href="http://www.99damage.de">terms and conditions</a></label></div>
                                        <div class="form-row">
                                            <div class="col text-center" style="padding-bottom: 15px; padding-top: 12px;"><button class="btn nadestack_btn" name = "action" value="roles"type="submit">Save Settings</button></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of the members tab -->
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End: Pretty Registration Form -->
            </div>
        </div>
        <div class="col-xl-1"></div>
    </div>
</div>
@endsection
