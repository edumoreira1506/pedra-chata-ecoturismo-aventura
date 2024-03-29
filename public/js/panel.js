graphic = {
initDashboardPageCharts: function() {
    chartColor = "#FFFFFF";
    gradientChartOptionsConfiguration = {
      maintainAspectRatio: false,
      legend: {
        display: false
    },
    tooltips: {
        bodySpacing: 4,
        mode: "nearest",
        intersect: 0,
        position: "nearest",
        xPadding: 10,
        yPadding: 10,
        caretPadding: 10
    },
    responsive: 1,
    scales: {
        yAxes: [{
            display: 0,
            gridLines: 0,
            ticks: {
                display: false
            },
            gridLines: {
                zeroLineColor: "transparent",
                drawTicks: false,
                display: false,
                drawBorder: false
            }
        }],
        xAxes: [{
                display: 0,
                gridLines: 0,
                ticks: {
                    display: false
                },
            gridLines: {
                zeroLineColor: "transparent",
                drawTicks: false,
                display: false,
                drawBorder: false
            }
        }]
    },
    layout: {
        padding: {
          left: 0,
          right: 0,
          top: 15,
          bottom: 15
      }
    }
};

gradientChartOptionsConfigurationWithNumbersAndGrid = {
    maintainAspectRatio: false,
    legend: {
        display: false
    },
    tooltips: {
        bodySpacing: 4,
        mode: "nearest",
        intersect: 0,
        position: "nearest",
        xPadding: 10,
        yPadding: 10,
        caretPadding: 10
    },
    responsive: true,
    scales: {
        yAxes: [{
          gridLines: 0,
          gridLines: {
            zeroLineColor: "transparent",
            drawBorder: false
            }
        }],
        xAxes: [{
          display: 0,
          gridLines: 0,
          ticks: {
            display: false
        },
        gridLines: {
            zeroLineColor: "transparent",
            drawTicks: false,
            display: false,
            drawBorder: false
        }
        }]
        },
        layout: {
            padding: {
              left: 0,
              right: 0,
              top: 15,
              bottom: 15
          }
    }
};

var ctx = document.getElementById('bigDashboardChart').getContext("2d");
var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
gradientStroke.addColorStop(0, '#80b6f4');
gradientStroke.addColorStop(1, chartColor);

var gradientFill = ctx.createLinearGradient(0, 200, 0, 50);
gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
gradientFill.addColorStop(1, "rgba(255, 255, 255, 0.24)");

$.ajax({
    type:'GET',
    url: baseUrl + 'admin/getAccesses',
    success: function(jsonResponse){
        var response = JSON.parse(jsonResponse);
        var users = new Array();

        for(i in response){
            users.push(response[i].accesses.length);
        }

        var myChart = new Chart(ctx, {
            
            type: 'line',
            data: {
                labels: ["JAN", "FEV", "MAR", "ABR", "MAI", "JUN", "JUL", "AGO", "SET", "OUT", "NOV", "DEZ"],
                datasets: [{
                    label: "Usuários no mês",
                    borderColor: chartColor,
                    pointBorderColor: chartColor,
                    pointBackgroundColor: "#1e3d60",
                    pointHoverBackgroundColor: "#1e3d60",
                    pointHoverBorderColor: chartColor,
                    pointBorderWidth: 1,
                    pointHoverRadius: 7,
                    pointHoverBorderWidth: 2,
                    pointRadius: 5,
                    fill: true,
                    backgroundColor: gradientFill,
                    borderWidth: 2,
                    data: users
                }]},
                options: {
                    layout: {
                        padding: {
                            left: 20,
                            right: 20,
                            top: 0,
                            bottom: 0
                        }
                    },
                    maintainAspectRatio: false,
                    tooltips: {
                        backgroundColor: '#fff',
                        titleFontColor: '#333',
                        bodyFontColor: '#666',
                        bodySpacing: 4,
                        xPadding: 12,
                        mode: "nearest",
                        intersect: 0,
                        position: "nearest"
                    },
                    legend: {
                      position: "bottom",
                      fillStyle: "#FFF",
                      display: false
                  },
                  scales: {
                    yAxes: [{
                        ticks: {
                            fontColor: "rgba(255,255,255,0.4)",
                            fontStyle: "bold",
                            beginAtZero: true,
                            maxTicksLimit: 5,
                            padding: 10
                        },
                        gridLines: {
                            drawTicks: true,
                            drawBorder: false,
                            display: true,
                            color: "rgba(255,255,255,0.1)",
                            zeroLineColor: "transparent"
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            zeroLineColor: "transparent",
                            display: false,
                        },
                        ticks: {
                            padding: 10,
                            fontColor: "rgba(255,255,255,0.4)",
                            fontStyle: "bold"
                        }}]
                    }
                }
            });
    }
})



var cardStatsMiniLineColor = "#fff",
cardStatsMiniDotColor = "#fff";

},

};

$(document).ready(function() {
  graphic.initDashboardPageCharts();
});