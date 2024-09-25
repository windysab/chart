document.addEventListener('DOMContentLoaded', function () {
    // Register Chart.js Data Labels plugin
    Chart.register(ChartDataLabels);

    // Function to format value to Rupiah format
    function formatRupiah(value) {
        return 'Rp. ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Function to highlight table row based on label
    function highlightRow(label) {
        document.querySelectorAll('.data-table tr').forEach(row => {
            row.classList.remove('highlight');
        });

        if (label) {
            let rowId;
            switch (label) {
                case 'Keperluan Sehari-hari':
                    rowId = 'row-keperluan';
                    break;
                case 'Langganan Daya dan Jasa':
                    rowId = 'row-langganan';
                    break;
                case 'Pemeliharaan Kantor':
                    rowId = 'row-pemeliharaan';
                    break;
                case 'Pembayaran Lainnya':
                    rowId = 'row-pembayaran';
                    break;
                case 'Bantuan Sewa Rumah Dinas Hakim':
                    rowId = 'row-bantuan';
                    break;
                case 'Perjalanan Dinas':
                    rowId = 'row-perjalanan';
                    break;
                default:
                    rowId = null;
            }

            if (rowId) {
                const row = document.getElementById(rowId);
                if (row) {
                    row.classList.add('highlight');
                } else {
                    console.log(`Row with ID ${rowId} not found`);
                }
            } else {
                console.log('Label is null or does not match any row');
            }
        } else {
            console.log('Label is null');
        }
    }

    // Initialize Gaji and Operasional charts
    var gajiCtx = document.getElementById('gajiChart').getContext('2d');
    var operasionalCtx = document.getElementById('operasionalChart').getContext('2d');

    var gajiChart = new Chart(gajiCtx, {
        type: 'doughnut',
        data: {
            labels: ['Realisasi', 'Sisa'],
            datasets: [{
                data: [totalGajiRealisasi, totalGajiPagu - totalGajiRealisasi],
                backgroundColor: ['#00ff00', '#ffa500'],
                hoverBackgroundColor: ['#66ff66', '#ffd966']
            }]
        },
        options: {
            plugins: {
                datalabels: {
                    formatter: function(value, context) {
                        var total = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                        if (total > 0) {
                            var percentage = (value / total * 100).toFixed(1);
                            return percentage + '%';
                        }
                        return '';
                    },
                    color: '#000',
                    font: {
                        size: 16,
                        weight: 'bold'
                    },
                    anchor: 'center',
                    align: 'center'
                },
            },
            tooltips: {
                callbacks: {
                    label: function(context) {
                        var label = context.label || '';
                        var value = context.raw || 0;
                        return label + ': ' + formatRupiah(value);
                    }
                }
            }
        }
    });

    var operasionalChart = new Chart(operasionalCtx, {
        type: 'doughnut',
        data: {
            labels: ['Realisasi', 'Sisa'],
            datasets: [{
                data: [totalOperasionalRealisasi, totalOperasionalPagu - totalOperasionalRealisasi],
                backgroundColor: ['#ff0000', '#ffa500'],
                hoverBackgroundColor: ['#ff6666', '#ffd966']
            }]
        },
        options: {
            plugins: {
                datalabels: {
                    formatter: function(value, context) {
                        var total = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                        if (total > 0) {
                            var percentage = (value / total * 100).toFixed(1);
                            return percentage + '%';
                        }
                        return '';
                    },
                    color: '#000',
                    font: {
                        size: 16,
                        weight: 'bold'
                    },
                    anchor: 'center',
                    align: 'center'
                },
            },
            tooltips: {
                callbacks: {
                    label: function(context) {
                        var label = context.label || '';
                        var value = context.raw || 0;
                        return label + ': ' + formatRupiah(value);
                    }
                }
            }
        }
    });

    // Initialize Main Chart
    const mainChartCtx = document.getElementById('mainChart').getContext('2d');
    const mainChart = new Chart(mainChartCtx, {
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
                    display: false
                }
            },
            onHover: function (evt, item) {
                if (item.length) {
                    const label = item[0].element.$context.raw.label;
                    highlightRow(label);
                } else {
                    highlightRow(null);
                }
            }
        }
    });
});
