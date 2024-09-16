<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 130vh;
            color: #333;
        }

        .container {
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #ccc;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .box {
            border: 2px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        .progress-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .progress-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.3s ease;
            margin: 0 10px;
            position: relative;
        }

        .progress-container:hover {
            transform: scale(1.05);
        }

        .progress-bar {
            width: 400px;
            height: 40px;
            background-color: #0e8235;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            display: flex;
        }

        .progress-bar .realisasi {
            background-color: #326df5;
            width: {{ $data[0] }}%;
            transition: width 0.3s ease;
            position: relative;
        }

        .progress-value {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #fff;
            font-weight: bold;
        }

        .progress-value.realisasi {
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .progress-value.sisa {
            right: 10px;
        }

        .progress-labels {
            display: flex;
            justify-content: space-between;
            width: 400px;
            margin-top: 10px;
        }

        .progress-label {
            font-weight: bold;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .values {
            margin-top: 20px;
            font-size: 18px;
            display: flex;
            justify-content: space-between;
        }

        .value-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 5px 20px;
            padding: 10px 20px;
            background-color: #f0f0f0;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .values .pagu {
            color: red;
        }

        .values .realisasi {
            color: blue;
        }

        .values .sisa {
            color: green;
        }

        .percentage {
            font-size: 14px;
            color: #666;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container">
        <h1>REALISASI ANGGARAN</h1>
        <div class="progress-wrapper">
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="realisasi" style="width: {{ $data[0] }}%;">
                        <div class="progress-value realisasi">{{ $data[0] }}%</div>
                    </div>
                    <div class="progress-value sisa" style="left: calc({{ $data[0] }}% + 10px);">{{ 100 - $data[0] }}%</div>
                </div>
                <div class="progress-labels">
                    <div class="progress-label" style="color: #326df5;">DIPA 01</div>
                    <div class="progress-label" style="color: #0e8235;">DIPA 04</div>
                </div>
            </div>
        </div>

        <div class="box">
            <h2>DIPA 01</h2>

            <div class="chart-container">
                <canvas id="myChart"></canvas>
            </div>

            <div class="values">
                <div class="value-item">
                    <span class="pagu">Pagu: Rp. {{ number_format($pagu, 0, ',', '.') }}</span>
                    <span class="percentage">({{ $persentasePagu }}%)</span>
                </div>
                <div class="value-item">
                    <span class="realisasi">Realisasi: Rp. {{ number_format($realisasi, 0, ',', '.') }}</span>
                    <span class="percentage">({{ $persentaseRealisasi }}%)</span>
                </div>
                <div class="value-item">
                    <span class="sisa">Sisa Pagu: Rp. {{ number_format($sisa, 0, ',', '.') }}</span>
                    <span class="percentage">({{ $persentaseSisa }}%)</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Pagu', 'Realisasi', 'Sisa Pagu'],
                datasets: [{
                    label: 'Manajemen dan Operasional',
                    data: [{{ $pagu }}, {{ $realisasi }}, {{ $sisa }}],
                    backgroundColor: ['#ff0000', '#326df5', '#00ff00'],
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            const value = data.datasets[0].data[tooltipItem.index];
                            const percentage = tooltipItem.index === 0 ? {{ $persentasePagu }} :
                                (tooltipItem.index === 1 ? {{ $persentaseRealisasi }} : {{ $persentaseSisa }});
                            return `Rp. ${value.toLocaleString()} (${percentage}%)`;
                        }
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>
