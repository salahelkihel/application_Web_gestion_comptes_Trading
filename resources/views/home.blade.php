@extends('layouts.master')
@section('title','dashboard')
@section('content')

<div class="content">
{!! Toastr::message() !!}
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                        <div class="row">
                
                          <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-3">
                                                <i class="fa fa-cogs"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib">
                                                    <div class="stat-text"><span class="count">{{$compte}}</span></div>
                                                    <div class="stat-heading">Total compte</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-1">
                                                <i class="fa fa-bar-chart"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib">
                                                    <div class="stat-text"><span class="count">{{$comptetradings}}</span></div>
                                                    <div class="stat-heading">Total trader</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-2">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib">
                                                    <div class="stat-text"><span class="count">{{$responsable}}</span></div>
                                                    <div class="stat-heading">responsable</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-4">
                                                <i class="fa fa-users"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib">
                                                    <div class="stat-text"><span class="count">{{$equipes}}</span></div>
                                                    <div class="stat-heading">Total Equipe</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                   </div>

                 <!-- /# chart -->
                 <form action="/dashboard" method="POST">
                 @csrf
                   <div class="row">
                   <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                             
                              <div class="form-group col-md-4">
                             
                              <div class="row"> <label class="col-sm-5">Numero Compte</label>  
                              <select id="chart" class="form-control col" name="chart"   >
                                    
                                    <option selected>Choose...</option>
                                    @foreach($trader as $row) 
                                    <option  value="{{$row->num_compte}}"  >{{$row->num_compte}}</option>
                                     @endforeach
                                    </select></div>
                              </div>

                       <div id="container"  style="width:100%;height:300px;"  ></div>
                            </div>
                        </div>
                    </div></form><!-- /# column -->
                <!-- /# pie chart -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                             
                               
                                    <div id="piechart"style="width: 305px;height:300px;" ></div>
                             
                            </div>
                        </div><!-- /# card -->
                    </div><!-- /# column -->
               
                </div> 
</div><br>                        
<!-- /Widgets -->
<!--  Traffic  -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">



    var TraderData = <?php echo json_encode($data)?>;
  

  Highcharts.chart('container', {
        title: {
            text: 'New trader 2021'
        },
       /* subtitle: {
            text: 'Source: positronx.io'
        },*/
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep',
                'Oct', 'Nov', 'Dec'
            ]
        },
        yAxis: {
            title: {
                text: 'Solde Trader'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Trader',
            data: TraderData,
            
            
        }],
        data: [{
            type:chart
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
 
$('#chart').on("change",function(){
    
  var link =document.getElementById("chart").value;
   
    window.location.href ="?num="+link;

});


 document.getElementById('chart').value = window.location.href.substring(36);

</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php echo $chartData ?>
        
        ]);

        var options = {
          title: 'chart of type actions Buy / Sell',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
@endsection
