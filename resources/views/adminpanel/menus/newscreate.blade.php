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

                <div class="row">
                    <div class="col-xl-3">
                        <h3>News header</h3>
                    </div>
                    <div class="col-xl-5"><input type="text" class="form-control"></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-3">
                        <h3>Small header</h3>
                    </div>
                    <div class="col-xl-5"><input type="text" class="form-control"></div>
                </div>
                <hr>
                <h3 class="text-center">News Content</h3>

                <form method="POST" class="form-control mx-auto"action="#">
                    @csrf
                    @trix(\App\News::class, 'content')

                    <button class="text-center btn btn-danger">Publish News</button>
                </form>           
            </div>


        </div>




    </div>




</div>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
@endsection
