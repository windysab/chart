document.addEventListener('DOMContentLoaded', function () {
    function highlightRow(label, tableId) {
        document.querySelectorAll(`#${tableId} tr`).forEach(row => {
            if (row.dataset.label === label) {
                row.classList.add('highlight');
            } else {
                row.classList.remove('highlight');
            }
        });
    }

    // Initialize myChart
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
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                datalabels: {
                    display: false
                }
            },
            onHover: function (evt, item) {
                if (item.length) {
                    const index = item[0].index;
                    const label = chartData1.labels[index];
                    highlightRow(label, 'details1');
                } else {
                    highlightRow(null, 'details1');
                }
            }
        }
    };
    const myChart = new Chart(ctx1, config1);

    // Initialize myChart2
    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const chartData2 = {
        labels: JSON.parse(document.getElementById('chartLabels2').textContent),
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
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                datalabels: {
                    display: false
                }
            },
            onHover: function (evt, item) {
                if (item.length) {
                    const index = item[0].index;
                    const label = chartData2.labels[index];
                    highlightRow(label, 'details2');
                } else {
                    highlightRow(null, 'details2');
                }
            }
        }
    };
    const myChart2 = new Chart(ctx2, config2);
});
