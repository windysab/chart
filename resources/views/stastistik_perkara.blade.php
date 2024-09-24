<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Perkara</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/stylesstastistik.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Statistik Perkara</h1>
        <div class="chart-container">
            <canvas id="myChart"></canvas>
        </div>
        <div class="data-container">
            <table>
                <thead>
                    <tr>
                        <th>Nama Perkara</th>
                        <th class="sisa-lama">Sisa Lama</th>
                        <th class="perkara-masuk">Perkara Masuk</th>
                        <th class="perkara-putus">Perkara Putus</th>
                        <th class="sisa-baru">Sisa Baru</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sisa_lama as $index => $value)
                    <tr>
                        <td>{{ $perkara[$index] }}</td>
                        <td id="sisa-lama-{{ $index }}" class="sisa-lama">{{ $value }}</td>
                        <td id="perkara-masuk-{{ $index }}" class="perkara-masuk">{{ $perkara_masuk[$index] }}</td>
                        <td id="perkara-putus-{{ $index }}" class="perkara-putus">{{ $perkara_putus[$index] }}</td>
                        <td id="sisa-baru-{{ $index }}" class="sisa-baru">{{ $sisa_baru[$index] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <footer>
        &copy; 2023 Statistik Perkara. All rights reserved.
    </footer>
    <script>
        // Masukkan variabel PHP ke dalam konteks JavaScript
        var labels = @json($labels);
        var gugatanData = @json($gugatanData);
        var permohonanData = @json($permohonanData);
    </script>
    <script src="{{ asset('js/scriptsstastistik.js') }}"></script>
</body>
</html>
