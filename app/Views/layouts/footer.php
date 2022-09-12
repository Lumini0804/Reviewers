<div class="az-footer ht-40">
      <div class="container ht-100p pd-t-0-f">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
      </div><!-- container -->
    </div><!-- az-footer -->


    <script src="<?= base_url('public/lib/jquery/jquery.min.js');?>"></script>
    <script src="<?= base_url('public/lib/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?= base_url('public/lib/ionicons/ionicons.js');?>"></script>
    <script src="<?= base_url('public/lib/jquery.flot/jquery.flot.js');?>"></script>
    <script src="<?= base_url('public/lib/jquery.flot/jquery.flot.resize.js');?>"></script>
    <script src="<?= base_url('public/lib/chart.js/Chart.bundle.min.js');?>"></script>
    <script src="<?= base_url('public/lib/peity/jquery.peity.min.js');?>"></script>
    <script src="<?= base_url('public/js/chart.flot.sampledata.js');?>"></script>
    <script src="<?= base_url('public/js/dashboard.sampledata.js');?>"></script>
    <script src="<?= base_url('public/js/azia.js');?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete&language=nl&output=json&key=AIzaSyC7GU7g8_IFBGgEN_UtOpK6ciEt71rAUnk" async defer></script>
    <script type="text/javascript">
  function initAutocomplete() {
    var address = document.getElementById('address');
    var autocomplete = new google.maps.places.Autocomplete(address);
    autocomplete.addListener('place_changed', function() {
  var place = autocomplete.getPlace();
  console.log(place);
  document.getElementById('place_id').value = place.place_id;
  document.getElementById('business_name').value = place.name;
  document.getElementById('latitude').value = place.geometry.location.lat();
  document.getElementById('longitude').value = place.geometry.location.lng();
});

  }
</script>
<script>
      $(function(){
        'use strict'

        var dataX = [[0,'Jan'],[1,'Feb'],[2,'Mar'],[3,'Apr'],[4,'May'],[5,'Jun'],[6,'Jul'],[7,'Aug'],[8,'Sep'],[9,'Oct'],[10,'Nov'],[11,'Dec']];
        loadMonthlyGraph(dataX);
        function loadMonthlyGraph(dataX) {
            var dataset = [{
                label: "Positive",
                data: [[0,15],[1,13],[2,23],[3,28],[4,38],[5,22],[6,31],[7,33]],
                color: "#1ab394",
                yaxis: 2,
                bars: {
                    show: true,
                    align: "center",
                    barWidth: 0.8,
                    lineWidth: 0
                },
                stack: true
              },
                {
                label: 'Negative', 
                data: [[0,8], [1,10], [2,12], [3,15], [4,11], [5,9],[6,7],[7,5]],
                bars: {
                    show: true,
                    align: "center",
                    barWidth: 0.8,
                    lineWidth: 0
                },
                stack: true
            }
            ];
            var options = {
                xaxis: {
                  tickSize: 1,
                    tickLength: 0,
                    axisLabelUseCanvas: true,
                    axisLabel: "Time",
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5",
                    ticks: dataX
                },
                yaxes: [{
                    position: "right",
                    clolor: "#1ab394ssz",
                    axisLabel: "Reviews",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 10
                }],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "ne"
                },
                grid: {
                    hoverable: true,
                    borderWidth: 0
                },
                series : {
                    stack: true
                }
            };
            $.plot($("#flotChart"), dataset, options);
            $("#flotChart").UseTooltip();
        }

        $.plot('#flotChart1', [{
          data: dashData2,
          color: '#00cccc'
        }], {
    			series: {
    				shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: true,
              fillColor: { colors: [ { opacity: 0.2 }, { opacity: 0.2 } ] }
            }
    			},
          grid: {
            borderWidth: 0,
            labelMargin: 0
          },
    			yaxis: {
            show: false,
            min: 0,
            max: 35
          },
    			xaxis: {
            show: false,
            max: 50
          }
    		});

        $.plot('#flotChart2', [{
          data: dashData2,
          color: '#007bff'
        }], {
    			series: {
    				shadowSize: 0,
            bars: {
              show: true,
              lineWidth: 0,
              fill: 1,
              barWidth: .5
            }
    			},
          grid: {
            borderWidth: 0,
            labelMargin: 0
          },
    			yaxis: {
            show: false,
            min: 0,
            max: 35
          },
    			xaxis: {
            show: false,
            max: 20
          }
    		});


        //-------------------------------------------------------------//


        // Line chart
        $('.peity-line').peity('line');

        // Bar charts
        $('.peity-bar').peity('bar');

        // Bar charts
        $('.peity-donut').peity('donut');

        var ctx5 = document.getElementById('chartBar5').getContext('2d');
        new Chart(ctx5, {
          type: 'bar',
          data: {
            labels: [0,1,2,3,4,5,6,7],
            datasets: [{
              data: [2, 4, 10, 20, 45, 40, 35, 18],
              backgroundColor: '#560bd0'
            }, {
              data: [3, 6, 15, 35, 50, 45, 35, 25],
              backgroundColor: '#cad0e8'
            }]
          },
          options: {
            maintainAspectRatio: false,
            tooltips: {
              enabled: false
            },
            legend: {
              display: false,
                labels: {
                  display: false
                }
            },
            scales: {
              yAxes: [{
                display: false,
                ticks: {
                  beginAtZero:true,
                  fontSize: 11,
                  max: 80
                }
              }],
              xAxes: [{
                barPercentage: 0.6,
                gridLines: {
                  color: 'rgba(0,0,0,0.08)'
                },
                ticks: {
                  beginAtZero:true,
                  fontSize: 11,
                  display: false
                }
              }]
            }
          }
        });

        // Donut Chart
        var datapie = {
          labels: ['Search', 'Email', 'Referral', 'Social', 'Other'],
          datasets: [{
            data: [25,20,30,15,10],
            backgroundColor: ['#6f42c1', '#007bff','#17a2b8','#00cccc','#adb2bd']
          }]
        };

        var optionpie = {
          maintainAspectRatio: false,
          responsive: true,
          legend: {
            display: false,
          },
          animation: {
            animateScale: true,
            animateRotate: true
          }
        };

        // For a doughnut chart
        var ctxpie= document.getElementById('chartDonut');
        var myPieChart6 = new Chart(ctxpie, {
          type: 'doughnut',
          data: datapie,
          options: optionpie
        });

      });
    </script>  
  </body>
</html>
