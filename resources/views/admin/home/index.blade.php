@extends('layouts.adminlayout')



@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Home</h3>
        </div>
        <div class="box-body">
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
          <span id="hilman"></span>
          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
    <!-- /.box-footer-->
      </div>
    </div>
  </div>
        
        <!-- /.box-footer-->

      
      <!-- /.row -->
      <!-- Main row -->


          <!-- /.box -->

       
        <!-- right col -->
      
      <!-- /.row (main row) -->

   


    
@endsection

@section('js')

<script type="text/javascript">
  $(function () {
    $('.event').on('click', function() {
      var $row = $(this).closest("tr");
          $tds = $row.find("td:nth-child(1)");
      console.log($(this).data('id'));
      console.log($tds.text());
    });
  });
</script>

@endsection


