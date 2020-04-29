@extends('templates.default_template')

@section('content')
    <div class="col colum_content_small">
        <h1 class="text-center nadestack_heading_one">Create new thread</h1>
        <div class="row text-center">
            <div class="col-xl-3"></div>
            <form method="POST" action="#">

                <div class="form-group row" style="padding-top: 5px; padding-bottom: 10px">
                    <label  class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-6">
                        <input type="text" name="thread-title" class="form-control"  placeholder="Enter Title" value=''>
                    </div>
                </div>
                <h2 class="text-center" style="padding-bottom: 10px">Message</h2>
                @trix(\App\News::class, 'content')
                <div style="padding-top: 20px">
                    <button class="text-center btn btn-success" style="margin-left: 25px">create thread</button>
                </div>
            </form>
            <div class="col-xl-3"></div>
        </div>
    </div>
@endsection
