<!DOCTYPE html>
<html lang="en">
<head>
    <title>Progress Charts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
        }

        .progress-bar {
            line-height: 30px;
            font-size: 14px;
        }

        .progress-bar-success {
            background-color: #5cb85c;
        }

        .progress-bar-info {
            background-color: #5bc0de;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Combined Progress Bar With Labels</h2>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $progressGaji }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $progressGaji }}%">
                Gaji: {{ $progressGaji }}%
            </div>
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $progressOperasional }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $progressOperasional }}%">
                Operasional: {{ $progressOperasional }}%
            </div>
        </div>
        <h2>Gaji Progress Chart</h2>
        <img src="{{ $chartUrlGaji }}" alt="Gaji Progress Chart">
        <h2>Operasional Progress Chart</h2>
        <img src="{{ $chartUrlOperasional }}" alt="Operasional Progress Chart">
    </div>

</body>
</html>
