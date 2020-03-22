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
<div class="container-fluid" style="background-color: #0F0F0F;">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col">
            <div id="profile_settings_form_container" style="width: auto;height: auto;">
                <!-- Start: Pretty Registration Form -->
                {{var_dump($errors)}}

                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach





                <div class="row text-white register-form" style="color: rgb(255,255,255);">
                    <div class="col-md-8 offset-md-2">
                        <form  method="POST" action="{{url('updateProfile')}}" class="text-white" id="profile_settings_form" style="color: rgb(255,255,255);background-color: #333138;font-family: 'Roboto';margin-top: 50px;margin-bottom: 50px;">
                            @foreach($userdata as $user)
                            <h1 class="nadestack_heading_one">Profile Settings</h1>
                            <hr class="bg-light"/>
                            <h2 class="nadestack_heading_two">General Informations</h2>
                            <hr class="bg-light"/>
                            <div class="nadestack-settings-div">
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
                                    <div class="col"><button class="btn text-white nadestack_btn" type="button" style="font-size: 16px;">change Request</button></div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col-sm-4 col-xl-3 offset-xl-0 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label text-white" for="repeat-pawssword-input-field">Avatar:</label></div>
                                    <div class="col-sm-6 col-xl-9 offset-xl-0 text-justify input-column"><img src="{{URL::asset('assets/img/profile_pictures/')}}/{{$user->avatar_url}}" style="width: 100px;height: 100px;"></div>
                                    <div class="col-xl-4 offset-xl-3"><input type="file" id="new_profile_pic" style="padding: 0px;margin: 0px;margin-top: 10px;"></div>
                                    <div class="col offset-xl-2"><button class="btn text-light nadestack_btn" id="upload_profile_picture_btn" type="button">Upload</button></div>
                                </div>
                            </div>
                            <hr class="bg-light"/>
                            <h2 class="nadestack_heading_two">Social Media</h2>
                            <hr class="bg-light"/>
                            <div class="nadestack-settings-div">
                                <div class="form-row form-group" style="padding-top: 10px">
                                    <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center label-column"><i class="fa fa-twitter"></i><span style="padding-left: 10px;">Twitter:</span></div>
                                    <div class="col-sm-6 col-xl-6 d-xl-flex justify-content-xl-center align-items-xl-center input-column"><input  value="{{$user->twitter_url}}" name="twitter" class="form-control" type="text"></div>
                                    <div class="col"></div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center label-column"><i class="fa fa-instagram"></i><span style="padding-left: 10px;">Instagram:</span></div>
                                    <div class="col-sm-6 col-xl-6 d-xl-flex justify-content-xl-center align-items-xl-center input-column"><input  value="{{$user->instagram_url}}"name="instagram" class="form-control" type="text"></div>
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
                            <hr class="bg-light"/>
                            <div class="form-check text-center"><input class="form-check-input" type="checkbox" id="formCheck"><label class="form-check-label" for="formCheck">I've read and accept the <a style="color: red;" href="http://www.99damage.de">terms and conditions</a></label></div>
                            @csrf
                            <div class="form-row" style="padding-top: 10px">
                                <div class="col text-center" style="padding-bottom: 15px;"><button class="btn nadestack_btn" type="submit">Save Settings</button></div>
                            </div>
                            @endforeach
                        </form>
                    </div>
                </div>
                <!-- End: Pretty Registration Form -->
            </div>
        </div>
        <div class="col-xl-2"></div>
    </div>
</div>
@endsection
-
