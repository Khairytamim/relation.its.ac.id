@extends('layouts.adminlayout')

@section('gaya')
<style>
  .clickable-row :hover {
    cursor: pointer;
}
</style>
@endsection

@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Pertanyaan</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Judul Pertanyaan</th>
                      <th>Tipe Pertanyaan</th>
                      <th>Status</th>
                      <th>Respon 1</th>
                      <th>Respon 2</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pertanyaan as $value)
                      <tr class="clickable-row" data-href='{{route('readmail')}}?mail_id={{$value->id_pertanyaan}}'>
                        <td>{{$value->judul_pertanyaan}}</td>
                        <td>{{$value->tipe}}</td>
                        <td>
                          @if($value->tipe != null && $value->id_jawaban == null) IN PROGRESS
                          @elseif($value->tipe != null && $value->id_jawaban != null) DONE
                          @elseif($value->tipe == null && $value->id_jawaban == null) PENDING
                          @else OTHER
                          @endif
                        </td>
                        <td>{{$value->respon_1}}</td>
                        @if(!is_null($value->id_jawaban))
                        <td>{{$value->jawaban->created_at->diffInDays($value->created_at)}}</td>
                        @else
                        <td></td>
                        @endif
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-md-12">
          <div class='row'>
          <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                  <i class="fa fa-bar-chart-o"></i>

                  <h3 class="box-title">Rata-Rata Respon</h3>

                  {{-- <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div> --}}
                </div>
                <div class="box-body">
                  <div id="bar-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="829" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 829px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 184px; top: 283px; left: 38px; text-align: center;">January</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 184px; top: 283px; left: 178px; text-align: center;">February</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 184px; top: 283px; left: 328px; text-align: center;">March</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 184px; top: 283px; left: 475px; text-align: center;">April</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 184px; top: 283px; left: 619px; text-align: center;">May</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 184px; top: 283px; left: 759px; text-align: center;">June</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 270px; left: 7px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 203px; left: 7px; text-align: right;">5</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 135px; left: 1px; text-align: right;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 68px; left: 1px; text-align: right;">15</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 1px; text-align: right;">20</div></div></div><canvas class="flot-overlay" width="829" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 829px; height: 300px;"></canvas></div>
                </div>
                <!-- /.box-body-->
              </div>
            </div>
            <div class="col-md-6">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Tipe Pertanyaan</h3>

                  {{-- <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div> --}}
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-9">
                      <canvas id="pieChart" style="height: 424px; width: 849px;" width="849" height="424"></canvas>
                    </div>
                    <div class="col-xs-3">
                      <ul class="chart-legend clearfix">
                        <li><i class="fa fa-circle text-red"></i> Publik</li>
                        <li><i class="fa fa-circle text-green"></i> Kondisional</li>
                        <li><i class="fa fa-circle text-aqua"></i> Rahasia</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <div class="col-md-6">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Kondisi Pertanyaan</h3>

                  {{-- <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div> --}}
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-9">
                      <canvas id="pieChart2" style="height: 424px; width: 849px;" width="849" height="424"></canvas>
                    </div>
                    <div class="col-xs-3">
                      <ul class="chart-legend clearfix">
                        <li><i class="fa fa-circle text-green"></i> Terjawab</li>
                        <li><i class="fa fa-circle text-aqua"></i> Belum Terjawab</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
        </div>
        </div>
        
        
        
        <!-- /.box-footer-->
          </div>
        
      

      
      <!-- /.row -->
      <!-- Main row -->


          <!-- /.box -->

       
        <!-- right col -->
      
      <!-- /.row (main row) -->

   


    
@endsection

@section('js')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=f3sg1vumz2lxhu0dnsl5siku8l31huewo0t2lgn6rkrjab8k"></script>
<script type="text/javascript" src="{{url('admindist/plugins/chartjs/Chart.min.js')}}"></script>
<script type="text/javascript" src="{{url('admindist/plugins/flot/jquery.flot.min.js')}}"></script>
<script type="text/javascript" src="{{url('admindist/plugins/flot/jquery.flot.categories.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    
    $('#example').DataTable();

    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
} );
</script>
<script type="text/javascript">
  $(document).ready(function() {
    
      $.ajax({
        method: "GET",
        url: "{{route('respon')}}"
      })
        .done(function( msg ) {

          var bar_data = {
            data : [['Respon 1', msg.avgrespon1], ['Respon 2', msg.avgrespon2]],
            color: '#3c8dbc'
          }

          $.plot('#bar-chart', [bar_data], {
            grid  : {
              borderWidth: 1,
              borderColor: '#f3f3f3',
              tickColor  : '#f3f3f3'
            },
            series: {
              bars: {
                show    : true,
                barWidth: 0.5,
                align   : 'center'
              }
            },
            xaxis : {
              mode      : 'categories',
              tickLength: 0
            }
          })
          
          var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
          var pieChart       = new Chart(pieChartCanvas)
          var PieData        = [
            {
              value    : msg.publik,
              color    : '#f56954',
              highlight: '#f56954',
              label    : 'Publik'
            },
            {
              value    : msg.kondisional,
              color    : '#00a65a',
              highlight: '#00a65a',
              label    : 'Kondisonal'
            },
            {
              value    : msg.rahasia,
              color    : '#f39c12',
              highlight: '#f39c12',
              label    : 'Rahasia'
            },
            {
              value    : msg.belum,
              color    : '#00c0ef',
              highlight: '#00c0ef',
              label    : 'NULL'
            }

          ]
          var pieOptions     = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke    : true,
            //String - The colour of each segment stroke
            segmentStrokeColor   : '#fff',
            //Number - The width of each segment stroke
            segmentStrokeWidth   : 2,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps       : 100,
            //String - Animation easing effect
            animationEasing      : 'easeOutBounce',
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate        : true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale         : false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive           : true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio  : true,
            //String - A legend template
            legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
          }
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          pieChart.Doughnut(PieData, pieOptions)
          var pieChartCanvas = $('#pieChart2').get(0).getContext('2d')
          var pieChart       = new Chart(pieChartCanvas)
          var PieData        = [
            {
              value    : msg.in_progress,
              color    : '#f56954',
              highlight: '#f56954',
              label    : 'IN PROGRESS'
            },
            {
              value    : msg.done,
              color    : '#00a65a',
              highlight: '#00a65a',
              label    : 'DONE'
            },
            {
              value    : msg.pending,
              color    : '#f39c12',
              highlight: '#f39c12',
              label    : 'PENDING'
            },
            {
              value    : msg.other,
              color    : '#00c0ef',
              highlight: '#00c0ef',
              label    : 'OTHER'
            }

          ]
          var pieOptions     = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke    : true,
            //String - The colour of each segment stroke
            segmentStrokeColor   : '#fff',
            //Number - The width of each segment stroke
            segmentStrokeWidth   : 2,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps       : 100,
            //String - Animation easing effect
            animationEasing      : 'easeOutBounce',
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate        : true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale         : false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive           : true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio  : true,
            //String - A legend template
            legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
          }
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          pieChart.Doughnut(PieData, pieOptions)
        });

        //pie chart
        
  });
      
  
    
   
</script>



@endsection

      
