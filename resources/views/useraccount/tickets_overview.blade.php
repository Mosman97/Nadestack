@extends('templates.default_template')

@section('content')

    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col colum_content_big">

                <h1 class="text-center nadestack_heading_one">Your Support Tickets</h1>
                <a href="{{route('support')}}" class="btn nadestack_btn" type="button">New Ticket</a>

                <table class="table nadestack-tbl" style="color: white;">
                    <thead style="background-color: #1C2022;">
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Last Update</th>
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>AlexRR cheatet</td>
                        <td>Closed</td>
                        <td>20.3.20 - 19.00</td>
                        <td>20.3.20 - 19.00</td>
                    </tr>
                    <tr>
                        <td>Devran auch?</td>
                        <td>Waiting for admin</td>
                        <td>-</td>
                        <td>20.3.20 - 19.00</td>
                    </tr>
                    </tbody>
                </table>

                <div class="row nadestack-last-element" style="margin-top: 20px;">
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

            <div class="col-xl-3"></div>
        </div>
    </div>

@endsection
