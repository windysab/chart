<!DOCTYPE html>
<html>
<head>
    <title>Stastistik Perkara</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Stastistik Perkara</h1>
    <canvas id="myChart" width="500" height="300"></canvas>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($labels),
                    datasets: [
                        {
                            label: 'Sisa Lama',
                            data: @json($sisa_lama),
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgb(255, 99, 132)',
                            borderWidth: 1
                        },
                        {
                            label: 'Perkara Masuk',
                            data: @json($perkara_masuk),
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgb(54, 162, 235)',
                            borderWidth: 1
                        },
                        {
                            label: 'Perkara Putus',
                            data: @json($perkara_putus),
                            backgroundColor: 'rgba(255, 206, 86, 0.2)',
                            borderColor: 'rgb(255, 206, 86)',
                            borderWidth: 1
                        },
                        {
                            label: 'Sisa Baru',
                            data: @json($sisa_baru),
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgb(75, 192, 192)',
                            borderWidth: 1
                        },
                        {
                            label: 'Rasio',
                            data: @json($rasio),
                            backgroundColor: 'rgba(153, 102, 255, 0.2)',
                            borderColor: 'rgb(153, 102, 255)',
                            borderWidth: 1
                        },
                        {
                            label: 'E-court',
                            data: @json($e_court),
                            backgroundColor: 'rgba(255, 159, 64, 0.2)',
                            borderColor: 'rgb(255, 159, 64)',
                            borderWidth: 1
                        },
                        {
                            label: 'BHT',
                            data: @json($bht),
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgb(255, 99, 132)',
                            borderWidth: 1
                        },
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });
    </script>
</body>
</html>
