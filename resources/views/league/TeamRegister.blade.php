@extends('templates.default_template')

@section('content')

@if ($errors->any())

{{var_dump($errors->all())}}
@foreach($errors->getMessages() as $key => $error )
Key: {{ $key }}
Value: {{ $error[0] }}
@endforeach


@endif
<script src='{{URL::asset('assets/js/validate/teamregvalidate.js')}}'></script>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col">
            <div id="profile_settings_form_container" style="width: auto;height: auto;">
                <!-- Start: Pretty Registration Form -->
                <div class="row text-white register-form" style="color: rgb(255,255,255);">
                    <div class="col-md-8 offset-md-2">
                        <form class="colum_content_big" method="POST"  action="{{route('createnewteam')}}" id="profile_settings_form" style="padding: 0px;margin-top: 50px;margin-bottom: 50px;">
                            @csrf
                            <h1 class="text-center nadestack_heading_one" >Create Team</h1>
                            <div class="form-row form-group">
                                <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">Teamname* :</label></div>
                                <div class="col-sm-6 input-column"><input class="form-control " type="text" id="teamname" name="teamname" value="{{ old('teamname')}}">

                                    @if($errors->first('teamname') != NULL)

                                    <script>$('#teamname').addClass("is-invalid")</script>
                                    <label id="teamname-error" class="error" for="teamname">{{$errors->first('teamname')}}</label>
                                    @endif

                                </div>
                            </div>

                            <div class="form-row form-group">
                                <div class="col-sm-4 col-xl-3 d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Team-Tag* :</label></div>
                                <div class="col-sm-6 input-column"><input class="form-control" type="text" id="teamtag" name="teamtag" value="{{ old('teamtag')}}">

                                    @if($errors->first('teamname') != NULL)

                                    <script>$('#teamtag').addClass("is-invalid")</script>
                                    <label id="teamtag-error" class="error" for="teamtag">{{$errors->first('teamtag')}}</label>
                                    @endif
                                </div>

                            </div>
                            <div class="form-row form-group">
                                <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">Password* :</label></div>
                                <div class="col-sm-6 input-column"><input class="form-control" type="password" id="password" name="password" value="{{ old('password')}}"></div>
                            </div>
                            <div class="form-row form-group">
                                <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">Confirm Password* :</label></div>
                                <div class="col-sm-6 input-column"><input class="form-control" type="password" id="password_con" name="password_con" value="{{ old('password_con')}}"></div>
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
