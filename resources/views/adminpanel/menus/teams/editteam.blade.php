@extends('adminpanel.templates.dashboardtemplate')
@section('content')


<h3 class="text-dark mb-1 text-center" style="padding-bottom: 15px;">Edit Team</h3>

<hr>

<form>
    <h4 class="text-center">General Settings</h4>
    <div class="form-group row ">
        <label for="text" class="col-1 col-form-label">Teamname:</label> 
        <div class="col-2">
            <div class="input-group">
                <input id="text" name="text" type="text" class="form-control">
            </div>
        </div>
        <div class="col-8">
            <button class="btn btn-danger" type="button">
                <i class="fa fa-edit"></i>
            </button>
        </div>
    </div> 
    <div class="form-group row">
        <label for="text" class="col-1 col-form-label">Team-Tag:</label> 
        <div class="col-2">
            <div class="input-group">
                <input id="text" name="text" type="text" class="form-control">
            </div>
        </div>
        <div class="col-4">
            <button class="btn btn-danger" type="button"><i class="fa fa-edit"></i></button>
        </div>
    </div> 



</form>



@endsection