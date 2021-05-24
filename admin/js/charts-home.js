$(document).ready(function () {

    'use strict';

    Chart.defaults.global.defaultFontColor = '#75787c';


    // ------------------------------------------------------- //
    // Line Chart
    // ------------------------------------------------------ //
    var legendState = true;
    if ($(window).outerWidth() < 576) {
        legendState = false;
    }
function getLargest(a){
        var list = {
            0: "Janeiro",
            1: "Fevereiro",
            2: "Março",
            3: "Abril",
            4: "Maio",
            5: "Junho",
            6: "Julho",
            7: "Agosto",
            8: "Setembro",
            9: "Outubro",
            10: "Novemnbro",
            11: "Dezembro"
        };

        let max = parseInt(a[list[0]]);


        for (let i = 1; i < 12; i++) {

            if(parseInt(a[list[i]]) > max) {
                max = parseInt(a[list[i]]);
            }
            
        }



        return max + 1;
        }
        function largest(t){
            let maximum = t[0];   // start with the first value
            for (let i=1; i<t.length; i++) {
                if (t[i] > maximum) {
                    maximum = t[i];   // new maximum
                }
            }
            return maximum+1;
        }
    var LINECHART = $('#lineCahrt');
    var myLineChart = new Chart(LINECHART, {
        type: 'line',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        max: getLargest(jArrEmails),
                        min: 0
                    },
                    display: true,
                    gridLines: {
                        display: false
                    }
                }]
            },
            legend: {
                display: legendState
            }
        },
        data: {
            labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
            datasets: [
                {
                    label: "Número de emails por mês",
                    fill: true,
                    lineTension: 0.2,
                    backgroundColor: "transparent",
                    borderColor: '#5e0b15',
                    pointBorderColor: '#5e0b15',
                    pointHoverBackgroundColor: '#5e0b15',
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 2,
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 5,
                    pointHoverRadius: 5,
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 0,
                    data: [jArrEmails['Janeiro'],jArrEmails['Fevereiro'],jArrEmails['Março'],jArrEmails['Abril'],jArrEmails['Maio'],jArrEmails['Junho'],jArrEmails['Julho'],jArrEmails['Agosto'],jArrEmails['Setembro'],jArrEmails['Outubro'],jArrEmails['Novembro'],jArrEmails['Dezembro']],
                    spanGaps: false
                },
            ]
        }
    });



    // ------------------------------------------------------- //
    // Bar Chart
    // ------------------------------------------------------ //
    var BARCHARTEXMPLE    = $('#barChartExample1');
    var barChartExample = new Chart(BARCHARTEXMPLE, {
        type: 'bar',
        options: {
            scales: {
                xAxes: [{
                    display: false,
                    gridLines: {
                        color: '#eee'
                    }
                }],
                yAxes: [{
                    display: false,
                    gridLines: {
                        color: '#eee'
                    }
                }]
            },
        },
        data: {
            labels: jArrNames,
            datasets: [
                {
                    label: "Favoritos no produto",
                    backgroundColor: 
                        "rgba(96, 11, 21, 0.57)",
                    hoverBackgroundColor: 
                        "rgba(96, 11, 21, 0.57)",
                    borderColor: "rgba(96, 11, 21, 1)",
                    borderWidth: 0.5,
                    data: jArrLikes,
                },
                {
                    label: "Visualizações do produto",
                    backgroundColor: 
                        "rgba(255, 255, 255, 0.5)",
                    hoverBackgroundColor: 
                        "rgba(255, 255, 255, 0.5)",
                    borderColor: 
                        "rgba(255, 255, 255, 0.5)",
                    borderWidth: 0.5,
                    data: jArrViews,
                }
            ]
        }
    });


    // ------------------------------------------------------- //
    // Line Chart 1
    // ------------------------------------------------------ //
    var LINECHART1 = $('#lineChart1');
    var myLineChart = new Chart(LINECHART1, {
        type: 'line',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        max: 40,
                        min: 10,
                        stepSize: 0.1
                    },
                    display: false,
                    gridLines: {
                        display: false
                    }
                }]
            },
            legend: {
                display: true
            }
        },
        data: {
            labels: ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "L", "M", "N", "O", "P", "Q", "R", "S", "T"],
            datasets: [
                {
                    label: "Team Drills",
                    fill: true,
                    lineTension: 0.3,
                    backgroundColor: "transparent",
                    borderColor: '#bc8034',
                    pointBorderColor: '#bc8034',
                    pointHoverBackgroundColor: '#bc8034',
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 2,
                    pointBackgroundColor: "#bc8034",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 0,
                    pointRadius: 1,
                    pointHitRadius: 0,
                    data: [20, 21, 25, 22, 24, 18, 20, 23, 19, 22, 25, 19, 24, 27, 22, 17, 20, 17, 20, 26, 22],
                    spanGaps: false
                },
                {
                    label: "Team Drills",
                    fill: true,
                    lineTension: 0.3,
                    backgroundColor: "transparent",
                    borderColor: 'rgba(188, 128, 52, 0.24)',
                    pointBorderColor: 'rgba(188, 128, 52, 0.24)',
                    pointHoverBackgroundColor: 'rgba(188, 128, 52, 0.24)',
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 2,
                    pointBackgroundColor: "rgba(188, 128, 52, 0.24)",
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 0,
                    pointRadius: 1,
                    pointHitRadius: 0,
                    data: [24, 20, 23, 19, 22, 20, 25, 21, 23, 19, 21, 23, 19, 24, 19, 22, 21, 24, 19, 21, 20],
                    spanGaps: false
                }
            ]
        }
    });


    // ------------------------------------------------------- //
    // Bar Chart
    // ------------------------------------------------------ //
    var BARCHARTEXMPLE    = $('#barChartExample2');
    var barChartExample = new Chart(BARCHARTEXMPLE, {
        type: 'bar',
        options: {
            scales: {
                xAxes: [{
                    display: false,
                    gridLines: {
                        color: '#eee'
                    }
                }],
                yAxes: [{
                    ticks: {
                        max: getLargest(jArrMonths),
                        min: 0
                    },
                    display: false,
                    gridLines: {
                        color: '#eee'
                    }
                }]
            },
        },
        data: {
            labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
            datasets: [
                
                {
                    label: "Número de encomendas por mês",
                    backgroundColor: [
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)"
                    ],
                    hoverBackgroundColor: [
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)",
                        "rgba(188, 128, 52, 0.7)"
                    ],
                    borderColor: [
                        "rgba(188, 128, 52, 1)",
                        "rgba(188, 128, 52, 1)",
                        "rgba(188, 128, 52, 1)",
                        "rgba(188, 128, 52, 1)",
                        "rgba(188, 128, 52, 1)",
                        "rgba(188, 128, 52, 1)",
                        "rgba(188, 128, 52, 1)",
                        "rgba(188, 128, 52, 1)",
                        "rgba(188, 128, 52, 1)",
                        "rgba(188, 128, 52, 1)",
                        "rgba(188, 128, 52, 1)",
                        "rgba(188, 128, 52, 1)"
                    ],
                    borderWidth: 1,
                    data: [jArrMonths['Janeiro'],jArrMonths['Fevereiro'],jArrMonths['Março'],jArrMonths['Abril'],jArrMonths['Maio'],jArrMonths['Junho'],jArrMonths['Julho'],jArrMonths['Agosto'],jArrMonths['Setembro'],jArrMonths['Outubro'],jArrMonths['Novembro'],jArrMonths['Dezembro']],
                }
            ]
        }
    });


    // ------------------------------------------------------- //
    // Pie Chart 1
    // ------------------------------------------------------ //
    var PIECHART = $('#pieChartHome1');
    var myPieChart = new Chart(PIECHART, {
        type: 'doughnut',
        options: {
            cutoutPercentage: 90,
            legend: {
                display: false
            }
        },
        data: {
            labels: [
                "First",
                "Second",
                "Third",
                "Fourth"
            ],
            datasets: [
                {
                    data: [300, 50, 100, 60],
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#5E0B15',
                        "#8D2A36",
                        "#B45560",
                        "#B97982"
                    ],
                    hoverBackgroundColor: [
                        '#5E0B15',
                        "#8D2A36",
                        "#B45560",
                        "#B97982"
                    ]
                }]
        }
    });

    // ------------------------------------------------------- //
    // Pie Chart 2
    // ------------------------------------------------------ //
    var PIECHART = $('#pieChartHome2');
    var myPieChart = new Chart(PIECHART, {
        type: 'doughnut',
        options: {
            cutoutPercentage: 90,
            legend: {
                display: false
            }
        },
        data: {
            labels: [
                "First",
                "Second",
                "Third",
                "Fourth"
            ],
            datasets: [
                {
                    data: [80, 70, 100, 60],
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#BC8034',
                        "#C79657",
                        "#D2A874",
                        "#DCBC93"
                    ],
                    hoverBackgroundColor: [
                        '#BC8034',
                        "#C79657",
                        "#D2A874",
                        "#DCBC93"
                    ]
                }]
        }
    });

    // ------------------------------------------------------- //
    // Pie Chart 3
    // ------------------------------------------------------ //
    var PIECHART = $('#pieChartHome3');
    var myPieChart = new Chart(PIECHART, {
        type: 'doughnut',
        options: {
            cutoutPercentage: 90,
            legend: {
                display: false
            }
        },
        data: {
            labels: [
                "First",
                "Second",
                "Third",
                "Fourth"
            ],
            datasets: [
                {
                    data: [120, 90, 77, 95],
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#BC8034',
                        "#C79657",
                        "#D2A874",
                        "#DCBC93"
                    ],
                    hoverBackgroundColor: [
                        '#BC8034',
                        "#C79657",
                        "#D2A874",
                        "#DCBC93"
                    ]
                }]
        }
    });


    // ------------------------------------------------------- //
    // Sales Bar Chart 1
    // ------------------------------------------------------ //
    var BARCHART1 = $('#salesBarChart1');
    var barChartHome = new Chart(BARCHART1, {
        type: 'bar',
        options:
        {
            scales:
            {
                xAxes: [{
                    display: false,
                    barPercentage: 0.2
                }],
                yAxes: [{
                    display: false
                }],
            },
            legend: {
                display: false
            }
        },
        data: {
            labels: ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J"],
            datasets: [
                {
                    label: "Data Set 1",
                    backgroundColor: [
                        '#bc8034',
                        '#bc8034',
                        '#bc8034',
                        '#bc8034',
                        '#bc8034',
                        '#bc8034',
                        '#bc8034',
                        '#bc8034',
                        '#bc8034',
                        '#bc8034',
                        '#bc8034'
                    ],
                    borderColor: [
                        '#bc8034',
                        '#bc8034',
                        '#bc8034',
                        '#bc8034',
                        '#bc8034',
                        '#bc8034',
                        '#bc8034',
                        '#bc8034',
                        '#bc8034',
                        '#bc8034',
                        '#bc8034'
                    ],
                    borderWidth: 0.2,
                    data: [35, 55, 65, 85, 40, 30, 18, 35, 20, 70]
                }
            ]
        }
    });

    // ------------------------------------------------------- //
    // Sales Bar Chart 21
    // ------------------------------------------------------ //
    var BARCHART1 = $('#salesBarChart2');
    var barChartHome = new Chart(BARCHART1, {
        type: 'bar',
        options:
        {
            scales:
            {
                xAxes: [{
                    display: false,
                    barPercentage: 0.2
                }],
                yAxes: [{
                    display: false
                }],
            },
            legend: {
                display: false
            }
        },
        data: {
            labels: ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J"],
            datasets: [
                {
                    label: "Data Set 1",
                    backgroundColor: [
                        '#BC8034',
                        '#BC8034',
                        '#BC8034',
                        '#BC8034',
                        '#BC8034',
                        '#BC8034',
                        '#BC8034',
                        '#BC8034',
                        '#BC8034',
                        '#BC8034',
                        '#BC8034'
                    ],
                    borderColor: [
                        '#BC8034',
                        '#BC8034',
                        '#BC8034',
                        '#BC8034',
                        '#BC8034',
                        '#BC8034',
                        '#BC8034',
                        '#BC8034',
                        '#BC8034',
                        '#BC8034',
                        '#BC8034'
                    ],
                    borderWidth: 0.2,
                    data: [44, 75, 65, 34, 60, 45, 22, 35, 30, 63]
                }
            ]
        }
    });


    // ------------------------------------------------------- //
    // Pie Chart
    // ------------------------------------------------------ //
    var PIECHARTEXMPLE    = $('#visitPieChart');
    var pieChartExample = new Chart(PIECHARTEXMPLE, {
        type: 'pie',
        options: {
            legend: {
                display: false
            }
        },
        data: {
            labels: [
                "A",
                "B",
                "C",
                "D"
            ],
            datasets: [
                {
                    data: [300, 50, 100, 80],
                    borderWidth: 0,
                    backgroundColor: [
                        '#490910',
                        "#5e0b15",
                        "#7E2630",
                        "#9C444F"
                    ],
                    hoverBackgroundColor: [
                        '#490910',
                        "#5e0b15",
                        "#7E2630",
                        "#9C444F"
                    ]
                }]
            }
    });

    var pieChartExample = {
        responsive: true
    };

});
