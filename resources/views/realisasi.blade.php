<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .progress-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .progress-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.3s ease;
            margin: 0 10px;
            position: relative;
        }

        .progress-container:hover {
            transform: scale(1.05);
        }

        .progress-bar {
            width: 400px;
            height: 40px;
            background-color: #0e8235;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            display: flex;
        }

        .progress-bar .realisasi {
            background-color: #326df5;
            width: var(--progress);
            transition: width 0.3s ease;
            position: relative;
        }

        .progress-value {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #fff;
            font-weight: bold;
        }

        .progress-value.realisasi {
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .progress-value.sisa {
            right: 10px;
        }

        .progress-labels {
            display: flex;
            justify-content: space-between;
            width: 400px;
            margin-top: 10px;
        }

        .progress-label {
            font-weight: bold;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>REALISASI ANGGARAN</h1>

        <div class="progress-wrapper">
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="realisasi" style="width: {{ $data }}%;">
                        <div class="progress-value realisasi">{{ $data }}%</div>
                    </div>
                    <div class="progress-value sisa">{{ 100 - $data }}%</div>
                </div>
                <div class="progress-labels">
                    <div class="progress-label" style="color: #326df5;">DIPA 01</div>
                    <div class="progress-label" style="color: #0e8235;">DIPA 04</div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
