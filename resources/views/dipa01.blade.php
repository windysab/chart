<!DOCTYPE html>
<html lang="en">
<head>
    <title>Progress Charts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #3b82f6, #9333ea);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #fff;
        }

        .container {
            text-align: center;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            border: 2px solid #ddd;
            width: 90%;
            max-width: 900px;
        }

        h2 {
            color: #3b82f6;
            margin-bottom: 30px;
        }

        .progress {
            height: 35px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            position: relative;
        }

        .progress-bar {
            line-height: 35px;
            font-size: 16px;
            transition: width 1s ease-in-out;
        }

        .progress-bar-success {
            background-color: #4caf50;
        }

        .progress-bar-info {
            background-color: #2196f3;
        }

        .card {
            margin-top: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            width: 100%;
            max-width: 800px;
            border: none;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #3b82f6;
            text-align: center;
        }

        .card-info1 {
            font-size: 18px; /* Adjusted font size */
            margin-top: 10px;
            color: #056e3d;
        }

        .card-info {
            font-size: 18px; /* Adjusted font size */
            margin-top: 10px;
            color: #220377;
        }

        .card-image {
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(19, 9, 9, 0.15);
            max-width: 100%;
            height: auto;
        }

        .progress-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .progress-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .charts-row {
            display: flex;
            justify-content: space-between;
            width: 100%;
            flex-wrap: wrap;
            gap: 20px;
        }

        .half-chart {
            flex: 1;
            text-align: center;
            padding: 10px;
            min-width: 300px;
        }

        .half-chart canvas {
            width: 90%;
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            .progress {
                height: 25px;
            }

            .progress-bar {
                font-size: 14px;
                line-height: 25px;
            }

            .card-title {
                font-size: 18px;
            }

            .card-info {
                font-size: 14px;
            }

            .half-chart canvas {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Progress Bar with Detailed Information</h2>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $progressGaji }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $progressGaji }}%" data-bs-toggle="tooltip" data-bs-placement="top" title="Gaji: {{ $progressGaji }}%">
                Gaji: {{ $progressGaji }}%
            </div>
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $progressOperasional }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $progressOperasional }}%" data-bs-toggle="tooltip" data-bs-placement="top" title="Operasional: {{ $progressOperasional }}%">
                Operasional: {{ $progressOperasional }}%
            </div>
        </div>

        <div class="progress-wrapper">
            <div class="progress-container">
                <div class="chart-item">
                    <div class="card">
                        <div class="card-title"><i class="fas fa-chart-line"></i> Gaji & Operasional Progress Charts</div>
                        <div class="charts-row">
                            <div class="half-chart">
                                <canvas id="gajiChart"></canvas>
                            </div>
                            <div class="half-chart">
                                <canvas id="operasionalChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        var gajiCtx = document.getElementById('gajiChart').getContext('2d');
        var operasionalCtx = document.getElementById('operasionalChart').getContext('2d');

        var gajiChart = new Chart(gajiCtx, {
            type: 'doughnut',
            data: {
                labels: ['Pagu', 'Realisasi', 'Sisa'],
                datasets: [{
                    data: [{{ $totalGajiPagu }}, {{ $totalGajiRealisasi }}, {{ $totalGajiPagu - $totalGajiRealisasi }}],
                    backgroundColor: ['#ff0000', '#00ff00', '#ffa500'],
                    hoverBackgroundColor: ['#ff6666', '#66ff66', '#ffd966']
                }]
            },
            options: {
                plugins: {
                    datalabels: {
                        formatter: function(value, context) {
                            var total = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                            var percentage = (value / total * 100).toFixed(1);
                            return percentage + '%';
                        },
                        color: '#000', // Set color to black
                        font: {
                            size: 20,
                            weight: 'bold'
                        },
                        anchor: 'center',
                        align: 'center'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.label || '';
                                var value = context.raw || 0;
                                return label + ': ' + value;
                            }
                        }
                    }
                }
            }
        });

        var operasionalChart = new Chart(operasionalCtx, {
            type: 'doughnut',
            data: {
                labels: ['Pagu', 'Realisasi', 'Sisa'],
                datasets: [{
                    data: [{{ $totalOperasionalPagu }}, {{ $totalOperasionalRealisasi }}, {{ $totalOperasionalPagu - $totalOperasionalRealisasi }}],
                    backgroundColor: ['#ff0000', '#0000ff', '#ffa500'],
                    hoverBackgroundColor: ['#ff6666', '#6666ff', '#ffd966']
                }]
            },
            options: {
                plugins: {
                    datalabels: {
                        formatter: function(value, context) {
                            var total = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                            var percentage = (value / total * 100).toFixed(1);
                            return percentage + '%';
                        },
                        color: '#000', // Set color to black
                        font: {
                            size: 20,
                            weight: 'bold'
                        },
                        anchor: 'center',
                        align: 'center'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.label || '';
                                var value = context.raw || 0;
                                return label + ': ' + value;
                            }
                        }
                    }
                }
            }
        });
    </script>

</body>
</html>
