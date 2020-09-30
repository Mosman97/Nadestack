    <script src="{{asset('assets/dashboardassets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/dashboardassets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/dashboardassets/js/chart.min.js')}}"></script>
    <script src="{{asset('assets/dashboardassets/js/bs-init.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="{{asset('assets/dashboardassets/js/theme.js')}}"></script>
    <script src="{{asset('assets/dashboardassets/js/custom.js')}}"></script>
    <script>
        function togglebar() {
            var bar = document.getElementById("sidebar");
            var btn = document.getElementById("togglebarbtn");
            if (bar.style.display === "none") {
                bar.style.display = "block";
                btn.style.display = "none";
            }
            else {
                bar.style.display = "none";
                btn.style.display = "block";
            }
        }
    </script>
