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

                @if(Auth::user()->nadestack_admin)
               <div class="row" style="margin-bottom: 8px">
                   <div class="col">
                       <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalClose">Close Thread</button>
                   </div>
               </div>
                @endif

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
                        @auth
                        <div class="row">
                            <div class="col"><button type="button" style="color: white; height: 17px; font-size: smaller; background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; outline:none;">Zitieren</button></div>
                            <div class="col text-right"><button data-toggle="modal" data-target="#modalReport" type="button" style="color: white; height: 17px; font-size: smaller; background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; outline:none;">Melden</button></div>
                        </div>
                        @endauth

                        @if(Auth::user()->nadestack_admin)
                        <div class="row" style="margin-bottom: 3px; margin-top: 3px">
                            <div class="col">
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalDelete" >Delete Message</button>
                            </div>
                        </div>
                        @endif

                        <hr class="bg-light">
                    </div>
                </div>
                <!-- Ende Nachrichtenblock-->

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

<!-- modaler dialog für user zum reporten -->
<div class="modal fade" id="modalReport" tabindex="-1" role="dialog" aria-hidden="true" style="color: white">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #474B4F; font-family: 'Roboto';">
            <form action="#"  method="POST">

                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Report User Message</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body mx-3">
                    <div class="md-form mb-5 text-center">
                        <p style="color: red;">Note: a ticket will be created!</p>
                        <label data-error="wrong" data-success="right" for="message">Leave a comment to the report</label>
                        <textarea name="deletemessage" rows="10" type="text" id="message" class="form-control validate"></textarea>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-danger" type="button">Report Message</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modaler dialog für admins zum Nachricht löschen -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="true" style="color: white">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #474B4F; font-family: 'Roboto';">
            <form action="#"  method="POST">

                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Delete Message</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body mx-3">
                    <div class="md-form mb-5 text-center">
                        <label data-error="wrong" data-success="right" for="message">Leave a delete comment</label>
                        <textarea name="deletemessage" rows="10" type="text" id="message" class="form-control validate"></textarea>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-danger" type="button">Delete Message</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modaler dialog für admins zum thread closen -->
<div class="modal fade" id="modalClose" tabindex="-1" role="dialog" aria-hidden="true" style="color: white">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #474B4F; font-family: 'Roboto';">
            <form action="#"  method="POST">

                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Close Thread</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body mx-3">
                    <div class="md-form mb-5 text-center">
                        <label data-error="wrong" data-success="right" for="message">Leave a comment to close the thread</label>
                        <textarea name="deletemessage" rows="10" type="text" id="message" class="form-control validate"></textarea>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-danger" type="button">Close thread</button>
                </div>
            </form>
        </div>
    </div>
</div>
