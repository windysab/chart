document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Pagu', 'Realisasi', 'Sisa Pagu'],
            datasets: [{
                label: 'Manajemen dan Operasional',
                data: [pagu, realisasi, sisa],
                backgroundColor: ['#ff0000', '#00ff00', '#ffa500'],
                borderColor: '#326df5',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            animation: {
                duration: 2000,
                easing: 'easeInOutBounce'
            },
            tooltips: {
                backgroundColor: 'rgba(0, 0, 0, 0.7)',
                titleFontFamily: 'Roboto',
                titleFontSize: 16,
                titleFontStyle: 'bold',
                titleFontColor: '#fff',
                bodyFontFamily: 'Roboto',
                bodyFontSize: 14,
                bodyFontColor: '#fff',
                bodySpacing: 10,
                xPadding: 10,
                yPadding: 10,
                cornerRadius: 4,
                callbacks: {
                    label: function(tooltipItem, data) {
                        const value = data.datasets[0].data[tooltipItem.index];
                        const percentage = tooltipItem.index === 0 ? persentasePagu :
                            (tooltipItem.index === 1 ? persentaseRealisasi : persentaseSisa);
                        return `Rp. ${value.toLocaleString()} (${percentage}%)`;
                    }
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Pagu', 'Realisasi', 'Sisa Pagu'],
            datasets: [{
                label: 'Penegakan dan Pelayanan Hukum',
                data: [P, R, S],
                backgroundColor: ['#ff0000', '#00ff00', '#ffa500'],
                borderColor: '#326df5',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            animation: {
                duration: 2000,
                easing: 'easeInOutBounce'
            },
            tooltips: {
                backgroundColor: 'rgba(0, 0, 0, 0.7)',
                titleFontFamily: 'Roboto',
                titleFontSize: 16,
                titleFontStyle: 'bold',
                titleFontColor: '#fff',
                bodyFontFamily: 'Roboto',
                bodyFontSize: 14,
                bodyFontColor: '#fff',
                bodySpacing: 10,
                xPadding: 10,
                yPadding: 10,
                cornerRadius: 4,
                callbacks: {
                    label: function(tooltipItem, data) {
                        const value = data.datasets[0].data[tooltipItem.index];
                        const percentage = tooltipItem.index === 0 ? persentaseP :
                            (tooltipItem.index === 1 ? persentaseR : persentaseS);
                        return `Rp. ${value.toLocaleString()} (${percentage}%)`;
                    }
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
});
