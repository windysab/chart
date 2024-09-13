<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chart.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
</head>
<body>
    <div class="container">
        <h1 class="title">DIPA 04</h1>
        <div class="chart-wrapper">
            <canvas id="myChart"></canvas>
        </div>
        <div id="chartLabels" style="display: none;">{!! json_encode($labels) !!}</div>
        <div id="paguData" style="display: none;">{!! json_encode($paguData) !!}</div>
        <div id="realisasiData" style="display: none;">{!! json_encode($realisasiData) !!}</div>
    </div>
    <script src="{{ asset('js/chart.js') }}"></script>
</body>
</html>
