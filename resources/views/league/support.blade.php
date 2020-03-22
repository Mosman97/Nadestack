@extends('templates.default_template')

@section('content')
    <script src='{{URL::asset('assets/js/validate/supportvalidate.js')}}'></script>
    <div class="container-fluid" style="background-color: #0F0F0F;">
        <div class="row">
            <div class="col-xl-2"></div>
            <div class="col">
                <div id="profile_settings_form_container">
                    <!-- Start: Pretty Registration Form -->
                    <div class="row text-white register-form" style="color: rgb(255,255,255);">
                        <div class="col-md-8 offset-md-2">
                            <form class="nadestack_form nadestack-firt-element" id="profile_settings_form" method="post" enctype="multipart/form-data" action="#">
                                <h1 class="text-center nadestack_heading_one">Nadestack Support</h1>
                                <hr class="bg-light"/>
                                <h2 class="text-center nadestack_heading_two" >Instant Support during match:</h2>
                                <a href="https://discord.gg/p7K2qwt" target="_blank">
                                    <img src='{{URL::asset('assets/img/discord-logo.png')}}' class="mx-auto d-block" style="height: 60px" >
                                </a>
                                <hr class="bg-light"/>
                                <h2 class="nadestack_heading_two">Submit Support Ticket</h2>
                                <div class="form-row form-group">
                                    <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column" style="padding-left: 5px;"><label class="col-form-label">Topic:</label></div>
                                    <div class="col-sm-6 input-column">
                                        <select class="form-control" required="">
                                            <optgroup label="General">
                                                <option value="12">Questions about league system</option>
                                                <option value="13">Questions about data protection</option>
                                                <option value="14">Improvement proposals</option>
                                            </optgroup>
                                            <optgroup label="Account Management">
                                                <option value="">Change Steam-ID</option>
                                            </optgroup>
                                            <optgroup label="Report">
                                                <option value="">Website Problems</option>
                                                <option value="">League  Problems</option>
                                                <option value="">Game Issues</option>
                                                <option value="">Team Issues</option>
                                                <option value="">Player Report</option>
                                            </optgroup><optgroup label="Buisness Inquiries">
                                                <option value="">Sponsors</option>
                                                <option value="">Press</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Title:</label></div>
                                    <div class="col-sm-6 input-column"><input class="form-control" type="email" required="" minlength="2"></div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Description:</label></div>
                                    <div class="col-sm-6 input-column"><textarea class="form-control" style="height: 250px;"></textarea></div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col-sm-4 col-xl-3 offset-xl-0 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label text-white" for="repeat-pawssword-input-field">File Upload:</label></div>
                                    <div class="col"><input type="file"><label>(max. 3 Files and 500 MB in total)</label></div>
                                </div>
                                <hr class="bg-light"/>
                                <div class="form-check text-center"><input class="form-check-input" type="checkbox" id="formCheck"><label class="form-check-label" for="formCheck">I've read and accept the <a style="color: red;" href="http://www.99damage.de">terms and conditions</a></label></div>
                                <div class="form-row">
                                    <div class="col text-center nadestack-last-element"><button id="submit_btn" class="btn nadestack_btn" type="button" style="margin-top: 10px;">Submit Ticket</button></div>
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
