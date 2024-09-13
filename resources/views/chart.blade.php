<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #3b82f6, #9333ea);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 2rem;
            max-width: 600px;
            width: 100%;
            border: 4px solid #d1d5db;
        }
        .title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #1f2937;
        }
        .chart-wrapper {
            display: flex;
            justify-content: center;
        }
        .chart-container {
            border: 4px solid #e5e7eb;
            padding: 1rem;
            border-radius: 10px;
        }
        .chart {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Chart</h1>
        <div class="chart-wrapper">
            <div class="chart-container">
                <img src="{{ $chartUrl }}" alt="Chart" class="chart">
            </div>
        </div>
    </div>
</body>
</html>
