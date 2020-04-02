@extends('adminpanel.templates.dashboardtemplate')
@section('content')

    <h3 class="text-dark mb-1" style="padding-bottom: 15px;">Edit User Syn</h3>

    <form>
        <div class="form-row">
            <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Username:</label></div>
            <div class="input-column"><input class="form-control" type="text"></div>

            <div class="form-row">
                <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">First Name:</label></div>
                <div class="input-column"><input class="form-control" type="text"></div>
            </div>

            <div class="form-row">
                <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Last Name:</label></div>
                <div class="input-column"><input class="form-control" type="text"></div>
            </div>

            <div class="form-row">
                <div class="col-sm-4 col-xl-3 text-center d-xl-flex justify-content-xl-center align-items-xl-center label-column"><label class="col-form-label">Username</label></div>
                <div class="input-column"><input class="form-control" type="text"></div>
            </div>
        </div>
    </form>


@endsection
