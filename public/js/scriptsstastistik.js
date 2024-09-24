document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('myChart').getContext('2d');
    const chartData = {
        labels: labels, // Gunakan variabel JavaScript
        datasets: [
            {
                label: 'Gugatan',
                data: gugatanData, // Gunakan variabel JavaScript
                fill: true,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1,
            },
            {
                label: 'Permohonan',
                data: permohonanData, // Gunakan variabel JavaScript
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

    const myChart = new Chart(ctx, config);

    // Tambahkan event listener untuk hover
    document.getElementById('myChart').addEventListener('mousemove', function(event) {
        const points = myChart.getElementsAtEventForMode(event, 'nearest', { intersect: true }, false);
        if (points.length) {
            const firstPoint = points[0];
            const datasetIndex = firstPoint.datasetIndex;
            const dataIndex = firstPoint.index;

            // Tentukan ID sel yang akan disorot
            let cellId;
            switch (dataIndex) {
                case 0:
                    cellId = `sisa-lama-${datasetIndex}`;
                    break;
                case 1:
                    cellId = `perkara-masuk-${datasetIndex}`;
                    break;
                case 2:
                    cellId = `perkara-putus-${datasetIndex}`;
                    break;
                case 3:
                    cellId = `sisa-baru-${datasetIndex}`;
                    break;
                default:
                    cellId = null;
            }

            // Hapus sorotan dari semua sel
            document.querySelectorAll('td, th').forEach(cell => cell.classList.remove('highlight'));

            // Sorot sel yang sesuai
            if (cellId) {
                const cell = document.getElementById(cellId);
                if (cell) {
                    cell.classList.add('highlight');
                }
            }
        } else {
            // Hapus sorotan jika tidak hover pada titik
            document.querySelectorAll('td, th').forEach(cell => cell.classList.remove('highlight'));
        }
    });
});
