@extends('layouts.adminlayout')



@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Acara Yang Telah Dikonfirmasi</h3>
        </div>
        <div class="box-body">
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
          <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Nama Acara</th>
                <th>Lokasi Acara</th>
                <th>Tanggal Acara</th>
              </tr>
            </thead>
            <tbody>
              @foreach($acara as $value)
                <tr>
                  <td>{{$value->nama_acara}}</td>
                  <td>{{$value->lokasi_acara}}</td>
                  <td>{{$value->tanggal_mulai}} - {{$value->tanggal_selesai}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')

<script type="text/javascript">
  $(function () {
    $(document).ready(function() {
      $('#example').DataTable();
    });
  });
</script>

@endsection


