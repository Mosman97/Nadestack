@extends('adminpanel.templates.dashboardtemplate')
@section('content')

    <div style="margin-top: 18px; margin-bottom: 18px">
        <button type="button" class="btn btn-warning">Warn User</button>
        <button type="button" class="btn btn-danger">Ban User</button>
    </div>

    <h3 class="text-dark mb-1" style="padding-bottom: 15px;">Edit User Syn</h3>

    <form>
        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Username:</label>
            <input class="col form-control" type="text" id="username">
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">First Name</label>
            <input class="col form-control" type="text" id="firstname">
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Last Name</label>
            <input class="col form-control" type="text" id="lastname">
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Birthday</label>
            <input class="col form-control" id="birthday" type="date">
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Description</label>
            <textarea class="col form-control" style="height: 120px;" type="text" id="description"></textarea>
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">SteamID</label>
            <input class="col form-control" type="text" id="steamid" readonly>
            <div class="col-md-3"></div>
        </div>
        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <div class="col-md-1"></div>
            <button type="button" class="btn btn-danger">Remove Steam Connection</button>
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Avatar</label>
            <img class="col" src="#" style="width: 100px;height: 100px;">
            <div class="col-md-3"></div>
        </div>
        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <div class="col-md-1"></div>
            <button type="button" class="btn btn-danger">Remove Avatar</button>
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Twitter</label>
            <input class="col form-control" type="text" id="twitter">
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Instagram</label>
            <input class="col form-control" type="text" id="instagram">
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Twitch</label>
            <input class="col form-control" type="text" id="twitch">
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-1">Youtube</label>
            <input class="col form-control" type="text" id="youtube">
            <div class="col-md-3"></div>
        </div>

    </form>

    <div class="text-center" style="margin-top: 18px; margin-bottom: 18px">
        <button type="button" class="btn btn-success">Save User</button>
    </div>

@endsection
