<!DOCTYPE html>
<html>
<head>
    <title>Stastistik Perkara</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        h1 {
            color: #333;
        }
        .chart-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        img {
            max-width: 100%;
            height: auto;
        }
        .data-container {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .data-container table {
            width: 100%;
            border-collapse: collapse;
        }
        .data-container th, .data-container td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .data-container th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="chart-container">
        <h1>Stastistik Perkara</h1>
        <img src="{{ $chartUrl }}" alt="Stastistik Perkara">
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
                <td>{{ $labels[$index] }}</td>
                <td>{{ $value }}</td>
                <td>{{ $perkara_masuk[$index] }}</td>
                <td>{{ $perkara_putus[$index] }}</td>
                <td>{{ $sisa_baru[$index] }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
