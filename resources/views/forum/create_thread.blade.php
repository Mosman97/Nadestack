@extends('templates.default_template')

@section('content')
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col colum_content_small">
            <h1 class="text-center nadestack_heading_one">Create new thread</h1>
            <div class="row text-center">
                <div class="col">
                    <form method="POST" action="#">
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-6">
                                <input type="text" name="thread-title" class="form-control"  placeholder="Enter Title" value=''>
                            </div>
                        </div>
                         @trix(\App\News::class, 'content')
                        <div style="padding-top: 20px">
                            <button class="text-center nadestack_btn">create thread</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-3"></div>
    </div>
@endsection
