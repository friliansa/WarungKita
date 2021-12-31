$.ajax({
  url: 'http://localhost:8080/Dashboard/laba',
  type: 'POST',
  dataType: 'json',
  success: function(data){}}
    );


(function($) {
  'use strict';
  $(function() {
    if ($("#performaneLine").length) {
      $.ajax({
        url: 'http://localhost:8080/Dashboard/penjualanMingguan',
        type: 'POST',
        dataType: 'json',
        success: function(data){
          var graphGradient = document.getElementById("performaneLine").getContext('2d');
          var saleGradientBg = graphGradient.createLinearGradient(5, 0, 5, 100);
          saleGradientBg.addColorStop(0, 'rgba(26, 115, 232, 0.19)');
          saleGradientBg.addColorStop(1, 'rgba(26, 115, 232, 0.03)');
          var salesTopData = {
              labels: data['hari'],
              datasets: [{
                  label: 'Minggu Ini',
                  data: data['total'],
                  backgroundColor: saleGradientBg,
                  borderColor: [
                      '#1F3BB3',
                  ],
                  borderWidth: 1.5,
                  fill: true, // 3: no fill
                  pointBorderWidth: 1,
                  pointRadius: [4, 4, 4, 4, 4,4, 4, 4, 4, 4,4, 4, 4],
                  pointHoverRadius: [2, 2, 2, 2, 2,2, 2, 2, 2, 2,2, 2, 2],
                  pointBackgroundColor: ['#1F3BB3)', '#1F3BB3', '#1F3BB3', '#1F3BB3','#1F3BB3)', '#1F3BB3', '#1F3BB3', '#1F3BB3','#1F3BB3)', '#1F3BB3', '#1F3BB3', '#1F3BB3','#1F3BB3)'],
                  pointBorderColor: ['#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff',],
              }]
          };
      
          var salesTopOptions = {
            responsive: true,
            maintainAspectRatio: false,
              scales: {
                  yAxes: [{
                      gridLines: {
                          display: true,
                          drawBorder: false,
                          color:"#F0F0F0",
                          zeroLineColor: '#F0F0F0',
                      },
                      ticks: {
                        beginAtZero: false,
                        autoSkip: true,
                        maxTicksLimit: 4,
                        fontSize: 10,
                        color:"#6B778C"
                      }
                  }],
                  xAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                      beginAtZero: false,
                      autoSkip: true,
                      maxTicksLimit: 7,
                      fontSize: 10,
                      color:"#6B778C"
                    }
                }],
              },
              legend:false,
              legendCallback: function (chart) {
                var text = [];
                text.push('<div class="chartjs-legend"><ul>');
                for (var i = 0; i < chart.data.datasets.length; i++) {
                  text.push('<li>');
                  text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
                  text.push(chart.data.datasets[i].label);
                  text.push('</li>');
                }
                text.push('</ul></div>');
                return text.join("");
              },
              
              elements: {
                  line: {
                      tension: 0.4,
                  }
              },
              tooltips: {
                  backgroundColor: 'rgba(31, 59, 179, 1)',
              }
          }
          var salesTop = new Chart(graphGradient, {
              type: 'line',
              data: salesTopData,
              options: salesTopOptions
          });
          document.getElementById('performance-line-legend').innerHTML = salesTop.generateLegend();     
    
        }
      });
      
    }
    if ($("#laba").length) {
      $.ajax({
        url: 'http://localhost:8080/Dashboard/laba',
        type: 'POST',
        dataType: 'json',
        success: function(data){
          console.log(data);
          var graphGradient = document.getElementById("laba").getContext('2d');
          var saleGradientBg = graphGradient.createLinearGradient(5, 0, 5, 100);
          saleGradientBg.addColorStop(0, 'rgba(0, 208, 255, 0.19)');
          saleGradientBg.addColorStop(1, 'rgba(0, 208, 255, 0.03)');
          var salesTopData = {
              labels: data['hari'],
              datasets: [{
                  label: 'Minggu Ini',
                  data: data['laba'],
                  backgroundColor: saleGradientBg,
                  borderColor: [
                    '#52CDFF',
                  ],
                  borderWidth: 1.5,
                  fill: true, // 3: no fill
                  pointBorderWidth: 1,
                  pointRadius: [4, 4, 4, 4, 4,4, 4, 4, 4, 4,4, 4, 4],
                  pointHoverRadius: [2, 2, 2, 2, 2,2, 2, 2, 2, 2,2, 2, 2],
                  pointBackgroundColor:['#52CDFF)', '#52CDFF', '#52CDFF', '#52CDFF','#52CDFF)', '#52CDFF', '#52CDFF', '#52CDFF','#52CDFF)', '#52CDFF', '#52CDFF', '#52CDFF','#52CDFF)'],
                  pointBorderColor: ['#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff',],
              }]
          };
      
          var salesTopOptions = {
            responsive: true,
            maintainAspectRatio: false,
              scales: {
                  yAxes: [{
                      gridLines: {
                          display: true,
                          drawBorder: false,
                          color:"#F0F0F0",
                          zeroLineColor: '#F0F0F0',
                      },
                      ticks: {
                        beginAtZero: false,
                        autoSkip: true,
                        maxTicksLimit: 4,
                        fontSize: 10,
                        color:"#6B778C"
                      }
                  }],
                  xAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                      beginAtZero: false,
                      autoSkip: true,
                      maxTicksLimit: 7,
                      fontSize: 10,
                      color:"#6B778C"
                    }
                }],
              },
              legend:false,
              legendCallback: function (chart) {
                var text = [];
                text.push('<div class="chartjs-legend"><ul>');
                for (var i = 0; i < chart.data.datasets.length; i++) {
                  text.push('<li>');
                  text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
                  text.push(chart.data.datasets[i].label);
                  text.push('</li>');
                }
                text.push('</ul></div>');
                return text.join("");
              },
              
              elements: {
                  line: {
                      tension: 0.4,
                  }
              },
              tooltips: {
                  backgroundColor: 'rgba(31, 59, 179, 1)',
              }
          }
          var salesTop = new Chart(graphGradient, {
              type: 'line',
              data: salesTopData,
              options: salesTopOptions
          });
          document.getElementById('laba-legend').innerHTML = salesTop.generateLegend();     
    
        }
      });
      
    }
    if ($("#pembeli").length) {
      $.ajax({
        url: 'http://localhost:8080/Dashboard/pembeli',
        type: 'POST',
        dataType: 'json',
        success: function(data){
          console.log(data);
          var marketingOverviewChart = document.getElementById("pembeli").getContext('2d');
          var marketingOverviewData = {
              labels: data['hari'],
              datasets: [{
                label: 'Minggu ini',
                data: data['total'],
                backgroundColor: "#2dd100",
                borderColor: [
                    '#2dd100',	
                ],
                borderWidth: 0,
                fill: true, // 3: no fill
            }]
          };
      
          var marketingOverviewOptions = {
            responsive: true,
            maintainAspectRatio: false,
              scales: {
                  yAxes: [{
                      gridLines: {
                          display: true,
                          drawBorder: false,
                          color:"#F0F0F0",
                          zeroLineColor: '#F0F0F0',
                      },
                      ticks: {
                        beginAtZero: true,
                        autoSkip: true,
                        maxTicksLimit: 10,
                        fontSize: 10,
                        color:"#6B778C"
                      }
                  }],
                  xAxes: [{
                    stacked: true,
                    barPercentage: 0.35,
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                      beginAtZero: false,
                      autoSkip: true,
                      maxTicksLimit: 12,
                      fontSize: 10,
                      color:"#6B778C"
                    }
                }],
              },
              legend:false,
              legendCallback: function (chart) {
                var text = [];
                text.push('<div class="chartjs-legend"><ul>');
                for (var i = 0; i < chart.data.datasets.length; i++) {
                  text.push('<li class="text-muted text-small">');
                  text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
                  text.push(chart.data.datasets[i].label);
                  text.push('</li>');
                }
                text.push('</ul></div>');
                return text.join("");
              },
              
              elements: {
                  line: {
                      tension: 0.4,
                  }
              },
              tooltips: {
                  backgroundColor: 'rgba(31, 59, 179, 1)',
              }
          }
          var marketingOverview = new Chart(marketingOverviewChart, {
              type: 'bar',
              data: marketingOverviewData,
              options: marketingOverviewOptions
          });
          document.getElementById('marketing-overview-legend').innerHTML = marketingOverview.generateLegend();
        }
      });
      
    }
    if ($("#doughnutChart").length) {
      $.ajax({
        url: 'http://localhost:8080/Dashboard/barang',
        type: 'POST',
        dataType: 'json',
        success: function(data){
          console.log(data);
          var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
          var doughnutPieData = {
            datasets: [{
              data: data['terjual'],
              backgroundColor: [
                "#1F3BB3",
                "#FDD0C7",
                "#52CDFF",
                "#81DADA",
                "#aa0808"
              ],
              borderColor: [
                "#1F3BB3",
                "#FDD0C7",
                "#52CDFF",
                "#81DADA",
                "#aa0808"
              ],
            }],
      
            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: data['nama']
          };
          var doughnutPieOptions = {
            cutoutPercentage: 50,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
            responsive: true,
            maintainAspectRatio: true,
            showScale: true,
            legend: false,
            legendCallback: function (chart) {
              var text = [];
              text.push('<div class="chartjs-legend"><ul class="justify-content-center">');
              for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                text.push('<li><span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '">');
                text.push('</span>');
                if (chart.data.labels[i]) {
                  text.push(chart.data.labels[i]);
                }
                text.push('</li>');
              }
              text.push('</div></ul>');
              return text.join("");
            },
            
            layout: {
              padding: {
                left: 0,
                right: 0,
                top: 0,
                bottom: 0
              }
            },
            tooltips: {
              callbacks: {
                title: function(tooltipItem, data) {
                  return data['labels'][tooltipItem[0]['index']];
                },
                label: function(tooltipItem, data) {
                  return data['datasets'][0]['data'][tooltipItem['index']];
                }
              },
                
              backgroundColor: '#fff',
              titleFontSize: 14,
              titleFontColor: '#0B0F32',
              bodyFontColor: '#737F8B',
              bodyFontSize: 11,
              displayColors: false
            }
          };
          var doughnutChart = new Chart(doughnutChartCanvas, {
            type: 'doughnut',
            data: doughnutPieData,
            options: doughnutPieOptions
          });
          document.getElementById('doughnut-chart-legend').innerHTML = doughnutChart.generateLegend();
        }
      });
      
    }
  
  });
})(jQuery);