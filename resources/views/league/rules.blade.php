@extends('templates.league_default_template')

@section('content')
    <div class="col-xl-6 colum_content_big">
        <img src='{{URL::asset('assets/img/de_cache_ruleset.png')}}' class="img-fluid" style="padding-top: 20px; padding-bottom: 20px" />
        <div id="rules_container">
            <div class="row">
                <div class="col"><button class="btn btn-danger btn-sm text-center text-white" type="button" data-toggle="collapse" data-target="#sub_rules_1" style="font-size: 16px;margin-top: -8px;"><i class="fa fa-arrow-circle-o-down"></i></button><span style="font-size: 25px;padding-left: 10px;padding-top: 1px;">1. General</span></div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="col">
                    <div id="sub_rules_1">
                        <div class="table-responsive nadestack_table">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>A. Eric stinkt</td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>B. schlechter AC von ERIC</h5>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                                            et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                                            labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                                        <p>MajorRabbit ist ein Hurensohn Minnorrabbit ist ein Ehrenmann</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
