<!DOCTYPE html>
<html>
<head>
    <title>Line Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Line Chart for {{ $currentMonth }}</h1>
    <canvas id="lineChart"></canvas>
    <script>
        var ctx = document.getElementById('lineChart').getContext('2d');
        var chart = new Chart(ctx, {!! json_encode($chartConfig) !!});
    </script>

    <h2>Progress Bar for Gugatan</h2>
    <img src="{{ $progressBarUrlGugatan }}" alt="Progress Bar Gugatan">

    <h2>Progress Bar for Permohonan</h2>
    <img src="{{ $progressBarUrlPermohonan }}" alt="Progress Bar Permohonan">

    <h2>Radial Gauge for Gugatan</h2>
    <img src="{{ $radialChartUrlGugatan }}" alt="Radial Gauge Gugatan">

    <h2>Radial Gauge for Permohonan</h2>
    <img src="{{ $radialChartUrlPermohonan }}" alt="Radial Gauge Permohonan">

    <p>E-Court Gugatan: {{ $eCourtGugatan }}%</p>
    <p>E-Court Permohonan: {{ $eCourtPermohonan }}%</p>
    <p>BHT Gugatan: {{ $bhtG }}</p>
    <p>BHT Permohonan: {{ $bhtP }}</p>
</body>
</html>
