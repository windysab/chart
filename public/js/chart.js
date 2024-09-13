// chart.js
document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi myChart
    const ctx1 = document.getElementById('myChart').getContext('2d');
    const chartData1 = {
        labels: JSON.parse(document.getElementById('chartLabels').textContent),
        datasets: [
            {
                label: 'Pagu',
                data: JSON.parse(document.getElementById('paguData').textContent),
                backgroundColor: '#f44336',
                borderColor: '#f44336',
                borderWidth: 1
            },
            {
                label: 'Realisasi',
                data: JSON.parse(document.getElementById('realisasiData').textContent),
                backgroundColor: '#20B2AA',
                borderColor: '#20B2AA',
                borderWidth: 1
            }
        ]
    };
    const config1 = {
        type: 'bar',
        data: chartData1,
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
                    const value = chartData1.datasets[datasetIndex].data[index];
                    alert(`myChart Value: ${value}`);
                }
            }
        }
    };
    const myChart = new Chart(ctx1, config1);

    // Inisialisasi myChart2
    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const chartData2 = {
        labels: JSON.parse(document.getElementById('chartLabels').textContent),
        datasets: [
            {
                label: 'Pagu',
                data: JSON.parse(document.getElementById('P').textContent),
                backgroundColor: '#ffcc00',
                borderColor: '#ffcc00',
                borderWidth: 1
            },
            {
                label: 'Realisasi',
                data: JSON.parse(document.getElementById('R').textContent),
                backgroundColor: '#3366cc',
                borderColor: '#3366cc',
                borderWidth: 1
            }
        ]
    };
    const config2 = {
        type: 'bar',
        data: chartData2,
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
                    const value = chartData2.datasets[datasetIndex].data[index];
                    alert(`myChart2 Value: ${value}`);
                }
            }
        }
    };
    const myChart2 = new Chart(ctx2, config2);
});
