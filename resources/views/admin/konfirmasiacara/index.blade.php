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
                  <td><a class="btn btn-primary" data-toggle="modal" data-target="#{{$value->id_acara}}">KLIK</a></td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="{{$value->id_acara}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Detail Acara</h4>
                      </div>
                      <form action="{{route('updateacara')}}" method="post" enctype="multipart/form-data" >
                      <div class="modal-body">
                        <div class="panel-body" style="padding: 0">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <img src="{{ asset($value->poster_acara) }}" style="position: relative; max-width: 70%; max-height:70% ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="namaacara" class="col-md-4 control-label">Nama Acara</label>

                                <div class="col-md-6">
                                    <input id="namaacara" type="text" class="form-control" name="namaacara" value="{{$value->nama_acara}}" required>
                                </div>
                            </div>
                            <input type="hidden" name="id_acara" value="{{$value->id_acara}}">

                            <div class="form-group">
                                <label for="deskripsi" class="col-md-4 control-label">Deskripsi Acara</label>

                                <div class="col-md-6">
                                    <textarea id="deskripsi" type="text" class="form-control" name="deskripsi" value="" required>{{$value->deskripsi_acara}}</textarea> 
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lokasi" class="col-md-4 control-label">Lokasi Acara</label>

                                <div class="col-md-6">
                                    <input id="lokasi" type="text" class="form-control" name="lokasi" value="{{$value->lokasi_acara}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lokasi" class="col-md-4 control-label">Tanggal Acara</label>
                                <div class='col-md-6'>
                                    <div class='input-group date' id='tanggalmulai'>
                                        <input type='text' class="form-control" value="{{$value->tanggal_mulai}}" name="tanggalmulai" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class='col-md-6 col-md-offset-4' style="padding-top: 3vh">
                                    <div class='input-group date' id='tanggalselesai'>
                                        <input type='text' class="form-control" value="{{$value->tanggal_selesai}}" name="tanggalselesai" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="poster" class="col-md-4 control-label">Ganti Poster Acara</label>
                                <div class="col-md-6">
                                    <input type="file" name="poster" id="exampleInputFile">
                                </div>
                            </div>
                        </div>
                        <div class="panel-body" style="padding: 0">
                            <h2 style="text-align: center;">PERSON IN CHARGE</h2>
                            <div class="form-group">
                                <label for="namapic" class="col-md-4 control-label">Nama PIC</label>

                                <div class="col-md-6">
                                    <input id="namapic" type="text" class="form-control" name="namapic" value="{{$value->pengaju_acara}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="kontakpic" class="col-md-4 control-label">Kontak PIC</label>

                                <div class="col-md-6">
                                    <input id="kontakpic" type="number" class="form-control" name="kontakpic" value="{{$value->kontak_pengaju}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="emailpic" class="col-md-4 control-label">Email PIC</label>

                                <div class="col-md-6">
                                    <input id="emailpic" type="email" class="form-control" value="{{$value->email_pengaju}}" name="emailpic" required>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Konfirmasi Acara</button>
                      </div>
                        {{ csrf_field() }}
                      </form>
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
    $(document).ready(function() {
      $('#example').DataTable();
    });
  });
</script>

@endsection


