@extends('templates.default_template')

@section('content')
    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6 colum_content_big">
                <div class="row">
                    <div class="col">
                        <h1 class="nadestack_heading_one">League problems</h1>
                        @auth
                        <button class="nadestack_btn" style="background-color: #86C232; margin-bottom: 8px">Create thread</button>
                        @endauth
                        <div class="table-responsive">
                            <table class="table nadestack-tbl table-borderless">
                                <thead>
                                <tr>
                                    <th>Topic</th>
                                    <th>Replies</th>
                                    <th>Author</th>
                                    <th></th>
                                    <th>Activity</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr style="background-color: #404448">
                                    <td>Problems (hier der link zur threadübersicht)</td>
                                    <td>200</td>
                                    <th></th>
                                    <th></th>
                                    <td>hier der link für den thread</td>
                                </tr>
                                <tr>
                                    <td>Problems (hier der link zur threadübersicht)</td>
                                    <td>200</td>
                                    <th></th>
                                    <th></th>
                                    <td>hier der link für den thread</td>
                                </tr>
                                <tr style="background-color: #404448">
                                    <td>Problems (hier der link zur threadübersicht)</td>
                                    <td>200</td>
                                    <th></th>
                                    <th></th>
                                    <td>hier der link für den thread</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

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
