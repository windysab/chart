Chart.register(ChartDataLabels);

var gajiCtx = document.getElementById('gajiChart').getContext('2d');
var operasionalCtx = document.getElementById('operasionalChart').getContext('2d');

function formatRupiah(value) {
    return 'Rp. ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

var gajiChart = new Chart(gajiCtx, {
    type: 'doughnut',
    data: {
        labels: ['Realisasi', 'Sisa', 'Pagu'],
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
                    return '';  // Tidak tampilkan jika tidak ada data
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
        tooltip: {
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
                    return '';  // Tidak tampilkan jika tidak ada data
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
        tooltip: {
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
