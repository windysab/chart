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
            width: 80%;
            max-width: 800px;
        }
        .data-container {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
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
        const ctx = document.getElementById('myChart').getContext('2d');
        const chartData = {
            labels: {!! json_encode($labels) !!},
            datasets: [
                {
                    label: 'Gugatan',
                    data: {!! json_encode($gugatanData) !!},
                    fill: true,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1,
                },
                {
                    label: 'Permohonan',
                    data: {!! json_encode($permohonanData) !!},
                    fill: true,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    tension: 0.1,
                },
            ],
        };

        const config = {
            type: 'line',
            data: chartData,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Stastistik Perkara',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += context.parsed.y;
                                }
                                return label;
                            },
                            afterLabel: function(context) {
                                const index = context.dataIndex;
                                const datasetLabel = context.dataset.label;
                                const label = context.label;

                                
                                return '';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        };

        new Chart(ctx, config);
    </script>
</body>
</html>
