<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
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
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border: 2px solid #ddd;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        h1 {
            font-size: 28px;
            color: #4a90e2;
        }

        .box {
            border: 2px solid #ddd;
            border-radius: 12px;
            padding: 20px;
            margin-top: 20px;
            background-color: #f9f9f9;
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
            width: 100%;
            max-width: 600px;
        }

        .progress-container:hover {
            transform: scale(1.05);
        }

        .progress-bar {
            width: 150%;
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
            width: 100%;
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

        .icon {
            width: 24px;
            height: 24px;
            margin-right: 8px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="https://img.icons8.com/ios-filled/50/000000/money.png" alt="Logo">
            <h1>REALISASI ANGGARAN</h1>
        </div>
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
                    <img src="https://img.icons8.com/ios-filled/50/000000/money.png" class="icon" alt="Pagu Icon">
                    <span class="pagu">Pagu: Rp. {{ number_format($pagu, 0, ',', '.') }}</span>
                    <span class="percentage">({{ $persentasePagu }}%)</span>
                </div>
                <div class="value-item">
                    <img src="https://img.icons8.com/ios-filled/50/000000/money-bag.png" class="icon" alt="Realisasi Icon">
                    <span class="realisasi">Realisasi: Rp. {{ number_format($realisasi, 0, ',', '.') }}</span>
                    <span class="percentage">({{ $persentaseRealisasi }}%)</span>
                </div>
                <div class="value-item">
                    <img src="https://img.icons8.com/ios-filled/50/000000/safe.png" class="icon" alt="Sisa Icon">
                    <span class="sisa">Sisa Pagu: Rp. {{ number_format($sisa, 0, ',', '.') }}</span>
                    <span class="percentage">({{ $persentaseSisa }}%)</span>
                </div>
            </div>
        </div>

        <div class="box">
            <h2>DIPA 04</h2>

            <div class="chart-container">
                <canvas id="myChart2"></canvas>
            </div>

            <div class="values">
                <div class="value-item">
                    <img src="https://img.icons8.com/ios-filled/50/000000/money.png" class="icon" alt="Pagu Icon">
                    <span class="pagu">Pagu: Rp. {{ number_format($pagu, 0, ',', '.') }}</span>
                    <span class="percentage">({{ $persentasePagu }}%)</span>
                </div>
                <div class="value-item">
                    <img src="https://img.icons8.com/ios-filled/50/000000/money-bag.png" class="icon" alt="Realisasi Icon">
                    <span class="realisasi">Realisasi: Rp. {{ number_format($realisasi, 0, ',', '.') }}</span>
                    <span class="percentage">({{ $persentaseRealisasi }}%)</span>
                </div>
                <div class="value-item">
                    <img src="https://img.icons8.com/ios-filled/50/000000/safe.png" class="icon" alt="Sisa Icon">
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
                animation: {
                    duration: 2000,
                    easing: 'easeInOutBounce'
                },
                tooltips: {
                    backgroundColor: 'rgba(0, 0, 0, 0.7)',
                    titleFontFamily: 'Roboto',
                    titleFontSize: 16,
                    titleFontStyle: 'bold',
                    titleFontColor: '#fff',
                    bodyFontFamily: 'Roboto',
                    bodyFontSize: 14,
                    bodyFontColor: '#fff',
                    bodySpacing: 10,
                    xPadding: 10,
                    yPadding: 10,
                    cornerRadius: 4,
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

        const ctx2 = document.getElementById('myChart2').getContext('2d');
        const myChart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['Pagu', 'Realisasi', 'Sisa Pagu'],
                datasets: [{
                    label: 'Manajemen dan Operasional',
                    data: [{{ $pagu }}, {{ $realisasi }}, {{ $sisa }}],
                    backgroundColor: 'rgba(50, 109, 245, 0.2)',
                    borderColor: '#326df5',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                animation: {
                    duration: 2000,
                    easing: 'easeInOutBounce'
                },
                tooltips: {
                    backgroundColor: 'rgba(0, 0, 0, 0.7)',
                    titleFontFamily: 'Roboto',
                    titleFontSize: 16,
                    titleFontStyle: 'bold',
                    titleFontColor: '#fff',
                    bodyFontFamily: 'Roboto',
                    bodyFontSize: 14,
                    bodyFontColor: '#fff',
                    bodySpacing: 10,
                    xPadding: 10,
                    yPadding: 10,
                    cornerRadius: 4,
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
