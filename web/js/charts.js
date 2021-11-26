function displayDonut($element, labels, data) {
    var graph = new Chart($element, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: true,
            },
            cutoutPercentage: 80,
        },
    });
    $element.data('graph', graph)
}

function updateDonut($element, labels, data) {
    var graph = $element.data('graph');
    graph.data.labels = labels;
    graph.data.datasets[0].data=data;
    graph.update();
}