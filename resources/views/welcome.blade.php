@extends('layouts.acara')

@section('content')

<header id="top" class="header" style="background: linear-gradient(rgba(32,65,127,1),rgba(32,65,127,0.8), rgba(32,65,127,0.4),rgba(32,65,127,0)); height: 100vh; ">
    <div class="text-vertical-center">
        <h1 style="color: white">HumasITS</h1>
        <br>
        <a href="#calender" class="btn btn-dark btn-lg" style="background-color: #ffcb10;border: none; color: #20417f">Silahkan Jelajahi</a>
    </div>
</header>
{{-- <section id="calender" style="margin-top: 3vh;background: rgba(255,203,16,0.8);"> --}}
<section id="calender" style="margin-top: 3vh;background: rgba(255,255,255,0.9);">
<div class="container">
    <div style="margin-top: 3vh;margin-bottom: 3vh;">
        <div style="text-align: center;">
            <h2>KALENDER ACARA</h2>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12">
                <div id="calendar" ></div>
            </div>
        </div>
    </div>
</div>
</section>
<section id="panduan">
{{-- <div class="container">
    <div class="panel" style="text-align: center;">
        <h1>Panduan Pengisian Acara</h1>
    </div>
</div> --}}
</section>
<div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content"> {{-- kalo mau ngasih warna ke modalnya --}}
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-4">
                <div id="divgambar">
                    <img id="gambar" src="" style="height:100%;width: 100%"/>
                </div>
            </div>
            <div class="col-sm-4">
                <label>Nama Acara</label><br>
                <span id="namaacara"></span><br>
                <label>Deskripsi Acara</label><br>
                <span id="deskripsiacara"></span><br>
            </div>
            <div class="col-sm-4">
                <label>Nama Agenda</label><br>
                <span id="namaagenda"></span><br>
                <label>Deskripsi Agenda</label><br>
                <span id="deskripsiagenda"></span><br>
                <label>Lokasi Agenda</label><br>
                <span id="lokasiagenda"></span><br>
                <label>Tanggal dan Waktu Agenda</label><br>
                <span id="tanggalagenda"></span>
                <span id="waktuagenda"></span><br>
            </div>
        </div>
        <div class="modal-foooter">  
            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
</div>
<section id="acara" style="background: rgba(32,65,127,0.8);">
<div class="container">
    <div style="text-align: center;">
        <h2 style="color: white">SUBMIT ACARA</h2>
        @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
    <div class="row">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('addacara') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="col-md-6">
            <h3 style="text-align: right;color: white">DETAIL ACARA</h3>
            <div class="form-group">
                <label for="namaacara" class="col-md-4 control-label" style="color: white">Nama Acara</label>

                <div class="col-md-8">
                    <input id="namaacara" type="text" class="form-control" name="namaacara" value="" required>
                </div>
            </div>

            <div class="form-group">
                <label for="deskripsi" class="col-md-4 control-label" style="color: white">Deskripsi Acara</label>

                <div class="col-md-8">
                    <textarea id="deskripsi" type="text" class="form-control" name="deskripsi" value="" rows="6" required></textarea> 
                </div>
            </div>
            <div class="form-group">
                <label for="poster" class="col-md-4 control-label" style="color: white">Poster Acara</label>
                <div class="col-md-8">
                    <input type="file" name="poster" id="exampleInputFile" style="background-color: white; border-radius: 5px">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h3 style="text-align: right;color: white">DETAIL AGENDA</h3>
            <div class="form-group">
                <label for="namaacara" class="col-md-4 control-label" style="color: white">Nama Agenda</label>

                <div class="col-md-8">
                    <input id="namaacara" type="text" class="form-control" name="nama_agenda" value="" required>
                </div>
            </div>

            <div class="form-group">
                <label for="deskripsi" class="col-md-4 control-label" style="color: white">Deskripsi Agenda</label>

                <div class="col-md-8">
                    <textarea id="deskripsi" type="text" class="form-control" name="deskripsi_agenda" value="" required></textarea> 
                </div>
            </div>

            <div class="form-group">
                <label for="lokasi" class="col-md-4 control-label" style="color: white">Lokasi Agenda</label>

                <div class="col-md-8">
                    <input id="lokasi" type="text" class="form-control" name="lokasi" value="" required>
                </div>
            </div>

            <div class="form-group">
                <label for="lokasi" class="col-md-4 control-label" style="color: white">Tanggal Agenda</label>
                <div class='col-md-8'>
                    <div class='input-group date' id='tanggal_agenda'>
                        <input type='text' class="form-control" name="tanggalmulai" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="lokasi" class="col-md-4 control-label" style="color: white">Waktu Agenda</label>
                <div class='col-md-8'>
                    <div class='input-group date' id='waktu_agenda'>
                        <input type='text' class="form-control" name="waktu" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="padding-top: 0">
            <h3 style="text-align: right;color: white">PERSON IN CHARGE</h3>
            <div class="form-group">
                <label for="namapic" class="col-md-4 control-label" style="color: white">Nama PIC</label>

                <div class="col-md-8">
                    <input id="namapic" type="text" class="form-control" name="namapic" value="" required>
                </div>
            </div>

            <div class="form-group">
                <label for="kontakpic" class="col-md-4 control-label" style="color: white">No Telp/HP PIC</label>

                <div class="col-md-8">
                    <input id="kontakpic" type="number" class="form-control" name="kontakpic" value="" required>
                </div>
            </div>

            <div class="form-group">
                <label for="emailpic" class="col-md-4 control-label" style="color: white">Email PIC</label>

                <div class="col-md-8">
                    <input id="emailpic" type="email" class="form-control" name="emailpic" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" style="background-color: #ffcb10;border: none; color: #20417f">
                        Submit Acara
                    </button>
                </div>
            </div>
        </div>
        </form>            
    </div>
</div>

</section>

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
    });
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // to show edit calender
    $(document).ready(function() {
        var id=0;
        // $('#event').on('show.bs.modal', function (e) {
            
        // });
        $.post( '{{route("jadwalajax")}}',function( data ) {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: data,
                eventClick: function(calEvent, jsEvent, view) {
                    id=calEvent.id_acara;
                    // alert('Event: ' + id);
                    $.ajax({
                      method: "GET",
                      url: "{{route('getevent')}}",
                      data: { id: id }
                    })
                      .done(function( msg ) {
                        // $('#namaacara').html(msg.id_acara);
                        $('#namaacara').html(msg.nama_acara);
                        $('#deskripsiacara').html(msg.deskripsi_acara);
                        $('#namaagenda').html(msg.nama_agenda);
                        $('#deskripsiagenda').html(msg.deskripsi_agenda);
                        $('#lokasiagenda').html(msg.lokasi_agenda);
                        $('#tanggalagenda').html(msg.tanggal_mulai);
                        $('#waktuagenda').html(msg.waktu_agenda);
                    
                        var img = $("#gambar").attr('src', '{{url('')}}/'+msg.poster_acara)
                        .on('load', function() {
                            if (!this.complete || typeof this.naturalWidth == "undefined" || this.naturalWidth == 0) {
                                alert('broken image!');
                            } else {
                                $("#something").append(img);
                            }
                        })
                        .on('error', function() {
                          $('#divgambar').html('Poster tidak tersedia');
                        });

                        $('#event').modal('show');

                      });
                    // alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                    // alert('View: ' + view.name);

                    // change the border color just for fun
                    //$(this).css('border-color', 'red');
                }
            });
        });
        // console.log($posting);    
    });
    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
                   

</script>
@endsection
