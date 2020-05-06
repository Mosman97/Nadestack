@extends('templates.league_default_template')

@section('content')
    <div class="col-xl-6 colum_content_big">
        <img src='{{URL::asset('assets/img/de_cache_ruleset.png')}}' class="img-fluid" style="padding-top: 20px; padding-bottom: 20px" />
        <a href="#section1">1. Allgemeines</a>
        <li class="rulesetparagraph">B Beispiel</li>
        <li class="rulesetparagraph">B Beispiel</li>
        <li class="rulesetparagraph">B Beispiel</li>
        <li class="rulesetparagraph">B Beispiel</li>
        <a>2. Allgemeines</a>
        <li class="rulesetparagraph">B Beispiel</li>
        <li class="rulesetparagraph">B Beispiel</li>
        <a>3. Allgemeines</a>
        <li class="rulesetparagraph">B Beispiel</li>
        <li class="rulesetparagraph">B Beispiel</li>
        <li class="rulesetparagraph">B Beispiel</li>
        <li class="rulesetparagraph">B Beispiel</li>
        <li class="rulesetparagraph">B Beispiel</li>
        <li class="rulesetparagraph">B Beispiel</li>
        <div id="section1" style="margin-top: 15px">
            <h5>Allgemeines</h5>
            <p>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
            </p>
        </div>
    </div>

    <button class="btn btn-danger btn-lg" onclick="topFunction()" id="goTop" title="Go to top" style="position: fixed; bottom: 20px; display: none;right: 30px;z-index: 99;"><i class="fas fa-sort-up"></i></button>
    <script>
        mybutton = document.getElementById("goTop");
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            if (document.body.scrollTop > 70 || document.documentElement.scrollTop > 70) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
@endsection
