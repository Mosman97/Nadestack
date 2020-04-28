@extends('templates.default_template')

@section('content')
    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6 colum_content_big">
                <div class="row">
                    <div class="col">
                        <h1 class="nadestack_heading_one">Thread Thema</h1>
                    </div>
                </div>

                <!-- Nachrichtenblock bzw eine Nachricht-->
                <div class="row">

                    <div class="col-md3">
                        <img src="{{URL::asset('assets/img/profile_pictures/')}}" style="width: 60px;height: 60px; margin-left: 15px">
                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col-md-2"><p>Username</p></div>
                            <div class="col"><p>vor 6 min</p></div>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                        </p>
                        <div class="row">
                            <div class="col"><button>Zitieren</button></div>
                            <div class="col text-right"><button>Melden</button></div>
                        </div>
                        <hr class="bg-light">
                    </div>

                </div>


                <div class="row" style="margin-top: 10px;">
                    <div id="news_pagination" class="row mx-auto">
                        <div class="col-md-12 mx-auto text-center">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-xl-3"></div>
        </div>
    </div>
@endsection
