@extends('templates.default_template')

@section('content')
    <div class="container-fluid" style="background-color: #0F0F0F;">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6 offset-xl-0 text-center" style="padding-top: 60px;">
                <h2 class="text-center">Season X - Matchday Y</h2>
                <div class="table-responsive table-borderless text-white" id="match_result_table">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td class="text-center"><img src="assets/img/BIG2.png" style="width: 150px;"></td>
                            <td class="text-center text-white d-xl-flex justify-content-xl-center" style="font-size: 40px;padding: 12px;padding-top: 50px;">2:0</td>
                            <td class="text-center"><img src="assets/img/navi-logo-yellow-background.jpg" style="width: 150px;height: 150px;"></td>
                        </tr>
                        <tr>
                            <td class="text-center text-white">BIG</td>
                            <td class="text-center" style="color: rgb(255,255,255);">Status: closed</td>
                            <td class="text-center text-white">NAVI</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <form>
                    <div class="form-row" style="padding-bottom: 15px;">
                        <div class="col-xl-3 d-xl-flex justify-content-xl-center align-items-xl-center"><label class="col-form-label text-center d-xl-flex justify-content-xl-center align-items-xl-center">Date proposal 1:</label></div>
                        <div class="col-xl-5 d-xl-flex justify-content-xl-center align-items-xl-center"><input class="form-control" type="datetime-local"></div>
                        <div class="col-xl-4 text-center d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 16px;"><button class="btn btn-success d-xl-flex justify-content-xl-center align-items-xl-center" type="button" style="font-size: 15px;padding-left: 0px;margin-left: 0px;"><i class="fa fa-check" style="padding-left: 10px;"></i><span>&nbsp;Accept</span></button>
                            <span
                                style="padding-left: 10px;"></span><button class="btn btn-danger d-xl-flex justify-content-xl-center align-items-xl-center" type="button" style="font-size: 15px;padding-left: 0px;"><i class="fa fa-remove" style="padding-left: 10px;"></i><span>&nbsp;Decline</span></button></div>
                    </div>
                    <div class="form-row" style="padding-bottom: 15px;">
                        <div class="col-xl-3 d-xl-flex justify-content-xl-center align-items-xl-center"><label class="col-form-label text-center d-xl-flex justify-content-xl-center align-items-xl-center">Date proposal 2:</label></div>
                        <div class="col-xl-5 d-xl-flex justify-content-xl-center align-items-xl-center"><input class="form-control" type="datetime-local"></div>
                        <div class="col-xl-4 text-center d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 16px;"><button class="btn btn-success d-xl-flex justify-content-xl-center align-items-xl-center" type="button" style="font-size: 15px;padding-left: 0px;margin-left: 0px;"><i class="fa fa-check" style="padding-left: 10px;"></i><span>&nbsp;Accept</span></button>
                            <span
                                style="padding-left: 10px;"></span><button class="btn btn-danger d-xl-flex justify-content-xl-center align-items-xl-center" type="button" style="font-size: 15px;padding-left: 0px;"><i class="fa fa-remove" style="padding-left: 10px;"></i><span>&nbsp;Decline</span></button></div>
                    </div>
                    <div class="form-row" style="padding-bottom: 15px;">
                        <div class="col-xl-3 d-xl-flex justify-content-xl-center align-items-xl-center"><label class="col-form-label text-center d-xl-flex justify-content-xl-center align-items-xl-center">Date proposal 3:</label></div>
                        <div class="col-xl-5 d-xl-flex justify-content-xl-center align-items-xl-center"><input class="form-control" type="datetime-local"></div>
                        <div class="col-xl-4 text-center d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 16px;"><button class="btn btn-success d-xl-flex justify-content-xl-center align-items-xl-center" type="button" style="font-size: 15px;padding-left: 0px;margin-left: 0px;"><i class="fa fa-check" style="padding-left: 10px;"></i><span>&nbsp;Accept</span></button>
                            <span
                                style="padding-left: 10px;"></span><button class="btn btn-danger d-xl-flex justify-content-xl-center align-items-xl-center" type="button" style="font-size: 15px;padding-left: 0px;"><i class="fa fa-remove" style="padding-left: 10px;"></i><span>&nbsp;Decline</span></button></div>
                    </div>
                </form>
            </div>
            <div class="col-xl-3"></div>
        </div>
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6 offset-xl-0 text-center">
                <div class="row">
                    <div class="col">
                        <h3>Mapvote</h3>
                        <div class="table-responsive nadestack_table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>de_cache</th>
                                    <th>de_train</th>
                                    <th>de_mirage</th>
                                    <th>de_vertigo</th>
                                    <th>de_nuke</th>
                                    <th>de_inferno</th>
                                    <th>de_overpass</th>
                                    <th>de_dust2</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><img class="grow" src="assets/img/maps/de_cache_map.png" style="width: 80px;height: 60px;"></td>
                                    <td><img class="grow" src="assets/img/maps/de_cache_map.png" style="width: 80px;height: 60px;"></td>
                                    <td><img class="grow" src="assets/img/maps/de_cache_map.png" style="width: 80px;height: 60px;"></td>
                                    <td><img class="grow" src="assets/img/maps/de_cache_map.png" style="width: 80px;height: 60px;"></td>
                                    <td><img class="grow" src="assets/img/maps/de_cache_map.png" style="width: 80px;height: 60px;"></td>
                                    <td><img class="grow" src="assets/img/maps/de_cache_map.png" style="width: 80px;height: 60px;"></td>
                                    <td><img class="grow" src="assets/img/maps/de_cache_map.png" style="width: 80px;height: 60px;"></td>
                                    <td><img class="grow" src="assets/img/maps/de_cache_map.png" style="width: 80px;height: 60px;"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h6 style="margin-bottom: 10px;margin-top: 10px;">Status: Waiting for BIG to remove</h6><button class="btn nadestack_btn" id="remove_map_btn" type="button">remove selected Map</button></div>
                </div>
            </div>
            <div class="col-xl-3"></div>
        </div>
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div>
                    <div class="card" style="background-color: #333138;margin-bottom: 25px;">
                        <div class="card-header">
                            <h5 class="text-center mb-0">Comment Section</h5>
                        </div>
                        <div class="card-body"><div class="row">
                                <ul class="col-md-12" style="list-style: none;">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-borderless comment_header" >
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-left">#1</td>
                                                        <td class="text-right">2020-02-04 19:00</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 text-center">
                                                <h3>sYn</h3><img src="assets/img/BIG2.png" width="80px" height="80" />
                                            </div>
                                            <div class="col-md-6">
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-borderless comment_header">
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-left">#1</td>
                                                        <td class="text-right">2020-02-04 19:00</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 text-center">
                                                <h3>sYn</h3><img src="assets/img/BIG2.png" width="80px" height="80" />
                                            </div>
                                            <div class="col-md-6">
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                            <-- comment section -->
                            <h4 class="text-center">Add Comment</h4>
                            <form class="text-center">
                                <div class="form-row">
                                    <div class="col"><textarea class="form-control"></textarea></div>
                                </div>
                                <div class="form-row">
                                    <div class="col"><button class="btn btn-primary nadestack_btn" id="comment_submit_btn" type="button">Submit Comment</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
