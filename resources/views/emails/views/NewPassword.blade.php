@extends('verify_account_template')
@section('content')

<div class="container-fluid" style="background-color: #0F0F0F;">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col">
            {{-- If the Email has been send successfully we will inform the User--}}
            @if (session()->has('status'))
            <h1>An Email has been send to your adress</h1>
            @endif
            <div id="profile_settings_form_container" style="padding-bottom: 0px;width: auto;height: auto;padding-top: 0px;padding-left: 0px;">
                <!-- Start: Pretty Registration Form -->
                <div class="row text-white register-form" style="color: rgb(255,255,255);">
                    <div class="col-md-8 offset-md-2">
                        @if($errors->any())
                        <div class="row alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form class="text-white" id="forgot_password_container" style="color: rgb(255,255,255);background-color: #333138;font-family: 'Roboto';padding: 0px;margin-top: 180px;margin-bottom: 250px;" method="POST" action="{{ route('password.update') }}">
                            @csrf
                            {{ __('Token from the Reset-URL')}}
                            <input type="hidden" name="token" value="{{ $token }}">
                            <h1 class="text-center text-light" style="padding-top: 15px;">Reset Password</h1>
                            <div class="form-row form-group">
                                <div class="col-sm-4 col-xl-3 d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Email:</label></div>
                                <div class="col-sm-6 input-column"><input class="form-control" type="email" name="email" value="{{ $email ?? old('email') }}"></div>
                            </div>
                            <div class="form-row form-group">

                                <div class="col-sm-4 col-xl-3 d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">New Password:</label></div>
                                <div class="col-sm-6 input-column"><input  id="password" class="form-control" type="password"name="password"></div>
                            </div>
                            <div class="form-row form-group">

                                <div class="col-sm-4 col-xl-3 d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Confirm Password:</label></div>
                                <div class="col-sm-6 input-column"><input  id="password" class="form-control" type="password"name="password_confirmation"></div>
                            </div>
                            <div class="form-row">
                                <div class="col text-center" style="padding-bottom: 15px;"><button id="submit_btn" class="btn nadestack_btn" type="submit" style="margin-top: 10px;">Reset Password</button></div>
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