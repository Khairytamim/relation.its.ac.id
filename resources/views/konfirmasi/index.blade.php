@extends('layouts.acara')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Acara Yang Telah Diajukan</div>
                @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif
                <form class="form-horizontal" role="form" method="POST" action="{{ route('addacara') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="panel-body" style="padding: 0">
                    <div class="form-group">
                        <div class="col-md-12">
                            <img src="{{ asset($result->poster_acara) }}" style="position: relative; max-width: 70%; max-height:70% ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="namaacara" class="col-md-4 control-label">Nama Acara</label>

                        <div class="col-md-6">
                            <input id="namaacara" type="text" class="form-control" name="namaacara" value="{{$result->nama_acara}}" required>
                        </div>
                    </div>
                    <input type="hidden" name="id_acara" value="{{$result->id_acara}}">

                    <div class="form-group">
                        <label for="deskripsi" class="col-md-4 control-label">Deskripsi Acara</label>

                        <div class="col-md-6">
                            <textarea id="deskripsi" type="text" class="form-control" name="deskripsi" value="" required>{{$result->deskripsi_acara}}</textarea> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lokasi" class="col-md-4 control-label">Lokasi Acara</label>

                        <div class="col-md-6">
                            <input id="lokasi" type="text" class="form-control" name="lokasi" value="{{$result->lokasi_acara}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lokasi" class="col-md-4 control-label">Tanggal Acara</label>
                        <div class='col-md-6'>
                            <div class='input-group date' id='tanggalmulai'>
                                <input type='text' class="form-control" value="{{$result->tanggal_mulai}}" name="tanggalmulai" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class='col-md-6 col-md-offset-4' style="padding-top: 3vh">
                            <div class='input-group date' id='tanggalselesai'>
                                <input type='text' class="form-control" value="{{$result->tanggal_selesai}}" name="tanggalselesai" />
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
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">
                                Submit Acara
                            </button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

<script type="text/javascript">
    $(function () {
        $('#tanggalselesai').datetimepicker({
            useCurrent: false,
            viewMode: 'years',
            format: 'YYYY-MM-DD' //Important! See issue #1075
        });
        $('#tanggalmulai').datetimepicker({
                viewMode: 'years',
                format: 'YYYY-MM-DD'
            });
        $("#tanggalmulai").on("dp.change", function (e) {
            $('#tanggalselesai').data("DateTimePicker").minDate(e.date);
        });
        $("#tanggalselesai").on("dp.change", function (e) {
            $('#tanggalmulai').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>
@endsection
