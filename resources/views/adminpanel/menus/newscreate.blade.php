@extends('adminpanel.templates.dashboardtemplate')
@section('content')
<div id="wrapper">
    @include('adminpanel.includes.adminpanel_sidenav')
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content" class="">
            @include('adminpanel.includes.adminpanel_rightmenu')
            <div class="container-fluid">
                <h1 class="text-dark mb-1">Create news</h1>
                <hr>
                <form method="POST" class=""action="{{route('adminpanel_storenews')}}">

                    <div class="form-group row" style="padding-top: 5px; padding-bottom: 10px">
                        <label  class="col-sm-2 col-form-label">News-Heading</label>
                        <div class="col-sm-6">
                            <input type="text" name="news_heading" class="form-control"  placeholder="Enter Newstitle">
                        </div>
                    </div>
                    <div class="form-group row" style="padding-top: 5px; padding-bottom: 10px">
                        <label  class="col-sm-2 col-form-label">Small-Heading</label>
                        <div class="col-sm-6">
                            <input type="text" name="news_small_heading" class="form-control"  placeholder="Enter small title">
                        </div>
                    </div>
                    <hr>
                    @csrf
                    <h2 class="text-center" style="padding-bottom: 10px">News Content</h2>
                    @trix(\App\News::class, 'content')
                    <div style="padding-top: 20px">
                        <button class="text-center btn btn-danger">Publish News</button>
                        <button class="text-center btn btn-success" style="margin-left: 25px">Save News</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
@endsection
