@extends('layouts.adminlayout')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Acara Yang Belum Dikonfirmasi</h3>
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
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($acara as $value)
                <tr>
                  <td>{{$value->nama_acara}}</td>
                  <td>{{$value->lokasi_acara}}</td>
                  <td>{{$value->tanggal_mulai}} - {{$value->tanggal_selesai}}</td>
                  <td><a class="btn btn-primary tgl" data-toggle="modal" data-id="{{$value->id_acara}}" data-target="#{{$value->id_acara}}">KLIK</a></td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="{{$value->id_acara}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Detail Acara</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <form action="{{route('updateacara')}}" method="post" enctype="multipart/form-data" >
                            <div class="col-sm-12 col-md-4">
                              <img src="{{ asset($value->poster_acara) }}" style="height:100%;width: 100%">
                            </div>
                            <div class="col-sm-12 col-md-4">
                                  <input type="hidden" name="id_acara" value="{{$value->id_acara}}">
                                  <div class="form-group">
                                      <label for="namaacara" class="control-label">Nama Acara</label>
                                      <input id="namaacara" type="text" class="form-control" name="namaacara" value="{{$value->nama_acara}}" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="deskripsi" class="control-label">Deskripsi Acara</label>
                                      <textarea id="deskripsi" type="text" class="form-control" name="deskripsi" value="" required>{{$value->deskripsi_acara}}</textarea> 
                                  </div>
                                  <div class="form-group">
                                      <label for="lokasi" class="control-label">Lokasi Acara</label>
                                      <input id="lokasi" type="text" class="form-control" name="lokasi" value="{{$value->lokasi_acara}}" required>
                                  </div>
                                  <div class="form-group" style="z-index: 100000">
                                    <label for="lokasi" class="control-label">Tanggal Mulai Acara</label>
                                    <div class='input-group date' id='tanggalmulai{{$value->id_acara}}'>
                                        <input type='text' class="form-control" value="{{$value->tanggal_mulai}}" name="tanggalmulai"  />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                  </div>
                                  <div class="form-group" style="z-index: 100000">
                                    <label for="lokasi" class="control-label">Tanggal Mulai Acara</label>
                                    <div class='input-group date' id='tanggalselesai{{$value->id_acara}}'>
                                        <input type='text' class="form-control" value="{{$value->tanggal_mulai}}" name="tanggalmulai"  />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="poster" class="control-label">Ganti Poster Acara</label>
                                      <input type="file" name="poster" id="exampleInputFile">
                                  </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                  <div class="form-group">
                                      <label for="namapic" class="control-label">Nama PIC</label>
                                      <input id="namapic" type="text" class="form-control" name="namapic" value="{{$value->pengaju_acara}}" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="kontakpic" class="control-label">Kontak PIC</label>
                                      <input id="kontakpic" type="number" class="form-control" name="kontakpic" value="{{$value->kontak_pengaju}}" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="emailpic" class="control-label">Email PIC</label>
                                      <input id="emailpic" type="email" class="form-control" value="{{$value->email_pengaju}}" name="emailpic" required>
                                  </div>
                                  <div class="form-group">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Konfirmasi Acara</button>
                                  </div>
                            {{ csrf_field() }}
                          </form>
                            <form action="{{route('notes')}}" method="post">
                                  <div class="form-group">
                                    <label class="control-label">Note</label>
                                    <textarea class="form-control" name="note" rows="4"></textarea>

                                  </div>
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                                    <input type="hidden" name="id" value="{{$value->id_acara}}">
                                  </div>
                              {{ csrf_field() }}
                            </form>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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
      $( ".tgl" ).on( "click", function() {
        console.log($(this).data('id'));
        $('#tanggalselesai'+ $(this).data('id')).datetimepicker({
            useCurrent: false,
            viewMode: 'years',
            format: 'YYYY-MM-DD' //Important! See issue #1075
        });
        $('#tanggalmulai' + $(this).data('id')).datetimepicker({
                viewMode: 'years',
                format: 'YYYY-MM-DD'
            });
        $("#tanggalmulai" + $(this).data('id')).on("dp.change", function (e) {
            $('#tanggalselesai').data("DateTimePicker").minDate(e.date);
        });
        $("#tanggalselesai" + $(this).data('id') ).on("dp.change", function (e) {
            $('#tanggalmulai').data("DateTimePicker").maxDate(e.date);
        });
        
      });
        
    });
</script>

<script type="text/javascript">
  $(function () {
    $(document).ready(function() {
      $('#example').DataTable();
    });
  });
</script>

@endsection


