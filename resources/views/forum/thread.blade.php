@extends('templates.default_template')

@section('content')
    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6 colum_content_big">
                <div class="row">
                    <div class="col">
                        <h1 class="nadestack_heading_one">{{$thread_data->forum_thread_title}}</h1>
                    </div>
                </div>

                @auth
                @if(Auth::user()->nadestack_admin)
               <div class="row" style="margin-bottom: 8px">
                   <div class="col">
                       <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalClose"><i class="fas fa-lock"></i> Close Thread <i class="fas fa-lock"></i></button>
                   </div>
               </div>
                @endif
                @endauth

               <!-- Nachrichtenblock bzw eine Nachricht-->
                @foreach($forum_posts as $forum_post_entry)
                <div class="row">

                    <div class="col-md3">
                        <img src="{{URL::asset('assets/img/profile_pictures/')}}/{{$forum_post_entry->avatar_url}}" style="width: 60px;height: 60px; margin-left: 15px">
                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col-md-2"><p>{{$forum_post_entry->username}}</p></div>
                            <div class="col text-right"><p>{{$forum_post_entry->created_at}}</p></div>
                        </div>
                        <p>
                            {{$forum_post_entry->forum_post_content}}
                        </p>

                        @auth
                        <div class="row">
                            <div class="col"><button type="button" style="color: white; height: 17px; font-size: smaller; background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; outline:none;">Zitieren</button></div>
                            <div class="col text-right"><button data-toggle="modal" data-target="#modalReport" type="button" style="color: white; height: 17px; font-size: smaller; background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; outline:none;">Melden</button></div>
                        </div>

                        @if(Auth::user()->nadestack_admin)
                        <div class="row" style="margin-top: 6px">
                            <div class="col">
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalDelete" ><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </div>
                        @endif

                        @endauth

                        <hr class="bg-light">
                    </div>
                </div>
                @endforeach
                <!-- Ende Nachrichtenblock-->

                <hr class="bg-light">
                <form method="POST" action="{{route('newpost', $forum_thread_id)}}">
                    @csrf
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                            <textarea name="posttext" class="form-control" style="height: 120px"></textarea>
                        </div>
                    </div>
                    <div style="margin-top: 10px" class="text-center">
                        <button class=" nadestack_btn btn btn-sm" type="submit" >Answer</button>
                    </div>
                </form>

                <div class="d-flex justify-content-center nadestack-pagination mt-auto " style="padding-top: 10px" ></div>
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
            <form action="{{route('reportpost', $forum_thread_id)}}"  method="POST">
                @csrf
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Report User Message</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body mx-3">
                    <div class="md-form mb-5 text-center">
                        <label data-error="wrong" data-success="right" for="message">Leave a comment to the report</label>
                        <textarea name="report_message" rows="10" type="text" id="message" class="form-control validate"></textarea>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-danger" type="submit">Report Message</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modaler dialog für admins zum Nachricht löschen -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="true" style="color: white">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #474B4F; font-family: 'Roboto';">
            <form action=""  method="POST">

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
            <form action=""  method="POST">
                @csrf
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
                    <button class="btn btn-danger" type="submit"><i class="fas fa-lock"></i> Close thread</button>
                </div>
            </form>
        </div>
    </div>
</div>
