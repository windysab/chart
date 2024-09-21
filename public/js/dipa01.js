document.addEventListener('DOMContentLoaded', function () {
    // Register Chart.js Data Labels plugin
    Chart.register(ChartDataLabels);

    // Function to format value to Rupiah format
    function formatRupiah(value) {
        return 'Rp. ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Function to remove duplicates from array
    function removeDuplicates(array) {
        return array.filter((item, index) => array.indexOf(item) === index);
    }

    // Function to remove duplicate data based on labels
    function removeDuplicateData(labels, data) {
        const uniqueLabels = removeDuplicates(labels);
        const uniqueData = uniqueLabels.map(label => {
            const index = labels.indexOf(label);
            return data[index];
        });
        return uniqueData;
    }

    // Function to highlight table row based on label
    function highlightRow(label, tableId) {
        document.querySelectorAll(`#${tableId} tr`).forEach(row => {
            if (row.dataset.label === label) {
                row.classList.add('highlight');
            } else {
                row.classList.remove('highlight');
            }
        });
    }

    // Function to highlight table row in green based on label
    function highlightGreenRow(label) {
        document.querySelectorAll('.data-table tr').forEach(row => {
            row.classList.remove('highlight-green');
        });

        if (label === 'Keperluan Sehari-hari') {
            document.getElementById('row-keperluan').classList.add('highlight-green');
        } else if (label === 'Langganan Daya dan Jasa') {
            document.getElementById('row-langganan').classList.add('highlight-green');
        } else if (label === 'Pemeliharaan Kantor') {
            document.getElementById('row-pemeliharaan').classList.add('highlight-green');
        } else if (label === 'Pembayaran Lainnya') {
            document.getElementById('row-pembayaran').classList.add('highlight-green');
        } else if (label === 'Bantuan Sewa Rumah Dinas Hakim') {
            document.getElementById('row-bantuan').classList.add('highlight-green');
        } else if (label === 'Perjalanan Dinas') {
            document.getElementById('row-perjalanan').classList.add('highlight-green');
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
                    var index = item[0].index;
                    var label = mainChart.data.labels[index];
                    highlightGreenRow(label);
                } else {
                    highlightGreenRow(null);
                }
            }
        }
    });
});
