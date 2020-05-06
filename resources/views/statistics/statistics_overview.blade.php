@extends('templates.default_template')

@section('content')
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col colum_content_big">
            <h1 class="text-center nadestack_heading_one">Nadestack statistics</h1>
            <div class="row">
                <a class="btn nadestack_btn" href="{{route('mapstats')}}" style="margin-left: 15px"><i class="fas fa-map"></i> Maps</a>
            </div>
            <h2 class="nadestack_heading_two">Best of the current season</h2>
            <div class="row">
                <div class="col">
                    <h3 class="nadestack_heading_three">Best players</h3>
                    <div class="table-responsive">
                        <table class="table nadestack-tbl">
                            <thead style="color: white;">
                            <tr>
                                <th>Avatar</th>
                                <th>Flagge</th>
                                <th>Name</th>
                                <th>Rating</th>
                                <th>Maps</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Simple</td>
                                <td>1.20</td>
                                <td>20</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col">
                    <h3 class="nadestack_heading_three">Best teams</h3>
                    <table class="table nadestack-tbl">
                        <thead style="color: white;">
                        <tr>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Rating</th>
                            <th>Maps</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-3"></div>
    </div>
@endsection
