@extends('templates.default_template')

@section('content')

@if ($errors->any())

{{var_dump($errors->all())}}
@foreach($errors->getMessages() as $key => $error )
Key: {{ $key }}
Value: {{ $error[0] }}
@endforeach


@endif


{{ var_dump( Session::all())}}
<script src='{{URL::asset('assets/js/validate/teamregvalidate.js')}}'></script>
<div class="container-fluid" style="background-color: #0F0F0F;">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col">
            <div id="profile_settings_form_container" style="width: auto;height: auto;">
                <!-- Start: Pretty Registration Form -->
                <div class="row text-white register-form" style="color: rgb(255,255,255);">
                    <div class="col-md-8 offset-md-2">
                        <form method="POST"  action="{{route('createnewteam')}}"class="text-white" id="profile_settings_form" style="color: rgb(255,255,255);background-color: #333138;font-family: 'Roboto';padding: 0px;margin-top: 50px;margin-bottom: 50px;">
                            @csrf
                            <h1 class="text-center nadestack_heading_one" >Create Team</h1>
                            <div class="form-row form-group">
                                <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">Teamname* :</label></div>
                                <div class="col-sm-6 input-column"><input class="form-control " type="text" id="teamname" name="teamname">

                                    @if($errors->first('teamname') != NULL)

                                    <script>$('#teamname').addClass("is-invalid")</script>
                                    <label id="teamname-error" class="error" for="teamname">{{$errors->first('teamname')}}</label>
                                    @endif

                                </div>
                            </div>

                            <div class="form-row form-group">
                                <div class="col-sm-4 col-xl-3 d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Team-Tag* :</label></div>
                                <div class="col-sm-6 input-column"><input class="form-control" type="text" id="teamtag" name="teamtag">

                                    @if($errors->first('teamname') != NULL)

                                    <script>$('#teamtag').addClass("is-invalid")</script>
                                    <label id="teamtag-error" class="error" for="teamtag">{{$errors->first('teamtag')}}</label>
                                    @endif
                                </div>

                            </div>
                            <div class="form-row form-group">
                                <div class="col-sm-4 col-xl-3 d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Organization:</label></div>
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
                                <div class="col-sm-6 input-column"><textarea class="form-control" id="description" name="description"></textarea></div>
                            </div>
                 
                            <h2 class="text-center" style="padding-top: 12px;">Social Media</h2>
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
                            <div class="form-check text-center"><input class="form-check-input" type="checkbox" id="formCheck" name="formCheck"><label class="form-check-label" for="formCheck">I've read and accept the <a style="color: red;" href="http://www.99damage.de">terms and conditions</a></label></div>
                            <div class="form-row">
                                <div class="col text-center" style="padding-bottom: 15px; padding-top: 12px;"><button class="btn nadestack_btn" type="submit">Register Team</button></div>
                            </div>
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
