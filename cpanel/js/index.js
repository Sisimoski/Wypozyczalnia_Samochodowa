$(document).ready(function(){
    loadCharts();
    
});


function loadCharts(){
    request = $.ajax({
        url: "./php/loadIndexData.php"
    });

    request.done(function(response) {
        var data = JSON.parse(response);    
        var procent, poziom, ilosc_aut, procent_aut
        if(data[0] <=650){
            poziom = 1;
            procent =  (poziom*100)/3;
            procent_punktow = (data[0] * 100) / 650;
            
        }
        if(data[0] <=3000 && data[0] > 650){
            poziom = 2;
            procent =  (poziom*100)/3;
            procent_punktow = (data[0] * 100) / 3000;
            
        }
        if(data[0] <=7000 && data[0] > 3000){
            poziom = 3;
            procent =  (poziom*100)/3;
            procent_punktow = (data[0] * 100) / 7000;
            
        }

        procent_aut = ((data[1] - data[2]) * 100) / data[1];
        ilosc_aut = data[1];


        
        var clientCarsChartOptions = {  
            chart: {
                height: 290,
                type: "radialBar"
            },
            
            series: [procent_aut],
            
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
                        return ilosc_aut;
                    }
                    }
                }
                }
            },
            
            stroke: {
                lineCap: "round",
            },
            fill: {
                colors: ['#0890d1']
              },
            labels: ["Twoje Samochody"]
            };
    
        var clientPointsLvlOptions = {  
            chart: {
                height: 290,
                type: "radialBar"
            },
            
            series: [procent],
            
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
                        return poziom;
                      }
                    }
                }
                }
            },
    
            fill: {
                colors: ['#08d144']
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
            
            series: [procent_punktow],
            
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
                        return data[0];
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
            labels: ["Ilość Punktów"]
            };
    
        var clientCarChart = new ApexCharts(document.querySelector("#clientCarsChart"), clientCarsChartOptions);
        var clientPointsLvl = new ApexCharts(document.querySelector("#clientPointsLvl"), clientPointsLvlOptions);
        var clientChart = new ApexCharts(document.querySelector("#clientChart"), clientChartOptions);
    
        clientCarChart.render();
        clientPointsLvl.render();
        clientChart.render();
        
    });

    request.fail(function(response) {
           
    });

}