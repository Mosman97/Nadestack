@extends('templates.default_template')

@section('content')



<script src='{{URL::asset('assets/js/validate/teamregvalidate.js')}}'></script>
<div class="container-fluid">


    <div class="row">
        <div class="col-xl-1"></div>
        <div class="col">
            <div id="profile_settings_form_container" style="width: auto;height: auto;">
                <!-- Start: Pretty Registration Form -->
                <div class="row text-white register-form" style="color: rgb(255,255,255);">
                    <div class="col-md-8 offset-md-2">
                        <form class="text-white nadestack_form" id="profile_settings_form" style="color: rgb(255,255,255);">
                            <div class="row">
                                <div class="col-sm-3 col-12 text-center">
                                    <a class="btn nadestack_btn" style="margin: 10px 0 10px 10px" href="{{route('teampage',Auth::user()->team_id)}}"><i class="fas fa-arrow-circle-left"></i> Profile</a>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <h1 class="nadestack_heading_one" >Team-Settings</h1>
                                </div>
                            </div>
                            @if (session('kick_message'))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('kick_message') }}
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
                                            <div class="col-sm-6 input-column"><input class="form-control" style="color:black;" type="text" id="teamname" value="{{$team_data[0]['team_name']}}" name="teamname"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Team-Tag :</label></div>
                                            <div class="col-sm-6 input-column"><input style="color:black;"class="form-control" type="text" id="teamtag"value="{{$team_data[0]['team_tag']}}" name="teamtag" ></div>
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
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">Password* :</label></div>
                                            <div class="col-sm-6 input-column"><input class="form-control" type="password" id="password" name="password"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">Confirm Password* :</label></div>
                                            <div class="col-sm-6 input-column"><input class="form-control" type="password" id="password_con" name="password_con"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">Website:</label></div>
                                            <div class="col-sm-6 input-column"><input class="form-control" type="url" id="website" name="website"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">Team Description:</label></div>
                                            <div class="col-sm-6 input-column"><textarea class="form-control" style="height: 200px;" id="description" name="description"></textarea></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 offset-xl-0 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label text-white" for="repeat-pawssword-input-field">Teamlogo:</label></div>
                                            <div class="col-sm-6 col-xl-9 offset-xl-0 text-justify input-column"><img src="assets/img/4c72a61f-c099-45b1-a3ac-b48669735afb.png" style="width: 100px;height: 100px;"></div>
                                            <div class="col-xl-4 offset-xl-3"><input type="file" style="margin-top: 10px;"></div>
                                            <div class="col offset-xl-2"><button class="btn text-light nadestack_btn" type="button">Upload</button></div>
                                        </div>
                                        <hr class="bg-light"/>
                                        <div class="form-check text-center"><input class="form-check-input" type="checkbox" id="formCheck" name="formCheck"><label class="form-check-label" for="formCheck">I've read and accept the <a style="color: red;" href="http://www.99damage.de">terms and conditions</a></label></div>
                                        <div class="form-row">
                                            <div class="col text-center" style="padding-bottom: 15px; padding-top: 12px;"><button class="btn nadestack_btn" type="submit">Save Settings</button></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of the genaral information tab -->


                                <!-- Beginn of the social media tab -->
                                <div class="tab-pane fade" id="team-social" role="tabpanel" aria-labelledby="team-social" >
                                    <div class="nadestack-settings-div" style="margin-top: 20px">
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center label-column"><i class="fa fa-twitter"></i><span style="padding-left: 10px;">Twitter:</span></div>
                                            <div class="col-sm-6 col-xl-6 d-xl-flex justify-content-xl-center align-items-xl-center input-column"><input class="form-control" type="url" id="twitter" name="twitter"></div>
                                            <div class="col"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center label-column"><i class="fa fa-instagram"></i><span style="padding-left: 10px;">Instagram:</span></div>
                                            <div class="col-sm-6 col-xl-6 d-xl-flex justify-content-xl-center align-items-xl-center input-column"><input class="form-control" type="url" id="instagram" name="instagram"></div>
                                            <div class="col"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center label-column"><i class="fa fa-twitch"></i><span style="padding-left: 10px;">Twitch:</span></div>
                                            <div class="col-sm-6 col-xl-6 d-xl-flex justify-content-xl-center align-items-xl-center input-column"><input class="form-control" type="url" id="twitch" name="twitch"></div>
                                            <div class="col"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center label-column"><i class="fa fa-youtube"></i><span style="padding-left: 10px;">Youtube:</span></div>
                                            <div class="col-sm-6 col-xl-6 d-xl-flex justify-content-xl-center align-items-xl-center input-column"><input class="form-control" type="url" id="youtube" name="youtube"></div>
                                            <div class="col"></div>
                                        </div>
                                        <hr class="bg-light"/>
                                        <div class="form-check text-center"><input class="form-check-input" type="checkbox" id="formCheck" name="formCheck"><label class="form-check-label" for="formCheck">I've read and accept the <a style="color: red;" href="http://www.99damage.de">terms and conditions</a></label></div>
                                        <div class="form-row">
                                            <div class="col text-center" style="padding-bottom: 15px; padding-top: 12px;"><button class="btn nadestack_btn" type="submit">Save Settings</button></div>
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
                                                    <table class="table nadestack-tbl text-center">
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


                                                                    <select @if(Auth::user()->id !=$team_data[0]['team_admin_id'] ) disabled="" @endif >
                                                                             <optgroup>
                                                                            @if($user->id == $team_data[0]['team_admin_id'])
                                                                            <option selected=""value="1">Admin</option>
                                                                            <option value="2">Captain</option>
                                                                            <option value="3">Manager</option>
                                                                            <option value="4">Player</option>
                                                                            @elseif ($user->id == $team_data[0]['team_captain_1_id'] || $user->id == $team_data[0]['team_captain_2_id'] )
                                                                            <option value="1">Admin</option>
                                                                            <option selected=""value="2">Captain</option>
                                                                            <option value="3">Manager</option>
                                                                            <option value="4">Player</option>
                                                                            @elseif($user->id == $team_data[0]['team_manager_id'])
                                                                            <option value="1">Admin</option>
                                                                            <option value="2">Captain</option>
                                                                            <option selected=""value="3">Manager</option>
                                                                            <option value="4">Player</option>

                                                                            @elseif($user->id == $team_data[0]['team_coach'])

                                                                            @else
                                                                            <option value="1">Admin</option>
                                                                            <option value="2">Captain</option>
                                                                            <option value="3">Manager</option>
                                                                            <option selected=""value="4">Player</option>
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
                                            <div class="col text-center" style="padding-bottom: 15px; padding-top: 12px;"><button class="btn nadestack_btn" type="submit">Save Settings</button></div>
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
