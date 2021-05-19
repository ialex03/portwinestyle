/*global $, document*/
$(document).ready(function () {

    'use strict';

    Chart.defaults.global.defaultFontColor = '#75787c';



    // ------------------------------------------------------- //
    // Line Chart Custom 1
    // ------------------------------------------------------ //
    
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

    var LINECHARTEXMPLE   = $('#lineChartCustom1');
    const getMax = getLargest(jArrMonths);

    var lineChartExample = new Chart(LINECHARTEXMPLE, {
        type: 'line',
        options: {
            legend: {labels:{fontColor:"#777", fontSize: 12}},
            scales: {
                xAxes: [{
                    display: false,
                    gridLines: {
                        color: 'transparent'
                    }
                }],
                yAxes: [{
                    ticks: {
                        max: getMax,
                        min: 0
                    },
                    display: true,
                    gridLines: {
                        color: 'transparent'
                    }
                }]
            },
        },
        data: {
            labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
            datasets: [
                {
                    label: "Número de encomendas",
                    fill: true,
                    lineTension: 0,
                    backgroundColor: "rgba(98, 98, 98, 0.5)",
                    borderColor: "rgba(98, 98, 98, 0.5)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 1,
                    pointBorderColor: "rgba(98, 98, 98, 0.5)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(98, 98, 98, 0.5)",
                    pointHoverBorderColor: "rgba(98, 98, 98, 0.5)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: [jArrMonths['Janeiro'],jArrMonths['Fevereiro'],jArrMonths['Março'],jArrMonths['Abril'],jArrMonths['Maio'],jArrMonths['Junho'],jArrMonths['Julho'],jArrMonths['Agosto'],jArrMonths['Setembro'],jArrMonths['Outubro'],jArrMonths['Novembro'],jArrMonths['Dezembro']],
                    spanGaps: false
                }
            ]
        }
    });



    // ------------------------------------------------------- //
    // Bar Chart Custom 1
    // ------------------------------------------------------ //
    var BARCHART1 = $('#barChartCustom1');
    var barChartHome = new Chart(BARCHART1, {
        type: 'bar',
        options:
        {
            scales:
            {
                xAxes: [{
                    display: true,
                    barPercentage: 0.2
                }],
                yAxes: [{
                    ticks: {
                        max: 100,
                        min: 0
                    },
                    display: false
                }],
            },
            legend: {
                display: false
            }
        },
        data: {
            labels: ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L"],
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
                        '#bc8034',
                        '#bc8034'
                    ],
                    borderWidth: 0.3,
                    data: [35, 55, 65, 85, 40, 30, 50, 35, 50, 70, 60, 50]
                }
            ]
        }
    });


    // ------------------------------------------------------- //
    // Bar Chart Example 2
    // ------------------------------------------------------ //
    var BARCHART1 = $('#barChartCustom2');
    var barChartHome = new Chart(BARCHART1, {
        type: 'bar',
        options:
        {
            scales:
            {
                xAxes: [{
                    display: true,
                    barPercentage: 0.2
                }],
                yAxes: [{
                    ticks: {
                        max: 100,
                        min: 0
                    },
                    display: false
                }],
            },
            legend: {
                display: false
            }
        },
        data: {
            labels: ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L"],
            datasets: [
                {
                    label: "Data Set 1",
                    backgroundColor: [
                        '##bc8034',
                        '##bc8034',
                        '##bc8034',
                        '##bc8034',
                        '##bc8034',
                        '##bc8034',
                        '##bc8034',
                        '##bc8034',
                        '##bc8034',
                        '##bc8034',
                        '##bc8034',
                        '##bc8034'
                    ],
                    borderColor: [
                        '##bc8034',
                        '##bc8034',
                        '##bc8034',
                        '##bc8034',
                        '##bc8034',
                        '##bc8034',
                        '##bc8034',
                        '##bc8034',
                        '##bc8034',
                        '##bc8034',
                        '##bc8034',
                        '##bc8034'
                    ],
                    borderWidth: 0.2,
                    data: [30, 40, 45, 55, 70, 45, 60, 35, 50, 63, 40, 70]
                }
            ]
        }
    });


    // ------------------------------------------------------- //
    // Line Chart Custom 2
    // ------------------------------------------------------ //
    var LINECHART1 = $('#lineChartCustom2');
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
                display: false
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
                    borderColor: 'rgba(238, 139, 152, 0.24)',
                    pointBorderColor: 'rgba(238, 139, 152, 0.24)',
                    pointHoverBackgroundColor: 'rgba(238, 139, 152, 0.24)',
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    borderWidth: 2,
                    pointBackgroundColor: "rgba(238, 139, 152, 0.24)",
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
    // Line Chart Custom 3
    // ------------------------------------------------------ //
    var LINECHART1 = $('#lineChartCustom3');
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
                display: false
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
                    data: [24, 20, 23, 19, 22, 20, 25, 21, 23, 19, 21, 23, 19, 24, 19, 22, 21, 24, 19, 21, 20],
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
                    data: [20, 21, 25, 22, 24, 18, 20, 23, 19, 22, 25, 19, 24, 27, 22, 17, 20, 17, 20, 26, 22],
                    spanGaps: false
                }
            ]
        }
    });



    // ------------------------------------------------------- //
    // Bar Chart
    // ------------------------------------------------------ //
    var BARCHARTEXMPLE    = $('#barChartCustom3');
    var barChartExample = new Chart(BARCHARTEXMPLE, {
        type: 'bar',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        color: 'transparent'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        color: 'transparent'
                    }
                }]
            },
        },
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Data Set 1",
                    backgroundColor: [
                        "#bc8034",
                        "#bc8034",
                        "#bc8034",
                        "#bc8034",
                        "#bc8034",
                        "#bc8034",
                        "#bc8034"
                    ],
                    hoverBackgroundColor: [
                        "#bc8034",
                        "#bc8034",
                        "#bc8034",
                        "#bc8034",
                        "#bc8034",
                        "#bc8034",
                        "#bc8034"
                    ],
                    borderColor: [
                        "#bc8034",
                        "#bc8034",
                        "#bc8034",
                        "#bc8034",
                        "#bc8034",
                        "#bc8034",
                        "#bc8034"
                    ],
                    borderWidth: 0.5,
                    data: [65, 59, 80, 81, 56, 55, 40],
                },
                {
                    label: "Data Set 2",
                    backgroundColor: [
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)"
                    ],
                    hoverBackgroundColor: [
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)"
                    ],
                    borderColor: [
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)",
                        "rgba(98, 98, 98, 0.5)"
                    ],
                    borderWidth: 0.5,
                    data: [35, 40, 60, 47, 88, 27, 30],
                }
            ]
        }
    });


    // ------------------------------------------------------- //
    // Pie Chart Custom 1
    // ------------------------------------------------------ //
    var PIECHARTEXMPLE    = $('#pieChartCustom1');
    var pieChartExample = new Chart(PIECHARTEXMPLE, {
        type: 'pie',
        options: {
            legend: {
                display: true,
                position: "left"
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

    var pieChartExample = {
        responsive: true
    };



    // ------------------------------------------------------- //
    // Doughnut Chart Custom
    // ------------------------------------------------------ //
    var PIECHART = $('#doughnutChartCustom1');
    var myPieChart = new Chart(PIECHART, {
        type: 'doughnut',
        options: {
            cutoutPercentage: 80,
            legend: {
                display: true,
                position: "left"
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
    // Polar Chart
    // ------------------------------------------------------ //
    var chartOptions = {
        scale: {
            gridLines: {
                color: '#3f4145'
            },
            ticks: {
                beginAtZero: true,
                min: 0,
                max: 100,
                stepSize: 20
            },
            pointLabels: {
                fontSize: 12
            }
        },
        legend: {
            position: 'left'
        },
        elements: {
            arc: {
                borderWidth: 0,
                borderColor: 'transparent'
            }
        }
    };
    var POLARCHARTEXMPLE  = $('#polarChartCustom');
    var polarChartExample = new Chart(POLARCHARTEXMPLE, {
        type: 'polarArea',
        options: chartOptions,
        data: {
            datasets: [{
                data: [
                    80,
                    70,
                    60,
                    50
                ],
                backgroundColor: [
                    '#BC8034',
                        "#C79657",
                        "#D2A874",
                        "#DCBC93"
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                "A",
                "B",
                "C",
                "D"
            ]
        }
    });

    var polarChartExample = {
        responsive: true
    };



    // ------------------------------------------------------- //
    // Radar Chart
    // ------------------------------------------------------ //
    var chartOptions = {
        scale: {
            gridLines: {
                color: '#3f4145'
            },
            ticks: {
                beginAtZero: true,
                min: 0,
                max: 100,
                stepSize: 20
            },
            pointLabels: {
                fontSize: 12
            }
        },
        legend: {
            position: 'left'
        }
    };
    var RADARCHARTEXMPLE  = $('#radarChartCustom');
    var radarChartExample = new Chart(RADARCHARTEXMPLE, {
        type: 'radar',
        options: chartOptions,
        data: {
            labels: ["A", "B", "C", "D", "E", "C"],
            datasets: [
                {
                    label: "First dataset",
                    backgroundColor: "rgba(188, 128, 52, 0.4)",
                    borderWidth: 2,
                    borderColor: "#BC8034",
                    pointBackgroundColor: "#BC8034",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "#BC8034",
                    data: [65, 59, 90, 81, 56, 55]
                },
                {
                    label: "Second dataset",
                    backgroundColor: "rgba(213, 165, 103, 0.4)",
                    borderWidth: 2,
                    borderColor: "#d5a567",
                    pointBackgroundColor: "#d5a567",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "#d5a567",
                    data: [50, 60, 80, 45, 96, 70]
                }
            ]
        }
    });
    var radarChartExample = {
        responsive: true
    };







});
