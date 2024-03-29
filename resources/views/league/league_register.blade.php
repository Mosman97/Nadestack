@extends('templates.default_template')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2"></div>
            <div class="col">
                <div id="profile_settings_form_container" style="width: auto;height: auto;">
                    <div class="row text-white register-form" >
                        <!-- Start: Pretty Registration Form -->
                        <div class="col-md-8 offset-md-2 colum_content_small">
                            <form class="text-white" id="profile_settings_form"  method="post" enctype="multipart/form-data">
                                <h1 class="text-center text-light nadestack_heading_one">Apply for {{$season->name}}</h1>
                                <p class="text-center">Registration end: {{$season->reg_end}}</p>
                                <p class="text-center">Season start: {{$season->season_start}}</p>
                                <p class="text-center">Season end: {{$season->season_end}}</p>
                                <div class="form-row form-group">
                                    <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">Prefered day:</label></div>
                                    <div class="col-sm-6 input-column">
                                        <select class="form-control" id="dayselector">
                                            <optgroup label="Select prefered day">
                                                <option value="01">Monday</option>
                                                <option value="02">Tuesday</option>
                                                <option value="03">Wednesday</option>
                                                <option value="04">Thursday</option>
                                                <option value="05">Friday</option>
                                                <option value="06">Saturday</option>
                                                <option value="07">Sunday</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-check text-center"><input class="form-check-input" type="checkbox" id="formCheck"><label class="form-check-label" for="formCheck" style="padding-bottom: 5px;">We've read and accept the <a style="color: red;" href="http://www.99damage.de">terms and conditions</a></label></div>
                                <div class="form-check text-center"><input class="form-check-input" type="checkbox" id="leaguecheck"><label class="form-check-label" for="leaguecheck" style="padding-bottom: 10px;">We've read and accept the <a style="color: red;" href="http://www.99damage.de">Nadestack league rules</a></label></div>
                                <div class="form-row">
                                    <div class="col text-center" style="padding-bottom: 15px;"><button class="btn nadestack_btn" type="button" style="margin-top: 10px;">Apply</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2"></div>
        </div>
    </div>

@endsection
