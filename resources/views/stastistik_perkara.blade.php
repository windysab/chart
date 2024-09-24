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
                <th class="sisa-lama">Sisa Lama</th>
                <th class="perkara-masuk">Perkara Masuk</th>
                <th class="perkara-putus">Perkara Putus</th>
                <th class="sisa-baru">Sisa Baru</th>
            </tr>
            @foreach($sisa_lama as $index => $value)
            <tr>
                <td>{{ $perkara[$index] }}</td>
                <td id="sisa-lama-{{ $index }}" class="sisa-lama">{{ $value }}</td>
                <td id="perkara-masuk-{{ $index }}" class="perkara-masuk">{{ $perkara_masuk[$index] }}</td>
                <td id="perkara-putus-{{ $index }}" class="perkara-putus">{{ $perkara_putus[$index] }}</td>
                <td id="sisa-baru-{{ $index }}" class="sisa-baru">{{ $sisa_baru[$index] }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <script>
        // Masukkan variabel PHP ke dalam konteks JavaScript
        var labels = @json($labels);
        var gugatanData = @json($gugatanData);
        var permohonanData = @json($permohonanData);
    </script>
    <script src="{{ asset('js/scriptsstastistik.js') }}"></script>
</body>
</html>
