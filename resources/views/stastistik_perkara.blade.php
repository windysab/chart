<!DOCTYPE html>
<html>
<head>
    <title>Stastistik Perkara</title>
    <link rel="stylesheet" href="{{ asset('css/stylesstastistik.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="chart-container">
        <h1>Stastistik Perkara</h1>
        <canvas id="myChart"></canvas>
    </div>
    <div class="data-container">
        <h2>Data Tambahan</h2>
        <table>
            <tr>
                <th>Nama Perkara</th>
                <th>Sisa Lama</th>
                <th>Perkara Masuk</th>
                <th>Perkara Putus</th>
                <th>Sisa Baru</th>
            </tr>
            @foreach($sisa_lama as $index => $value)
            <tr>
                <td>{{ $perkara[$index] }}</td>
                <td>{{ $value }}</td>
                <td>{{ $perkara_masuk[$index] }}</td>
                <td>{{ $perkara_putus[$index] }}</td>
                <td>{{ $sisa_baru[$index] }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <script>
        // Embed PHP variables into JavaScript context
        var labels = @json($labels);
        var gugatanData = @json($gugatanData);
        var permohonanData = @json($permohonanData);
    </script>
    <script src="{{ asset('js/scriptsstastistik.js') }}"></script>
</body>
</html>
