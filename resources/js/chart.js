// chart.js
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('myChart').getContext('2d');
    const chartData = {
        labels: JSON.parse(document.getElementById('chartLabels').textContent),
        datasets: [
            {
                label: 'Pagu',
                data: JSON.parse(document.getElementById('paguData').textContent),
                backgroundColor: '#4caf50',
                borderColor: '#4caf50',
                borderWidth: 1
            },
            {
                label: 'Realisasi',
                data: JSON.parse(document.getElementById('realisasiData').textContent),
                backgroundColor: '#f44336',
                borderColor: '#f44336',
                borderWidth: 1
            }
        ]
    };
    const config = {
        type: 'bar',
        data: chartData,
        options: {
            plugins: {
                datalabels: {
                    display: false
                }
            },
            onClick: function (evt, item) {
                if (item.length) {
                    const datasetIndex = item[0].datasetIndex;
                    const index = item[0].index;
                    const value = chartData.datasets[datasetIndex].data[index];
                    alert(`Value: ${value}`);
                }
            }
        }
    };
    const myChart = new Chart(ctx, config);
});
