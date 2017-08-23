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
                <th>Waktu Konfirmasi (Hari)</th>
                
                
              </tr>
            </thead>
            <tbody>
              @foreach($acara as $value)
                <tr>
                  <td>{{$value->nama_agenda}}</td>
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

          // var bar_data = {
          //   data : [['Respon 1', msg.avgrespon1], ['Respon 2', msg.avgrespon2]],
          //   color: '#3c8dbc'
          // }

          // $.plot('#bar-chart', [bar_data], {
          //   grid  : {
          //     borderWidth: 1,
          //     borderColor: '#f3f3f3',
          //     tickColor  : '#f3f3f3'
          //   },
          //   series: {
          //     bars: {
          //       show    : true,
          //       barWidth: 0.5,
          //       align   : 'center'
          //     }
          //   },
          //   xaxis : {
          //     mode      : 'categories',
          //     tickLength: 0
          //   }
          // })
          
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

      
