<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Perkara</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #23ad5d, #81b9b7);
            color: #0a0404;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }
ç
        .container {
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        h1 {
            color: #444;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #0f0e0e;
            text-align: center;
            border-radius: 8px;
        }

        th {
            background: linear-gradient(135deg, #4646a3, #8e8e93);
            font-weight: bold;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #02961a;
        }

        tr:nth-child(odd) {
            background-color: #8b0a0a;
        }

        tr:hover {
            background-color: #d1e7dd;
            transition: background-color 0.3s ease;
        }

        .gugatan {
            background-color: #cc2121;
            color: #fff;
        }

        .permohonan {
            background-color: #2da02d;
            color: #fff;
        }

        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
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
            width: 300px;
            height: 30px;
            background-color: #1b025e;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }

        .progress-bar.gugatan::before {
            content: '';
            display: block;
            height: 100%;
            background-color: #b10716;
            width: var(--progress);
            transition: width 0.3s ease;
        }

        .progress-bar.permohonan::before {
            content: '';
            display: block;
            height: 100%;
            background-color: #2da02d;
            width: var(--progress);
            transition: width 0.3s ease;
        }

        .progress-value {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-weight: bold;
        }

        .radial-gauge-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 20px;
        }

        .radial-gauge-wrapper {
            border: 2px solid #aa0404;
            padding: 10px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: calc(50% - 20px);
            box-sizing: border-box;
        }

        .radial-gauge-images {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 10px;
            width: 100%;
        }

        .radial-gauge-images img {
            max-width: 100%;
            height: auto;
            box-sizing: border-box;
        }

        .circle-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
        }

        .circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #ad050e;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 30px;
            font-weight: bold;
            position: relative;
            left: -20px;
            transition: transform 0.3s ease;
        }

        .circle:hover {
            transform: scale(1.1);
        }

        .circle1 {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #4caf50;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 35px;
            font-weight: bold;
            position: relative;
            left: 20px;
            transition: transform 0.3s ease;
        }

        .circle1:hover {
            transform: scale(1.1);
        }

        .circle-value {
            display: inline-block;
        }

        .chart-container {
            border: 2px solid #444;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container">
        <h1>Statistik Perkara Bulan {{ current_month }}</h1>
        <table>
            <thead>
                <tr>
                    <th>PERKARA</th>
                    <th>SISA LAMA</th>
                    <th>MASUK</th>
                    <th>PUTUS</th>
                    <th>SISA BARU</th>
                </tr>
            </thead>
            <tbody>
                <tr class="gugatan">
                    <td>Gugatan</td>
                    <td>59</td>
                    <td>61</td>
                    <td>62</td>
                    <td>58</td>
                </tr>
                <tr class="permohonan">
                    <td>Permohonan</td>
                    <td>09</td>
                    <td>24</td>
                    <td>17</td>
                    <td>16</td>
                </tr>
            </tbody>
        </table>

        <div class="chart-container">
            <canvas id="myChart" width="200" height="100"></canvas>
        </div>

        <h2>E-COURT</h2>
        <div class="progress-wrapper">
            <div class="progress-container" data-value="{{ e_court_gugatan }}">
                <div class="progress-bar gugatan" style="--progress: {{ e_court_gugatan }}%;">
                    <span class="progress-value">{{ e_court_gugatan }}%</span>
                </div>
                <span>Gugatan</span>
            </div>
            <div class="progress-container" data-value="{{ e_court_permohonan }}">
                <div class="progress-bar permohonan" style="--progress: {{ e_court_permohonan }}%;">
                    <span class="progress-value">{{ e_court_permohonan }}%</span>
                </div>
                <span>Permohonan</span>
            </div>
        </div>

        <div class="radial-gauge-container">
            <div class="radial-gauge-wrapper">
                <h4>RASIO PENYELESIAN PERKARA</h4>
                <div class="radial-gauge-images">
                    <img src="{{ radial_chart_url_gugatan }}" alt="Radial Gauge Chart Gugatan">
                    <img src="{{ radial_chart_url_permohonan }}" alt="Radial Gauge Chart Permohonan">
                </div>
            </div>
            <div class="radial-gauge-wrapper">
                <h4>BHT</h4>
                <div class="circle-container">
                    <div class="circle">
                        <span class="circle-value">{{ bht_g }}</span>
                    </div>
                    <div class="circle1">
                        <span class="circle-value">{{ bht_p }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            &copy; 2024 Statistik Perkara. All rights reserved.
        </div>
    </div>
    <script>
        const config = {{ chart_config| tojson | safe }};
        config.options.plugins = {
            legend: {
                labels: {
                    font: {
                        weight: 'bold'
                    }
                }
            },
            tooltip: {
                titleFont: {
                    weight: 'bold'
                },
                bodyFont: {
                    weight: 'bold'
                }
            }
        };
        config.options.scales = {
            x: {
                ticks: {
                    font: {
                        weight: 'bold'
                    }
                }
            },
            y: {
                ticks: {
                    font: {
                        weight: 'bold'
                    }
                }
            }
        };
        config.options.animation = {
            duration: 1000,
            easing: 'easeInOutBounce'
        };
        const ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, config);
    </script>
    <script>
        document.querySelectorAll('.progress-container').forEach(container => {
            container.addEventListener('mouseover', function () {
                const value = this.getAttribute('data-value');
                const valueElement = this.querySelector('.progress-value');
                valueElement.textContent = `${value}%`;
            });
        });
    </script>

</body>

</html>
