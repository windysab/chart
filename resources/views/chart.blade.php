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

        <!-- Rincian Label, Pagu, Realisasi, dan Persentase -->
        <div class="details">
            <h2>Rincian Data</h2>
            <table>
                <thead>
                    <tr>
                        <th style="background-color: #ff9999;">Label</th>
                        <th style="background-color: #99ccff;">Pagu</th>
                        <th style="background-color: #99ff99;">Realisasi</th>
                        <th style="background-color: #ffcc99;">Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($chartData as $index => $data)
                        <tr class="row-color-{{ $index % 5 }}">
                            <td>{{ $data->label }}</td>
                            <td>{{ 'Rp. ' . number_format($data->pagu, 0, ',', '.') }}</td>
                            <td>{{ 'Rp. ' . number_format($data->realisasi, 0, ',', '.') }}</td>
                            <td>
                                @if($data->pagu == 0)
                                    0%
                                @else
                                    {{ number_format(($data->realisasi / $data->pagu) * 100, 2) }}%
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Chart Baru di Bawah Tabel -->
        <div class="chart-wrapper">
            <canvas id="myChart2"></canvas>
        </div>
        <div id="chartLabels" style="display: none;">{!! json_encode($labels) !!}</div>
        <div id="paguData" style="display: none;">{!! json_encode($paguData) !!}</div>
        <div id="realisasiData" style="display: none;">{!! json_encode($realisasiData) !!}</div>
    </div>
    <script src="{{ asset('js/chart.js') }}"></script>
</body>
</html>
