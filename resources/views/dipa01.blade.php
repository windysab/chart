<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dipa 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/sytlesdipa01.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
</head>
<body>
    <div class="container">
        <h2>DIPA 01</h2>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $progressGaji }}"
                aria-valuemin="0" aria-valuemax="100" style="width:{{ $progressGaji }}%" data-bs-toggle="tooltip"
                data-bs-placement="top" title="Gaji dan Tunjangan: {{ $progressGaji }}%">
                Gaji: {{ $progressGaji }}%
            </div>
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $progressOperasional }}"
                aria-valuemin="0" aria-valuemax="100" style="width:{{ $progressOperasional }}%" data-bs-toggle="tooltip"
                data-bs-placement="top" title="Operasional: {{ $progressOperasional }}%">
                Operasional: {{ $progressOperasional }}%
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-title"><i class="fas fa-chart-line"></i> Gaji dan Tunjangan</div>
                    <div class="chart-container">
                        <canvas id="gajiChart"></canvas>
                    </div>
                    <div class="pagu-info">Pagu: Rp. {{ number_format($totalGajiPagu, 0, ',', '.') }}</div>
                    <div class="pagu-info">Realisasi: Rp. {{ number_format($totalGajiRealisasi, 0, ',', '.') }}</div>
                    <div class="pagu-info">Sisa: Rp. {{ number_format($totalGajiPagu - $totalGajiRealisasi, 0, ',', '.') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-title"><i class="fas fa-chart-line"></i> Operasional</div>
                    <div class="chart-container">
                        <canvas id="operasionalChart"></canvas>
                    </div>
                    <div class="pagu-info">Pagu: Rp. {{ number_format($totalOperasionalPagu, 0, ',', '.') }}</div>
                    <div class="pagu-info">Realisasi: Rp. {{ number_format($totalOperasionalRealisasi, 0, ',', '.') }}</div>
                    <div class="pagu-info">Sisa: Rp. {{ number_format($totalOperasionalPagu - $totalOperasionalRealisasi, 0, ',', '.') }}</div>
                </div>
            </div>
        </div>

        <div class="chart-container mt-4">
            <canvas id="mainChart"></canvas>
        </div>

        <div class="data-table mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Label</th>
                        <th>Pagu</th>
                        <th>Realisasi</th>
                        <th>Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="row-keperluan">
                        <td>Keperluan Sehari-hari</td>
                        <td class="pagu-cell">Rp. {{ number_format($totalKeperluanSehariHariPagu, 0, ',', '.') }}</td>
                        <td class="realisasi-cell">Rp. {{ number_format($totalKeperluanSehariHariRealisasi, 0, ',', '.') }}</td>
                        <td class="persentase-cell">{{ number_format(($totalKeperluanSehariHariRealisasi / $totalKeperluanSehariHariPagu) * 100, 2) }}%</td>
                    </tr>
                    <tr id="row-langganan">
                        <td>Langganan Daya dan Jasa</td>
                        <td class="pagu-cell">Rp. {{ number_format($totalLanggananDayaDanJasaPagu, 0, ',', '.') }}</td>
                        <td class="realisasi-cell">Rp. {{ number_format($totalLanggananDayaDanJasaRealisasi, 0, ',', '.') }}</td>
                        <td class="persentase-cell">{{ number_format(($totalLanggananDayaDanJasaRealisasi / $totalLanggananDayaDanJasaPagu) * 100, 2) }}%</td>
                    </tr>
                    <tr id="row-pemeliharaan">
                        <td>Pemeliharaan Kantor</td>
                        <td class="pagu-cell">Rp. {{ number_format($totalPemeliharaanKantorPagu, 0, ',', '.') }}</td>
                        <td class="realisasi-cell">Rp. {{ number_format($totalPemeliharaanKantorRealisasi, 0, ',', '.') }}</td>
                        <td class="persentase-cell">{{ number_format(($totalPemeliharaanKantorRealisasi / $totalPemeliharaanKantorPagu) * 100, 2) }}%</td>
                    </tr>
                    <tr id="row-pembayaran">
                        <td>Pembayaran Lainnya</td>
                        <td class="pagu-cell">Rp. {{ number_format($totalPembayaranLainnyaPagu, 0, ',', '.') }}</td>
                        <td class="realisasi-cell">Rp. {{ number_format($totalPembayaranLainnyaRealisasi, 0, ',', '.') }}</td>
                        <td class="persentase-cell">{{ number_format(($totalPembayaranLainnyaRealisasi / $totalPembayaranLainnyaPagu) * 100, 2) }}%</td>
                    </tr>
                    <tr id="row-bantuan">
                        <td>Bantuan Sewa Rumah Dinas Hakim</td>
                        <td class="pagu-cell">Rp. {{ number_format($totalBantuanSewaRumahDinasHakimPagu, 0, ',', '.') }}</td>
                        <td class="realisasi-cell">Rp. {{ number_format($totalBantuanSewaRumahDinasHakimRealisasi, 0, ',', '.') }}</td>
                        <td class="persentase-cell">{{ number_format(($totalBantuanSewaRumahDinasHakimRealisasi / $totalBantuanSewaRumahDinasHakimPagu) * 100, 2) }}%</td>
                    </tr>
                    <tr id="row-perjalanan">
                        <td>Perjalanan Dinas</td>
                        <td class="pagu-cell">Rp. {{ number_format($totalPerjalananDinasPagu, 0, ',', '.') }}</td>
                        <td class="realisasi-cell">Rp. {{ number_format($totalPerjalananDinasRealisasi, 0, ',', '.') }}</td>
                        <td class="persentase-cell">{{ number_format(($totalPerjalananDinasRealisasi / $totalPerjalananDinasPagu) * 100, 2) }}%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        var totalGajiRealisasi = {{ $totalGajiRealisasi }};
        var totalGajiPagu = {{ $totalGajiPagu }};
        var totalOperasionalRealisasi = {{ $totalOperasionalRealisasi }};
        var totalOperasionalPagu = {{ $totalOperasionalPagu }};
        var totalKeperluanSehariHariPagu = {{ $totalKeperluanSehariHariPagu }};
        var totalKeperluanSehariHariRealisasi = {{ $totalKeperluanSehariHariRealisasi }};
        var totalLanggananDayaDanJasaPagu = {{ $totalLanggananDayaDanJasaPagu }};
        var totalLanggananDayaDanJasaRealisasi = {{ $totalLanggananDayaDanJasaRealisasi }};
        var totalPemeliharaanKantorPagu = {{ $totalPemeliharaanKantorPagu }};
        var totalPemeliharaanKantorRealisasi = {{ $totalPemeliharaanKantorRealisasi }};
        var totalPembayaranLainnyaPagu = {{ $totalPembayaranLainnyaPagu }};
        var totalPembayaranLainnyaRealisasi = {{ $totalPembayaranLainnyaRealisasi }};
        var totalBantuanSewaRumahDinasHakimPagu = {{ $totalBantuanSewaRumahDinasHakimPagu }};
        var totalBantuanSewaRumahDinasHakimRealisasi = {{ $totalBantuanSewaRumahDinasHakimRealisasi }};
        var totalPerjalananDinasPagu = {{ $totalPerjalananDinasPagu }};
        var totalPerjalananDinasRealisasi = {{ $totalPerjalananDinasRealisasi }};
    </script>
    <script src="{{ asset('js/dipa01.js') }}"></script>
</body>
</html>
