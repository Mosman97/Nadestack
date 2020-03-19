@extends('verify_account_template')
@section('content')
<div class="container-fluid" style="background-color: #0F0F0F;">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col">
            <div id="profile_settings_form_container" style="padding-bottom: 0px;width: auto;height: auto;padding-top: 0px;padding-left: 0px;">
                <!-- Start: Pretty Registration Form -->
                <div class="row text-white register-form" style="color: rgb(255,255,255);">
                    <div class="col-md-8 offset-md-2">

                        <form class="text-white" id="forgot_password_container" style="color: rgb(255,255,255);background-color: #333138;font-family: 'Roboto';padding: 0px;margin-top: 180px;margin-bottom: 250px;" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <h1 class="text-center text-light" style="padding-top: 15px;">Forgot Username</h1>
                            <div class="form-row form-group">
                                <div class="col-sm-4 col-xl-3 d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Email:</label></div>
                                <div class="col-sm-6 input-column"><input class="form-control" type="email" name="email" minlength="2"></div>
                            </div>
                            @if($errors->any())
                            <div class="form-row alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            {{-- If the Email has been send successfully we will inform the User--}}
                            @if (session()->has('status'))
                            <div class="form-row alert alert-danger">An Email has been send to your adress</h1></div>
                            @endif
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