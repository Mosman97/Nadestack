@extends('templates.default_template')

@section('content')
    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6 colum_content_big">
                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table nadestack-tbl">
                                <thead style="background-color: #6B6E70; color: white;">
                                <tr>
                                    <th>League</th>
                                    <th>Posts</th>
                                    <th>Latest Post</th>
                                </tr>
                                </thead>
                                <tbody style="background-color: #6B6E70;">
                                <tr>
                                    <td>Problems (hier der link zur threadübersicht)</td>
                                    <td>200</td>
                                    <td>hier der link für den thread</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <div class="col-xl-3">
            </div>
        </div>
    </div>
@endsection
