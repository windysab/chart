// Mendaftarkan plugin Chart.js Data Labels
Chart.register(ChartDataLabels);

// Fungsi untuk memformat nilai menjadi format Rupiah
function formatRupiah(value) {
    return 'Rp. ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Mengambil elemen canvas untuk Gaji dan Operasional
var gajiCtx = document.getElementById('gajiChart').getContext('2d');
var operasionalCtx = document.getElementById('operasionalChart').getContext('2d');

// Membuat chart doughnut untuk Gaji dan Tunjangan
var gajiChart = new Chart(gajiCtx, {
    type: 'doughnut',
    data: {
        labels: ['Realisasi', 'Sisa'],  // Menampilkan hanya Realisasi dan Sisa
        datasets: [{
            data: [totalGajiRealisasi, totalGajiPagu - totalGajiRealisasi],  // Data Realisasi dan Sisa
            backgroundColor: ['#00ff00', '#ffa500'],  // Warna chart
            hoverBackgroundColor: ['#66ff66', '#ffd966']  // Warna saat hover
        }]
    },
    options: {
        plugins: {
            // Menampilkan label persentase di tengah chart
            datalabels: {
                formatter: function(value, context) {
                    var total = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);  // Hitung total
                    if (total > 0) {
                        var percentage = (value / total * 100).toFixed(1);  // Hitung persentase
                        return percentage + '%';  // Kembalikan nilai persentase
                    }
                    return '';  // Jika total 0, tidak tampilkan label
                },
                color: '#000',  // Warna font label
                font: {
                    size: 16,  // Ukuran font
                    weight: 'bold'  // Ketebalan font
                },
                anchor: 'center',
                align: 'center'
            },
        },
        // Menampilkan tooltip yang terformat dengan Rupiah
        tooltip: {
            callbacks: {
                label: function(context) {
                    var label = context.label || '';  // Mendapatkan label (Realisasi atau Sisa)
                    var value = context.raw || 0;  // Nilai data
                    return label + ': ' + formatRupiah(value);  // Format nilai dengan Rupiah
                }
            }
        }
    }
});

// Membuat chart doughnut untuk Operasional
var operasionalChart = new Chart(operasionalCtx, {
    type: 'doughnut',
    data: {
        labels: ['Realisasi', 'Sisa'],  // Menampilkan hanya Real dan Sisa
        datasets: [{
            data: [totalOperasionalRealisasi, totalOperasionalPagu - totalOperasionalRealisasi],  // Data Realisasi dan Sisa
            backgroundColor: ['#ff0000', '#ffa500'],  // Warna chart
            hoverBackgroundColor: ['#ff6666', '#ffd966']  // Warna saat hover
        }]
    },
    options: {
        plugins: {
            // Menampilkan label persentase di tengah chart
            datalabels: {
                formatter: function(value, context) {
                    var total = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);  // Hitung total
                    if (total > 0) {
                        var percentage = (value / total * 100).toFixed(1);  // Hitung persentase
                        return percentage + '%';  // Kembalikan nilai persentase
                    }
                    return '';  // Jika total 0, tidak tampilkan label
                },
                color: '#000',  // Warna font label
                font: {
                    size: 16,  // Ukuran font
                    weight: 'bold'  // Ketebalan font
                },
                anchor: 'center',
                align: 'center'
            },
        },
        // Menampilkan tooltip yang terformat dengan Rupiah
        tooltip: {
            callbacks: {
                label: function(context) {
                    var label = context.label || '';  // Mendapatkan label (Realisasi atau Sisa)
                    var value = context.raw || 0;  // Nilai data
                    return label + ': ' + formatRupiah(value);  // Format nilai dengan Rupiah
                }
            }
        }
    }
});

// Membuat chart bar untuk Main Chart
var mainChartCtx = document.getElementById('mainChart').getContext('2d');
var mainChart = new Chart(mainChartCtx, {
    type: 'bar',
    data: {
        labels: [
            'Keperluan Sehari-hari',
            'Langganan Daya dan Jasa',
            'Pemeliharaan Kantor',
            'Pembayaran Lainnya',
            'Bantuan Sewa Rumah Dinas Hakim',
            'Perjalanan Dinas'
        ],
        datasets: [
            {
                label: 'Pagu',
                data: [
                    totalKeperluanSehariHariPagu,
                    totalLanggananDayaDanJasaPagu,
                    totalPemeliharaanKantorPagu,
                    totalPembayaranLainnyaPagu,
                    totalBantuanSewaRumahDinasHakimPagu,
                    totalPerjalananDinasPagu
                ],
                backgroundColor: 'blue',
            },
            {
                label: 'Realisasi',
                data: [
                    totalKeperluanSehariHariRealisasi,
                    totalLanggananDayaDanJasaRealisasi,
                    totalPemeliharaanKantorRealisasi,
                    totalPembayaranLainnyaRealisasi,
                    totalBantuanSewaRumahDinasHakimRealisasi,
                    totalPerjalananDinasRealisasi
                ],
                backgroundColor: 'red',
            }
        ]
    },
    options: {
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(context) {
                        var label = context.dataset.label || '';
                        var value = context.raw || 0;
                        return label + ': ' + formatRupiah(value);
                    }
                }
            },
            datalabels: {
                display: false  // Menyembunyikan nilai di dalam chart
            }
        },
        onHover: function(event, chartElement) {
            // Menghapus highlight dari semua baris
            document.querySelectorAll('.data-table tr').forEach(function(row) {
                row.classList.remove('highlight');
            });

            // Menambahkan highlight pada baris yang sesuai
            if (chartElement.length) {
                var index = chartElement[0].index;
                var label = mainChart.data.labels[index];
                if (label === 'Langganan Daya dan Jasa') {
                    document.getElementById('row-langganan').classList.add('highlight');
                }
            }
        }
    }
});
