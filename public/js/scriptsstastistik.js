document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('myChart').getContext('2d');
    const chartData = {
        labels: labels, // Use JavaScript variables
        datasets: [
            {
                label: 'Gugatan',
                data: gugatanData, // Use JavaScript variables
                fill: true,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1,
            },
            {
                label: 'Permohonan',
                data: permohonanData, // Use JavaScript variables
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

    new Chart(ctx, config);
});
