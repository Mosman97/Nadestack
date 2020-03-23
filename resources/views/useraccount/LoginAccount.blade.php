@extends('templates.verify_account_template')

@section('content')


<script src='{{URL::asset('assets/js/validate/registervalidate.js')}}'></script>
<div class="container-fluid" style="background-color: #0F0F0F;">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col">
            <div id="login_form_container" style="width:auto;height: auto;margin-left: auto;">
                <!-- Start: Pretty Registration Form -->
                <div class="row text-white register-form" style="color: rgb(255,255,255);">
                    <div class="col-md-8 offset-md-2">
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
                                <div class="col-sm-6 input-column"><input  id="password" class="form-control" type="password"name="password" placeholder="Enter Password"></div>
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
                            <div class="text-center">
                                <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLogin">Launch Modal Register Form</a>
                            </div>
                            <hr class="bg-light"/>
                            <div class="form-row" style="padding-bottom: 15px">
                                <div class="col-md-12 text-center"><a href="{{route('account.usernameforget')}}">Forgot Username?</a></div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 text-center nadestack-last-element"><a href="{{url('/password/reset')}}">Forgot Password?</a></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2"></div>
    </div>
</div>

<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true" style="color: white">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #333138; font-family: 'Roboto';">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5 text-center">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Username</label>
                    <input type="email" id="defaultForm-email" class="form-control validate">
                    <a class="float-right" style="color: grey" href="{{route('account.usernameforget')}}">Forgot Username?</a>
                </div>

                <div class="md-form mb-4 text-center">
                    <label  data-error="wrong" data-success="right" for="defaultForm-pass">Password</label>
                    <input type="password" id="defaultForm-pass" class="form-control validate">
                    <a class="float-right" style="color: grey" href="{{url('/password/reset')}}">Forgot Password?</a>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn nadestack_btn">Login</button>
            </div>
        </div>
    </div>
</div>
@endsection

