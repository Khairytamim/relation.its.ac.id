@extends('layouts.adminlayout')

@section('gaya')
<style>
  .clickable-row :hover {
    cursor: pointer;
}
</style>
@endsection

@section('content')
<div class='row'>
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
                <th>Nama Agenda</th>
                <th>Status</th>
                <th>Waktu Konfirmasi (Hari)</th>

                
                
              </tr>
            </thead>
            <tbody>
              @foreach($acara as $value)
                <tr>
                  <td>{{$value->nama_agenda}}</td>
                  <td>
                    @if($value->status == 1)
                      CONFIRMED
                    @else
                      UNCONFIRMED
                    @endif
                  </td>
                  <td>{{$value->respon_1}}</td>
                </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
  </div>
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <i class="fa fa-bar-chart-o"></i>

        <h3 class="box-title">Rata-Rata Waktu Konfirmasi</h3>

        {{-- <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div> --}}
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-xs-9">
          <div id="bar-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="829" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 829px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 184px; top: 283px; left: 38px; text-align: center;">January</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 184px; top: 283px; left: 178px; text-align: center;">February</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 184px; top: 283px; left: 328px; text-align: center;">March</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 184px; top: 283px; left: 475px; text-align: center;">April</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 184px; top: 283px; left: 619px; text-align: center;">May</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 184px; top: 283px; left: 759px; text-align: center;">June</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 270px; left: 7px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 203px; left: 7px; text-align: right;">5</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 135px; left: 1px; text-align: right;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 68px; left: 1px; text-align: right;">15</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 1px; text-align: right;">20</div></div></div><canvas class="flot-overlay" width="829" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 829px; height: 300px;"></canvas></div>
          </div>
          <div class="col-xs-3">
            <ul class="chart-legend clearfix">
              <li><i class="fa fa-circle"  style="color: #3c8dbc"></i> Waktu Konfirmasi : <b id="avg"></b></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /.box-body-->
    </div>
  </div>
  <div class="col-md-12">
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Kondisi Pertanyaan</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-xs-9">
            <canvas id="pieChart" style="height: 424px; width: 849px;" width="849" height="424"></canvas>
          </div>
          <div class="col-xs-3">
            <ul class="chart-legend clearfix">
              <li><i class="fa fa-circle" style="color: #f56954"></i> Confirmed : <b>{{$acara->where('status', 1)->count()}}</b></li>
              <li><i class="fa fa-circle" style="color: #00a65a"></i> Unconfirmed  : <b>{{$acara->where('status', 0)->count()}}</b></li>
              <li><i class="fa fa-circle" style="color: #000000"></i> Total  : <b>{{$acara->count()}}</b></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>

   


    
@endsection

@section('js')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=f3sg1vumz2lxhu0dnsl5siku8l31huewo0t2lgn6rkrjab8k"></script>
<script type="text/javascript" src="{{url('admindist/plugins/chartjs/Chart.min.js')}}"></script>
<script type="text/javascript" src="{{url('admindist/plugins/flot/jquery.flot.min.js')}}"></script>
<script type="text/javascript" src="{{url('admindist/plugins/flot/jquery.flot.categories.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    
    $('#example').DataTable({
      "order": [],
    });

    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
} );
</script>
<script type="text/javascript">
  $(document).ready(function() {
    
      $.ajax({
        method: "GET",
        url: "{{route('statistikajax')}}"
      })
        .done(function( msg ) {
          $('#avg').html(msg.avgrespon1);
          var bar_data = {
            data : [['Waktu Konfirmasi', msg.avgrespon1]],
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
              value    : msg.confirmed,
              color    : '#f56954',
              highlight: '#f56954',
              label    : 'Confirmed'
            },
            {
              value    : msg.unconfirmed,
              color    : '#00a65a',
              highlight: '#00a65a',
              label    : 'Unconfirmed'
            }
            // {
            //   value    : msg.avgrespon1,
            //   color    : '#00a65a',
            //   highlight: '#00a65a',
            //   label    : 'Unconfirmed'
            // }

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

      
