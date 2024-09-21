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

    function removeDuplicates(array) {
        return array.filter((item, index) => array.indexOf(item) === index);
    }

    function removeDuplicateData(labels, data) {
        const uniqueLabels = removeDuplicates(labels);
        const uniqueData = uniqueLabels.map(label => {
            const index = labels.indexOf(label);
            return data[index];
        });
        return uniqueData;
    }

    // Initialize myChart
    const labels1 = JSON.parse(document.getElementById('chartLabels').textContent);
    const paguData1 = JSON.parse(document.getElementById('paguData').textContent);
    const realisasiData1 = JSON.parse(document.getElementById('realisasiData').textContent);

    const uniqueLabels1 = removeDuplicates(labels1);
    const uniquePaguData1 = removeDuplicateData(labels1, paguData1);
    const uniqueRealisasiData1 = removeDuplicateData(labels1, realisasiData1);

    const ctx1 = document.getElementById('myChart').getContext('2d');
    const chartData1 = {
        labels: uniqueLabels1,
        datasets: [
            {
                label: 'Pagu',
                data: uniquePaguData1,
                backgroundColor: '#f44336',
                borderColor: '#f44336',
                borderWidth: 1
            },
            {
                label: 'Realisasi',
                data: uniqueRealisasiData1,
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
    const labels2 = JSON.parse(document.getElementById('chartLabels2').textContent);
    const paguData2 = JSON.parse(document.getElementById('P').textContent);
    const realisasiData2 = JSON.parse(document.getElementById('R').textContent);

    const uniqueLabels2 = removeDuplicates(labels2);
    const uniquePaguData2 = removeDuplicateData(labels2, paguData2);
    const uniqueRealisasiData2 = removeDuplicateData(labels2, realisasiData2);

    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const chartData2 = {
        labels: uniqueLabels2,
        datasets: [
            {
                label: 'Pagu',
                data: uniquePaguData2,
                backgroundColor: '#ffcc00',
                borderColor: '#ffcc00',
                borderWidth: 1
            },
            {
                label: 'Realisasi',
                data: uniqueRealisasiData2,
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

    console.log('Chart Labels:', chartData1.labels);
    console.log('Chart Data Pagu:', chartData1.datasets[0].data);
    console.log('Chart Data Realisasi:', chartData1.datasets[1].data);
});
