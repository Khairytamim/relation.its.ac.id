@extends('layouts.acara')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="border-bottom: 4px solid #20417f;">SILAHKAN ISI FORM</div>
                @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif
                <form class="form-horizontal" role="form" method="POST" action="{{ route('addacara') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="panel-body">
                <div class="col-md-6">
                    <h2 style="text-align: right;">DETAIL ACARA</h2>
                    <div class="form-group">
                        <label for="namaacara" class="col-md-4 control-label">Nama Acara</label>

                        <div class="col-md-8">
                            <input id="namaacara" type="text" class="form-control" name="namaacara" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi" class="col-md-4 control-label">Deskripsi Acara</label>

                        <div class="col-md-8">
                            <textarea id="deskripsi" type="text" class="form-control" name="deskripsi" value="" required></textarea> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lokasi" class="col-md-4 control-label">Lokasi Acara</label>

                        <div class="col-md-8">
                            <input id="lokasi" type="text" class="form-control" name="lokasi" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lokasi" class="col-md-4 control-label">Tanggal Acara</label>
                        <div class='col-md-8'>
                            <div class='input-group date' id='tanggalmulai'>
                                <input type='text' class="form-control" name="tanggalmulai" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class='col-md-8 col-md-offset-4' style="padding-top: 3vh">
                            <div class='input-group date' id='tanggalselesai'>
                                <input type='text' class="form-control" name="tanggalselesai" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="poster" class="col-md-4 control-label">Poster Acara</label>
                        <div class="col-md-8">
                            <input type="file" name="poster" id="exampleInputFile">
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="padding-top: 0">
                    <h2 style="text-align: right;">PERSON IN CHARGE</h2>
                    <div class="form-group">
                        <label for="namapic" class="col-md-4 control-label">Nama PIC</label>

                        <div class="col-md-8">
                            <input id="namapic" type="text" class="form-control" name="namapic" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kontakpic" class="col-md-4 control-label">Kontak PIC</label>

                        <div class="col-md-8">
                            <input id="kontakpic" type="number" class="form-control" name="kontakpic" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="emailpic" class="col-md-4 control-label">Email PIC</label>

                        <div class="col-md-8">
                            <input id="emailpic" type="email" class="form-control" name="emailpic" required>
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
