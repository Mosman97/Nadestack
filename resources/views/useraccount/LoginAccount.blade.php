@extends('templates.verify_account_template')

@section('content')


<script src='{{URL::asset('assets/js/validate/registervalidate.js')}}'></script>
<div class="container-fluid" style="background-color: #0F0F0F;">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col">
            <div id="login_form_container" style="padding-bottom: 0px;width:auto;height: auto;padding-top: 0px;padding-left: 00px; margin-left: auto;">
                <!-- Start: Pretty Registration Form -->
                <div class="row text-white register-form" style="color: rgb(255,255,255);">
                    <div class="col-md-8 col-md-offset-4">
                        <form class="text-white nadestack_form" id="registration_form" style="color: rgb(255,255,255);"action="{{ route('login')}}"  method="POST">
                            @csrf
                            <h1 class="text-center text-light nadestack_heading_one">Login</h1>
                            <div class="form-row form-group">
                                <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"  onsubmit="try {return window.confirm( & quot; Dieses Formular wird aufgrund bestimmter Sicherheitseinschränkungen möglicherweise nicht ordnungsgemäß angezeigt.\nWeiter? & quot; ); } catch (e) {return false; }">
                                    <label class="col-form-label">Username:</label>
                                </div>
                                <div class="col-sm-6 input-column"><input id="username"name="username"class="form-control" type="text" placeholder="Enter Username"></div>
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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
                            <div class="form-check text-center"><input class="form-check-input" type="checkbox" name="remember"><label class="form-check-label" for="formCheck-2">Remember me</label></div>
                            <div class="form-row">
                                <div class="col-md-12 text-center" style="padding-bottom: 15px; padding-top: 15px;"><button class="btn nadestack_btn" type="submit">Login</button></div>
                            </div>
                            <hr class="bg-light"/>
                            <div class="form-row form-group text-center">
                                <div class="col-md-6"><a href="{{route('account.usernameforget')}}">Forgot Username?</a></div>
                            </div>
                            <div class="form-row form-group text-center">
                                <div class="col-md-6"><a href="{{url('/password/reset')}}">Forgot Password?</a></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                             <div class="form-row">
                                <div class="col"></div>
                            </div>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- End: Pretty Registration Form -->
            </div>

        </div>
        <div class="col-xl-2"></div>
    </div>
</div>
@endsection

