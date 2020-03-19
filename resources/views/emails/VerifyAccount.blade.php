@extends('templates.verify_account_template')
@section('content')
<div class="container-fluid" style="background-color: #0F0F0F;" >

    <div class="row">


        <div class="col-xl-4"></div>
        <div class="col-xl-4 text-center text-white" style="background-color:#333137;;margin-top: 200px;margin-bottom: 250px;padding-top:30px; padding-bottom: 30px;">
             <p>Thank you for Register</p>
        <p>You will soon recieve an Email to activate your Account</p>

               @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        @endif
        {{ __('If you did not receive the email') }},
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
        </form>

        </div>
        <div class="col-xl-4"></div>
    </div>
 <!--   <div class="text-center text-white " style="background-color:green; width: 50%;margin: 0 auto;">

        <p>Thank you for Register</p>
        <p>You will soon recieve an Email to activate your Account</p>

        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        @endif

        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
        </form>

    </div>

    <div class="row">
        <div id="email_verification_notification_container" style="padding-bottom: 0px;width: 100%;height: 100%;padding-top: 0px;padding-left: 0px;">
            <!-- Start: Pretty Registration Form
            <div class="row text-white text-center" style="color: rgb(255,255,255);margin-top: 200px;margin-bottom: 250px;text-align: center">
                <p>An Email has been send to your Email-Adress</p>

            </div>


            <!-- End: Pretty Registration Form
        </div>
    </div> -->
    @endsection
