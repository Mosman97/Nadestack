<!DOCTYPE html>
<html>
    @include('adminpanel.includes.adminpanel_head')
    @include('adminpanel.includes.adminpanel_scripts')
    <body>

        <div id="wrapper">
            @include('adminpanel.includes.adminpanel_sidenav')

            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content" class="">
                    @include('adminpanel.includes.adminpanel_rightmenu')
                    <div class="container-fluid">
                                @yield('content')


                    </div>
                </div>

            </div>


        </div>

    </body>

</html>