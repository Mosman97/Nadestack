@extends('templates.default_template')

@section('content')
<!-- Google Captcha script -->
    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-2"></div>
            <div class="col">
                <div id="profile_settings_form_container" style="width: auto;height: auto;">
                    <!-- Start: Pretty Registration Form -->
                      <div class="row text-white register-form" style="color: rgb(255,255,255);">
                        <div class="col-md-8 offset-md-2">
                            <form class="nadestack_form" id="registration_form" style="color: rgb(255,255,255);margin-top: 50px;margin-bottom: 50px;"action="{{ route('register')}}"  method="POST" novalidate="">
                             @csrf
                                <h1 class="text-center text-light nadestack_heading_one">Create Account</h1>
                                <div class="form-row form-group">
                                    <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;">
                                        <label class="col-form-label">Username:</label>
                                    </div>
                                    <div class="col-sm-6 input-column"><input id="username"name="username"class="form-control" type="text"></div>
                                          @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-row form-group">
                                    <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Email:</label></div>
                                    <div class="col-sm-6 input-column"><input id="email" class="form-control" name="email" type="email"></div>
                                          @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-row form-group">
                                    <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Confirm Email:</label></div>
                                    <div class="col-sm-6 input-column"><input id="email_con" class="form-control" name="email_con"type="email"></div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Password:</label></div>
                                    <div class="col-sm-6 input-column"><input  id="password" class="form-control" type="password"name="password"></div>
                                           @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-row form-group">
                                    <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Confirm Password:</label></div>
                                    <div class="col-sm-6 input-column"><input class="form-control" id="password_con" name="password_con" type="password"></div>
                                </div>
                                <hr class="bg-light"/>
                                <div class="form-check text-center"><input class="form-check-input" type="checkbox" name="formCheck"><label class="form-check-label" for="formCheck">I've read and accept the <a style="color: red;" href="http://www.99damage.de">terms and conditions</a></label></div>
                                <div class="form-row">
                                    <div class="col text-center" style="padding-bottom: 15px; padding-top: 10px"><button class="btn nadestack_btn" type="submit">Register</button></div>
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
