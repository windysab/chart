<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <style>
        body {
            background: linear-gradient(to right, #3b82f6, #9333ea);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 2rem;
            max-width: 600px;
            width: 100%;
            border: 4px solid #d1d5db;
        }
        .title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #1f2937;
        }
        .chart-wrapper {
            display: flex;
            justify-content: center;
        }
        canvas {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Chart</h1>
        <div class="chart-wrapper">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('myChart').getContext('2d');
            const chartData = {
                labels: {!! json_encode($labels) !!},
                datasets: [
                    {
                        label: 'Pagu',
                        data: {!! json_encode($paguData) !!},
                        backgroundColor: '#4caf50',
                        borderColor: '#4caf50',
                        borderWidth: 1
                    },
                    {
                        label: 'Realisasi',
                        data: {!! json_encode($realisasiData) !!},
                        backgroundColor: '#f44336',
                        borderColor: '#f44336',
                        borderWidth: 1
                    }
                ]
            };
            const config = {
                type: 'bar',
                data: chartData,
                options: {
                    plugins: {
                        datalabels: {
                            display: false
                        }
                    },
                    onClick: function (evt, item) {
                        if (item.length) {
                            const datasetIndex = item[0].datasetIndex;
                            const index = item[0].index;
                            const value = chartData.datasets[datasetIndex].data[index];
                            alert(`Value: ${value}`);
                        }
                    }
                }
            };
            const myChart = new Chart(ctx, config);
        });
    </script>
</body>
</html>
