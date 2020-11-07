<div style="border: grey;border-width: 2px;border-style: solid; border-radius: 5px">
    <form method="POST" action="{{route('admin_start_season')}}">
        @csrf
        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <div class="col-md-1"></div>
            <h4 class="text-center">No active or upcoming season</h4>
            <div class="col-md-3"></div>
        </div>
        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <div class="col-md-1"></div>
            <h5 class="text-center">Start new one:</h5>
            <div class="col-md-3"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-2">Seasonname:</label>
            <input class="col form-control" type="text" name="seasonname" required>
            <div class="col-md-5"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-2">Season start:</label>
            <input class="col form-control" type="date" name="seasonstart" required>
            <div class="col-md-5"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-2">Season end:</label>
            <input class="col form-control" type="date" name="seasonend" required >
            <div class="col-md-5"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-2">Teamlimit:</label>
            <input class="col form-control" type="text" name="teamlimit" required >
            <div class="col-md-5"></div>
        </div>

        <div class="form-row text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow">
            <label class="col-md-2">Registration end:</label>
            <input class="col form-control" type="date" name="regend" required >
            <div class="col-md-5"></div>
        </div>

        <div class="text-center d-xl-flex justify-content-xl-center align-items-xl-center editrow" style="margin-bottom: 10px">
            <div class="col-md-2"></div>
            <button type="submit" class="btn btn-success">Start Season</button>
            <div class="col-md-5"></div>
        </div>

    </form>
</div>
