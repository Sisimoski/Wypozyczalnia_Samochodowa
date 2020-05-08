$(document).ready(function(){
    var clientCarsChartOptions = {  
        chart: {
            height: 290,
            type: "radialBar"
        },
        
        series: [90],
        
        plotOptions: {
            radialBar: {
            hollow: {
                margin: 0,
                size: "70%",
                background: "#293450"
            },
            
            dataLabels: {
                showOn: "always",
                name: {
                offsetY: -10,
                show: true,
                color: "#fff",
                fontSize: "13px"
                },
                value: {
                color: "#fff",
                fontSize: "30px",
                show: true,
                formatter: function (val) {
                    return val;
                }
                }
            }
            }
        },
        
        stroke: {
            lineCap: "round",
        },
        labels: ["Ilość dostępnych Pojazdów"]
        };

    var clientPointsLvlOptions = {  
        chart: {
            height: 290,
            type: "radialBar"
        },
        
        series: [50],
        
        plotOptions: {
            radialBar: {
            hollow: {
                margin: 0,
                size: "70%",
                background: "#293450"
            },

            
            
            dataLabels: {
                showOn: "always",
                name: {
                offsetY: -10,
                show: true,
                color: "#fff",
                fontSize: "13px"
                },
                value: {
                color: "#fff",
                fontSize: "30px",
                show: true,
                formatter: function (val) {
                    return 1;
                  }
                }
            }
            }
        },

        fill: {
            colors: ['#2ecc71']
          },
        
        stroke: {
            lineCap: "round",
        },
        labels: ["Poziom Konta"]
        };

    var clientChartOptions = {  
        chart: {
            height: 290,
            type: "radialBar"
        },
        
        series: [80],
        
        plotOptions: {
            radialBar: {
            hollow: {
                margin: 0,
                size: "70%",
                background: "#293450"
            },

            
            
            dataLabels: {
                showOn: "always",
                name: {
                offsetY: -10,
                show: true,
                color: "#fff",
                fontSize: "13px"
                },
                value: {
                color: "#fff",
                fontSize: "30px",
                show: true,
                formatter: function (val) {
                    return 10000;
                  }
                }
            }
            }
        },

        fill: {
            colors: ['#c0392b']
          },
        
        stroke: {
            lineCap: "round",
        },
        labels: ["Custom Chart"]
        };

    var clientCarChart = new ApexCharts(document.querySelector("#clientCarsChart"), clientCarsChartOptions);
    var clientPointsLvl = new ApexCharts(document.querySelector("#clientPointsLvl"), clientPointsLvlOptions);
    var clientChart = new ApexCharts(document.querySelector("#clientChart"), clientChartOptions);

    clientCarChart.render();
    clientPointsLvl.render();
    clientChart.render();


});