@extends('templates.default_template')
@section('content')



<script>

    $('document').ready(function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#upload_profile_picture_btn').on('click', function (e) {

            var fd = new FormData();
            var files = $('#new_profile_pic')[0].files[0];
            fd.append('file', files);


            $.ajax({
                url: '{{route("updateprofilepicture")}}',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function (response) {

                    alert("TODO Inform User that Profilepic has been uploaded");

                }, error: function (e) {


                    console.log(e);
                }
            });



            console.log(files);



        });







    });
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-1"></div>
        <div class="col">
            <div id="profile_settings_form_container" >
                <!-- Start: Pretty Registration Form -->
           
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                    @endforeach
                <div class="row text-white register-form" style="color: rgb(255,255,255);">
                    <div class="col-md-8 offset-md-2">
                        <form class="colum_content_big" method="POST" action="{{url('updateProfile')}}"  id="profile_settings_form" style="margin-top: 50px;margin-bottom: 50px;">
                        <!-- @foreach($userdata as $user) -->
                            <h1 class="nadestack_heading_one">Profile Settings</h1>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="general-information-tab" data-toggle="tab" href="#general-information" role="tab" aria-controls="home" aria-selected="true">General Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="social-media-tab" data-toggle="tab" href="#social-media" role="tab" aria-controls="profile" aria-selected="false">Social Media</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="notifications-tab" data-toggle="tab" href="#notifications" role="tab" aria-controls="notifications" aria-selected="false">Notifications</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!-- Beginn of the genaral information tab -->
                                <div class="tab-pane fade show active" id="general-information" role="tabpanel" aria-labelledby="general-information-tab" >
                                    <div class="nadestack-settings-div" style="margin-top: 20px;">
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">First Name:</label></div>
                                            <div class="col-sm-6 input-column"><input class="form-control" type="text" name="forname" value="{{$user->forname}}"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Last Name:</label></div>
                                            <div class="col-sm-6 input-column"><input class="form-control"  value="{{$user->lastname}}" type="text" name="surname"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Birthday:</label></div>
                                            <div class="col-sm-6 input-column"><input class="form-control" value="{{$user->birthday}}" name="birthday" type="date"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label d-xl-flex">Profile Description</label></div>
                                            <div class="col-sm-6 input-column"><textarea  style="height: 200px;" name="desc" class="form-control">{{$user->profiledescription}}</textarea></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center label-column"><i class="fa fa-steam"></i><span style="padding-left: 10px;">Steam-ID:</span></div>
                                            <div class="col-sm-6 col-xl-6 d-xl-flex justify-content-xl-center align-items-xl-center input-column"><input class="form-control" type="text"></div>
                                            <div class="col">
                                                @if(Auth::user()->steam_id == NULL)
                                                        <a class="btn text-white nadestack_btn" type="button" style="font-size: 16px;" href="{{route('setsteamid')}}">verify Steamaccount</a>
                                                @else
                                                       <button class="btn text-white nadestack_btn" type="button" style="font-size: 16px;">change Request</button>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center label-column"><span style="padding-left: 10px;">Verification-ID</span></div>
                                            <div class="col-sm-6 col-xl-6 d-xl-flex justify-content-xl-center align-items-xl-center input-column"><input class="form-control" type="text" placeholder="100231"></div>
                                            <div class="col">
                                                <button class="btn text-white nadestack_btn" type="button" style="font-size: 16px;">Delete my Data!</button>
                                            </div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 offset-xl-0 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label text-white" for="repeat-pawssword-input-field">Avatar:</label></div>
                                            <div class="col-sm-6 col-xl-9 offset-xl-0 text-justify input-column"><img src="{{URL::asset('assets/img/profile_pictures/')}}/{{$user->avatar_url}}" style="width: 100px;height: 100px;"></div>
                                            <div class="col-xl-4 offset-xl-3"><input type="file" id="new_profile_pic" style="padding: 0px;margin: 0px;margin-top: 10px;"></div>
                                            <div class="col offset-xl-2"><button class="btn text-light nadestack_btn" id="upload_profile_picture_btn" type="button">Upload</button></div>
                                        </div>
                                    </div>
                                    <hr class="bg-light">
                                    <div class="form-check text-center"><input class="form-check-input" type="checkbox" id="formCheck"><label class="form-check-label" for="formCheck">I've read and accept the <a style="color: red;" href="http://www.99damage.de">terms and conditions</a></label></div>
                                    <div class="form-row" style="padding-top: 10px">
                                        <div class="col text-center" style="padding-bottom: 15px;"><button class="btn nadestack_btn" type="submit">Save Settings</button></div>
                                    </div>
                                </div>
                                <!-- End of the genaral information tab -->
                                <!-- Beginn of the social media tab -->
                                <div class="tab-pane fade" id="social-media" role="tabpanel" aria-labelledby="social-media-tab">
                                    <div class="nadestack-settings-div" style="margin-top: 20px;">
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center label-column"><i class="fa fa-twitter"></i><span style="padding-left: 10px;">Twitter:</span></div>
                                            <div class="col-sm-6 col-xl-6 d-xl-flex justify-content-xl-center align-items-xl-center input-column"><input  value="{{$user->twitter_url}}" name="twitter" class="form-control" type="text"></div>
                                            <div class="col"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center label-column"><i class="fa fa-instagram"></i><span style="padding-left: 10px;">Instagram:</span></div>
                                            <div class="col-sm-6 col-xl-6 d-xl-flex justify-content-xl-center align-items-xl-center input-column"><input value="{{$user->instagram_url}}"name="instagram" class="form-control" type="text"></div>
                                            <div class="col"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center label-column"><i class="fa fa-twitch"></i><span style="padding-left: 10px;">Twitch:</span></div>
                                            <div class="col-sm-6 col-xl-6 d-xl-flex justify-content-xl-center align-items-xl-center input-column"><input   value="{{$user->twitch_url}}"name ="twitch" class="form-control" type="text"></div>
                                            <div class="col"></div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center label-column"><i class="fa fa-youtube"></i><span style="padding-left: 10px;">Youtube:</span></div>
                                            <div class="col-sm-6 col-xl-6 d-xl-flex justify-content-xl-center align-items-xl-center input-column"><input  value="{{$user->youtube_url}}" name="youtube" class="form-control" type="text"></div>
                                            <div class="col"></div>
                                        </div>
                                    </div>
                                    <hr class="bg-light">
                                    <div class="form-check text-center"><input class="form-check-input" type="checkbox" id="formCheck"><label class="form-check-label" for="formCheck">I've read and accept the <a style="color: red;" href="http://www.99damage.de">terms and conditions</a></label></div>
                                    <div class="form-row" style="padding-top: 10px">
                                        <div class="col text-center" style="padding-bottom: 15px;"><button class="btn nadestack_btn" type="submit">Save Settings</button></div>
                                    </div>
                                </div>
                                <!-- End of the social media tab -->
                                <!-- Begin of the notfication media tab -->
                                <div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                                    <div class="nadestack-settings-div" style="margin-top: 20px;">
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;">
                                                <label class="col-form-label">League notfications:</label>
                                            </div>
                                            <div class="col-sm-6 input-column">
                                                <select class="form-control">
                                                    <option>All</option>
                                                    <option>Push up</option>
                                                    <option>E-Mail</option>
                                                    <option>None</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-secondary nadestack-info-button" data-toggle="tooltip" data-placement="top" title="Tooltip on top">?</button>
                                            </div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">Match notfications:</label></div>
                                            <div class="col-sm-6 input-column">
                                                <select class="form-control">
                                                    <option>All</option>
                                                    <option>Push up</option>
                                                    <option>E-Mail</option>
                                                    <option>None</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-secondary nadestack-info-button" data-toggle="tooltip" data-placement="top" title="Tooltip on top">?</button>
                                            </div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">Thread/Comment notfications:</label></div>
                                            <div class="col-sm-6 input-column">
                                                <select class="form-control">
                                                    <option>All</option>
                                                    <option>Push up</option>
                                                    <option>E-Mail</option>
                                                    <option>None</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-secondary nadestack-info-button" data-toggle="tooltip" data-placement="top" title="Tooltip on top">?</button>
                                            </div>
                                        </div>
                                        <div class="form-row form-group">
                                            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">Nadestack News notfications:</label></div>
                                            <div class="col-sm-6 input-column">
                                                <select class="form-control">
                                                    <option>All</option>
                                                    <option>Push up</option>
                                                    <option>E-Mail</option>
                                                    <option>None</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-secondary nadestack-info-button" data-toggle="tooltip" data-placement="top" title="Tooltip on top">?</button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="bg-light">
                                    <div class="form-check text-center"><input class="form-check-input" type="checkbox" id="formCheck"><label class="form-check-label" for="formCheck">I've read and accept the <a style="color: red;" href="http://www.99damage.de">terms and conditions</a></label></div>
                                    <div class="form-row" style="padding-top: 10px">
                                        <div class="col text-center" style="padding-bottom: 15px;"><button class="btn nadestack_btn" type="submit">Save Settings</button></div>
                                    </div>
                                </div>
                                <!-- end of the notfication media tab -->
                            </div>
                            @csrf
                            @endforeach
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
