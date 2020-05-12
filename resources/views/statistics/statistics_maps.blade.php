@extends('templates.default_template')

@section('content')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
    <div class="container-fluid nadestack_body">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6 colum_content_big">
                <h2 class="text-center nadestack_heading_two nadestack-first-element">Maps played Distribution</h2>
                <canvas id="mapsplayed" style="margin-bottom: 15px"></canvas>
                <script>
                    var ctx = document.getElementById('mapsplayed').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'horizontalBar',
                        data: {
                            labels: ['Cache', 'Mirage', 'Nuke', 'Overpass', 'Inferno', 'Train'],
                            datasets: [{
                                data: [12, 19, 3, 5, 2, 3],
                                barThickness: 30,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                xAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                    }
                                }]
                            },
                            legend: {
                                display: false
                            },
                        }
                    });
                </script>

                <h2 class="nadestack_heading_two">Distribution of T / CT wins on maps</h2>
                <canvas id="distribution" class="nadestack-last-element"></canvas>
                <script>
                    new Chart(document.getElementById("distribution"), {
                        type: 'bar',
                        data: {
                            labels: ['Cache', 'Mirage', 'Nuke', 'Overpass', 'Inferno', 'Train'],
                            datasets: [
                                {
                                    barThickness: 25,
                                    label: "Counter-Terrorists",
                                    backgroundColor: "#3e95cd",
                                    data: [45,45,55,52,60,47]
                                }, {
                                    barThickness: 25,
                                    label: "Terrorists",
                                    backgroundColor: "#FFFF99",
                                    data: [55,55,45,48,40,53]
                                }
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                    }
                                }]
                            }
                        }
                    });
                </script>
            </div>
            <div class="col-xl-3"></div>
        </div>
    </div>
@endsection
