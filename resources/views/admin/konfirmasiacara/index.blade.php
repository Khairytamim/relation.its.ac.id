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
          <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Nama Agenda</th>
                  <th>Lokasi Agenda</th>
                  <th>Tanggal Agenda</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($acara as $value)
                  <tr>
                    <td>{{$value->nama_agenda}}</td>
                    <td>{{$value->lokasi_agenda}}</td>
                    <td>{{$value->tanggal_mulai}}</td>
                    <td style="width: 13vw"><a class="btn btn-primary tgl" data-toggle="modal" data-id="{{$value->id_acara}}" data-target="#{{$value->id_acara}}">Edit</a><a class="btn btn-danger" style="margin-left: 10%" data-toggle="modal" data-id="{{$value->id_acara}}" data-target="#b{{$value->id_acara}}">Delete</a></td>
                  </tr>
                  <!-- Modal Delete -->
                  <div class="modal fade" id="b{{$value->id_acara}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Menghapus Acara</h4>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('deleteacara') }}" method="post">
                            <input type="hidden" name="id" value="{{$value->id_acara}}">
                            {{ csrf_field() }}
                            <p>Apakah anda yakin ingin menghapus Acara <b>{{$value->nama_agenda}}</b> di <b>{{$value->lokasi_agenda}}</b> pada <b>{{$value->tanggal_mulai}}</b>?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                          <button type="submit" class="btn btn-primary">Yakin</button>
                          </form>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal edit-->
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
                              @if(isset($value->poster_acara))
                              <div>
                                <img class="gmbr" src="{{ asset($value->poster_acara) }}" style="height:100%;width: 100%">
                                </div>
                              @else
                              <p><center>Uploader Tidak Mengupload Gambar</center></p>
                              @endif
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
                                    <label for="poster" class="control-label">Ganti Poster Acara</label>
                                    <input type="file" name="poster" id="exampleInputFile">
                                </div>
                                <div class="form-group">
                                    <label for="namaacara" class="control-label">Nama Agenda</label>
                                    <input id="namaacara" type="text" class="form-control" name="nama_agenda" value="{{$value->nama_agenda}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi" class="control-label">Deskripsi Agenda</label>
                                    <textarea id="deskripsi" type="text" class="form-control" name="deskripsi_agenda" value="" required>{{$value->deskripsi_agenda}}</textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="lokasi" class="control-label">Lokasi Agenda</label>
                                    <input id="lokasi" type="text" class="form-control" name="lokasi" value="{{$value->lokasi_agenda}}" required>
                                </div>
                                <div class="form-group" style="z-index: 100000">
                                  <label for="lokasi" class="control-label">Tanggal Agenda</label>
                                  <div class='input-group date' id='tanggal_agenda{{$value->id_acara}}'>
                                      <input type='text' class="form-control" value="{{$value->tanggal_mulai}}" name="tanggalmulai"  />
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-12 col-md-4">
                                <div class="form-group" style="z-index: 100000">
                                  <label for="lokasi" class="control-label">Waktu Agenda</label>
                                  <div class='input-group date' id='waktu_agenda{{$value->id_acara}}'>
                                      <input type='text' class="form-control" value="{{$value->waktu_agenda}}" name="waktu"  />
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-time"></span>
                                      </span>
                                  </div>
                                </div>
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
  </div>
@endsection

@section('js')
<script type="text/javascript">
    $(function () {
      $( ".tgl" ).on( "click", function() {
        console.log($(this).data('id'));
        $('#waktu_agenda'+ $(this).data('id')).datetimepicker({
            useCurrent: false,
            format: 'HH:mm:ss',
            allowInputToggle : true
        });
        
        $('#tanggal_agenda'+ $(this).data('id')).datetimepicker({
            useCurrent: false,
            format: 'YYYY-MM-DD',
            allowInputToggle : true
        });
        
      });
        
    });
</script>

<script type="text/javascript">
  $(function () {
    $(document).ready(function() {
      $('#example').DataTable({
         "order": []
      });
    });

    $(".gmbr").on('error', function() {
      
      $(this).closest('div').html('<p><center>Poster Error</center></p>')
    })
  });

</script>

@endsection


