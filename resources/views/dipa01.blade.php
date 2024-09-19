<!DOCTYPE html>
<html lang="en">
<head>
    <title>Progress Charts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            height: 100vh;
            color: #333;
        }

        .container {
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border: 2px solid #ddd;
            width: 90%;
            max-width: 800px;
        }

        .progress {
            height: 30px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            position: relative;
        }

        .progress-bar {
            line-height: 30px;
            font-size: 14px;
            transition: width 1s ease-in-out;
        }

        .progress-bar-success {
            background-color: #5cb85c;
        }

        .progress-bar-info {
            background-color: #5bc0de;
        }

        .card {
            margin-top: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            width: 100%;
            border: 1px solid #ddd;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #3b82f6;
            text-align: center;
        }

        .card-info {
            font-size: 14px;
            margin-top: 10px;
            color: #9333ea;
        }

        .card-image {
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            height: auto;
        }

        .progress-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .progress-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 800px;
        }

        .charts-row {
            display: flex;
            justify-content: space-around;
            width: 100%;
        }

        .half-chart {
            flex: 1;
            text-align: center;
            padding: 10px;
        }

        .half-chart img {
            width: 90%;
            border-radius: 8px;
        }

    </style>
</head>
<body>

    <div class="container">
        <h2>Combined Progress Bar With Labels</h2>
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
                                <img src="{{ $chartUrlGaji }}" alt="Gaji Progress Chart" class="card-image">
                                <div class="card-info">Pagu: {{ number_format($totalGajiPagu, 0, ',', '.') }} | Realisasi: {{ number_format($totalGajiRealisasi, 0, ',', '.') }}</div>
                            </div>
                            <div class="half-chart">
                                <img src="{{ $chartUrlOperasional }}" alt="Operasional Progress Chart" class="card-image">
                                <div class="card-info">Pagu: {{ number_format($totalOperasionalPagu, 0, ',', '.') }} | Realisasi: {{ number_format($totalOperasionalRealisasi, 0, ',', '.') }}</div>
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
    </script>

</body>
</html>
