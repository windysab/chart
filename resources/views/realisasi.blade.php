<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <link rel="stylesheet" href="{{ asset('css/stylesrealisasi.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="https://img.icons8.com/ios-filled/50/000000/money.png" alt="Logo">
            <h1>REALISASI ANGGARAN PA AMUNTAI</h1>
            <h2>PENGADILAN AGAMA AMUNTAI</h2>
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
            <h1 style="color: blue;">DIPA 01</h1>

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
            <h1 style="color: green;">DIPA 04</h1>

            <div class="chart-container">
                <canvas id="myChart2"></canvas>
            </div>

            <div class="values">
                <div class="value-item">
                    <img src="https://img.icons8.com/ios-filled/50/000000/money.png" class="icon" alt="Pagu Icon">
                    <span class="pagu">Pagu: Rp. {{ number_format($P, 0, ',', '.') }}</span>
                    <span class="percentage">({{ $persentaseP }}%)</span>
                </div>
                <div class="value-item">
                    <img src="https://img.icons8.com/ios-filled/50/000000/money-bag.png" class="icon" alt="Realisasi Icon">
                    <span class="realisasi">Realisasi: Rp. {{ number_format($R, 0, ',', '.') }}</span>
                    <span class="percentage">({{ $persentaseR }}%)</span>
                </div>
                <div class="value-item">
                    <img src="https://img.icons8.com/ios-filled/50/000000/safe.png" class="icon" alt="Sisa Icon">
                    <span class="sisa">Sisa Pagu: Rp. {{ number_format($S, 0, ',', '.') }}</span>
                    <span class="percentage">({{ $persentaseS }}%)</span>
                </div>
            </div>
        </div>

        <div class="footer">
            &copy; Windy Sabtami, S.Kom
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
                    backgroundColor: ['#ff0000', '#00ff00', '#ffa500'],
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

        const ctx2 = document.getElementById('myChart2').getContext('2d');
        const myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Pagu', 'Realisasi', 'Sisa Pagu'],
                datasets: [{
                    label: 'Penegakan dan Pelayanan Hukum',
                    data: [{{ $P }}, {{ $R }}, {{ $S }}],
                    backgroundColor: ['#ff0000', '#00ff00', '#ffa500'],
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
                            const percentage = tooltipItem.index === 0 ? {{ $persentaseP }} :
                                (tooltipItem.index === 1 ? {{ $persentaseR }} : {{ $persentaseS }});
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
