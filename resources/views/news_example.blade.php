@extends('templates.default_template')

@section('content')
    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6 colum_content_big">
                <h1 class="text-center nadestack_heading_one">AlexRr schießt alles um!</h1>
                <p>AlexRr schießt alles um und mit dem Frechdachs Devrann wird er die Nadestack Liga wieder erobern. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                    sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                    tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                <p>Jitko - 20.1.20</p>
                <hr class="bg-light" />
                <div class="row">
                    <div class="col-xl-12">
                        <div>
                            <div class="card" style="background-color: #333138;margin-bottom: 25px;">
                                <div class="card-header">
                                    <h5 class="text-center mb-0">Comments</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <ul class="col-md-12" style="  list-style: none;">
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
                                                        <h3>sYn</h3><img src="blob:file:///e19f558e-2561-4608-bac1-c8405d369d96" width="80px" height="80" /></div>
                                                    <div class="col-md-6">
                                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                                                            et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                                                            labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
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
                                                        <h3>sYn</h3><img src="blob:file:///e19f558e-2561-4608-bac1-c8405d369d96" width="80px" height="80" /></div>
                                                    <div class="col-md-6">
                                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                                                            et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                                                            labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                                                    </div>
                                                    <div class="col-md-3"></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
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
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
