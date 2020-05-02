$(document).ready(function(){
    var clientCarsChartOptions = {  
        chart: {
            height: 290,
            type: "radialBar"
        },
        
        series: [100],
        
        plotOptions: {
            radialBar: {
            hollow: {
                margin: 15,
                size: "70%"
            },
            
            dataLabels: {
                showOn: "always",
                name: {
                offsetY: -10,
                show: true,
                color: "#000000",
                fontSize: "13px"
                },
                value: {
                color: "#111",
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
        
        series: [100],
        
        plotOptions: {
            radialBar: {
            hollow: {
                margin: 15,
                size: "70%"
            },
            
            dataLabels: {
                showOn: "always",
                name: {
                offsetY: -10,
                show: true,
                color: "#000",
                fontSize: "13px"
                },
                value: {
                color: "#111",
                fontSize: "30px",
                show: true,
                formatter: function (val) {
                    return 1;
                  }
                }
            }
            }
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
        
        series: [100],
        
        plotOptions: {
            radialBar: {
            hollow: {
                margin: 15,
                size: "70%"
            },
            
            dataLabels: {
                showOn: "always",
                name: {
                offsetY: -10,
                show: true,
                color: "#000",
                fontSize: "13px"
                },
                value: {
                color: "#111",
                fontSize: "30px",
                show: true,
                formatter: function (val) {
                    return 10000;
                  }
                }
            }
            }
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