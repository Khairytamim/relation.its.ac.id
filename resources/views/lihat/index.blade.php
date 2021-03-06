@extends('layouts.acara')

@section('content')
<div class="container" style="padding: 15px">
  @if ($value->status_notes == 1)
    <div class="row">
    @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
      <form action="{{route('updateemailacara')}}" method="post" enctype="multipart/form-data" >
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
                <div class='input-group date' id='tanggal_agenda'>
                    <input type='text' class="form-control" value="{{$value->tanggal_mulai}}" name="tanggalmulai" required />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </div>
              <div class="form-group">
                  <label for="lokasi">Waktu Agenda</label>
                      <div class='input-group date' id='waktu_agenda'>
                          <input type='text' class="form-control" value="{{$value->waktu_agenda}}" name="waktu" required />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div>
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
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
        </div>
        {{ csrf_field() }}
      </form>
    </div>
  @else
    <div class="row">
      @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
      @endif
      
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
              <input id="namaacara" type="text" class="form-control" name="namaacara" value="{{$value->nama_acara}}" disabled>
          </div>
          <div class="form-group">
              <label for="deskripsi" class="control-label">Deskripsi Acara</label>
              <textarea id="deskripsi" type="text" class="form-control" name="deskripsi" value="" disabled>{{$value->deskripsi_acara}}</textarea> 
          </div>
          <div class="form-group">
              <label for="poster" class="control-label">Ganti Poster Acara</label>
              <input type="file" name="poster" disabled id="exampleInputFile">
          </div>
          <div class="form-group">
              <label for="namaacara" class="control-label">Nama Agenda</label>
              <input id="namaacara" type="text" class="form-control" name="nama_agenda" value="{{$value->nama_agenda}}" disabled>
          </div>
          <div class="form-group">
              <label for="deskripsi" class="control-label">Deskripsi Agenda</label>
              <textarea id="deskripsi" type="text" class="form-control" name="deskripsi_agenda" value="" disabled>{{$value->deskripsi_agenda}}</textarea> 
          </div>
          <div class="form-group">
              <label for="lokasi" class="control-label">Lokasi Agenda</label>
              <input id="lokasi" type="text" class="form-control" name="lokasi" value="{{$value->lokasi_agenda}}" disabled>
          </div>
          <div class="form-group" style="z-index: 100000">
            <label for="lokasi" class="control-label">Tanggal Agenda</label>
            <div class='input-group date' id='tanggal_agenda'>
                <input type='text' class="form-control" value="{{$value->tanggal_mulai}}" name="tanggalmulai" disabled  />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
          </div>
          <div class="form-group">
              <label for="lokasi" class="control-label">Waktu Agenda</label>
              
                  <div class='input-group date' id='waktu_agenda'>
                      <input type='text' class="form-control" value="{{$value->waktu_agenda}}" name="waktu" disabled  />
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-time"></span>
                      </span>
                  </div>
              
          </div>
        </div>
        <div class="col-sm-12 col-md-4">
              <div class="form-group">
                  <label for="namapic" class="control-label">Nama PIC</label>
                  <input id="namapic" type="text" class="form-control" name="namapic" value="{{$value->pengaju_acara}}" disabled>
              </div>
              <div class="form-group">
                  <label for="kontakpic" class="control-label">Kontak PIC</label>
                  <input id="kontakpic" type="number" class="form-control" name="kontakpic" value="{{$value->kontak_pengaju}}" disabled>
              </div>
              <div class="form-group">
                  <label for="emailpic" class="control-label">Email PIC</label>
                  <input id="emailpic" type="email" class="form-control" value="{{$value->email_pengaju}}" name="emailpic" disabled>
              </div>
              
        </div>
        {{ csrf_field() }}
      
    </div>
  @endif
</div>
@endsection
@section('js')

<script type="text/javascript">
    $(function () {
        $('#waktu_agenda').datetimepicker({
            useCurrent: false,
            format: 'HH:mm:ss',
            allowInputToggle : true//Important! See issue #1075
        });
        
        $('#tanggal_agenda').datetimepicker({
            useCurrent: false,
            format: 'YYYY-MM-DD',
            allowInputToggle : true//Important! See issue #1075
        });
        $(".gmbr").on('error', function() {
      
          $(this).closest('div').html('<p><center>Poster Error</center></p>')
        })
    });
</script>
@endsection
