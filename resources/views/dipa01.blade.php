<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dipa 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/sytlesdipa01.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <style>
        .pagu-info {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>DIPA 01</h2>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $progressGaji }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $progressGaji }}%" data-bs-toggle="tooltip" data-bs-placement="top" title="Gaji dan Tunjangan: {{ $progressGaji }}%">
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
                        <div class="card-title"><i class="fas fa-chart-line"></i> Gaji dan Tunjangan & Operasional</div>
                        <div class="charts-row">
                            <div class="half-chart">
                                <canvas id="gajiChart"></canvas>
                                <div class="pagu-info">Pagu: Rp. {{ number_format($totalGajiPagu, 0, ',', '.') }}</div>
                                <div class="pagu-info">Realisasi: Rp. {{ number_format($totalGajiRealisasi, 0, ',', '.') }}</div>
                                <div class="pagu-info">Sisa: Rp. {{ number_format($totalGajiPagu - $totalGajiRealisasi, 0, ',', '.') }}</div>
                            </div>
                            <div class="half-chart">
                                <canvas id="operasionalChart"></canvas>
                                <div class="pagu-info">Pagu: Rp. {{ number_format($totalOperasionalPagu, 0, ',', '.') }}</div>
                                <div class="pagu-info">Realisasi: Rp. {{ number_format($totalOperasionalRealisasi, 0, ',', '.') }}</div>
                                <div class="pagu-info">Sisa: Rp. {{ number_format($totalOperasionalPagu - $totalOperasionalRealisasi, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Pass PHP variables to JavaScript
        var totalGajiRealisasi = {{ $totalGajiRealisasi }};
        var totalGajiPagu = {{ $totalGajiPagu }};
        var totalOperasionalRealisasi = {{ $totalOperasionalRealisasi }};
        var totalOperasionalPagu = {{ $totalOperasionalPagu }};
    </script>
    <script src="{{ asset('js/dipa01.js') }}"></script>
</body>
</html>
