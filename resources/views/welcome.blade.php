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
{{-- <section id="calender" style="margin-top: 3vh;background: rgba(255,255,255,0.9);">
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
<div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog" role="document"> 
    <div class="modal-content"> 
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
</section> --}}
{{-- <section id="panduan">
<div class="container">
    <div class="panel" style="text-align: center;">
        <h1>Panduan Pengisian Acara</h1>
    </div>
</div>
</section> --}}

<section id="acara" style="background: rgba(32,65,127,0.8);">
<div class="container">
    <div style="text-align: center;">
        <h2 style="color: white">HUMAS ITS</h2>
        @if (session('status'))
            <div id="status">
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
            </div>
        @endif
        @if ($errors->any())
            <div id="errormsg">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        @if (session('errormsg'))
            <div id="errormsg">
              <div class="alert alert-danger">
                  {{ session('errormsg') }}
              </div>
            </div>
        @endif

    </div>
    <div class="container">
       <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#submit">Submit Acara</a></li>
        <li><a data-toggle="pill" href="#request">Request Kalender</a></li>
      </ul>
    </div>
    <div class="tab-content">
    <div id="submit" class="tab-pane fade in active">
        <div class="row">
            <form id="sent" class="form-horizontal" role="form" method="POST" action="{{ route('addacara') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="col-md-6">
                <h3 style="text-align: right;color: white">DETAIL ACARA</h3>
                <div class="form-group">
                    <label for="namaacara" class="col-md-4 control-label" style="color: white">Nama Acara</label>

                    <div class="col-md-8">
                        <input id="namaacara" type="text" class="form-control" name="namaacara" value="{{old('namaacara')}}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="deskripsi" class="col-md-4 control-label" style="color: white">Deskripsi Acara</label>

                    <div class="col-md-8">
                        <textarea id="deskripsi" type="text" class="form-control"  name="deskripsi"  rows="6" required>{{old('deskripsi')}}</textarea> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="poster" class="col-md-4 control-label" style="color: white">Poster Acara</label>
                    <div class="col-md-8">
                        <input type="file" name="poster" value="{{old('poster')}}" id="exampleInputFile" style="background-color: white; border-radius: 5px">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3 style="text-align: right;color: white">DETAIL AGENDA</h3>
                <div class="form-group">
                    <label for="namaacara" class="col-md-4 control-label" style="color: white">Nama Agenda</label>

                    <div class="col-md-8">
                        <input id="namaacara" type="text" value="{{old('nama_agenda')}}" class="form-control" name="nama_agenda" value="" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="deskripsi" class="col-md-4 control-label" style="color: white">Deskripsi Agenda</label>

                    <div class="col-md-8">
                        <textarea id="deskripsi" type="text" class="form-control" value="" name="deskripsi_agenda" required> {{old('deskripsi_agenda')}}</textarea> 
                    </div>
                </div>

                <div class="form-group">
                    <label for="lokasi" class="col-md-4 control-label" style="color: white">Lokasi Agenda</label>

                    <div class="col-md-8">
                        <input id="lokasi" type="text" class="form-control" value="{{old('lokasi')}}" name="lokasi" value="" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="lokasi" class="col-md-4 control-label" style="color: white">Tanggal Agenda</label>
                    <div class='col-md-8'>
                        <div class='input-group date' id='tanggal_agenda'>
                            <input type='text' class="form-control" name="tanggalmulai" value="{{old('tanggalmulai')}}" />
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
                            <input type='text' class="form-control" name="waktu" value="{{old('waktu')}}" />
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
                    <div class="row">
                        <label for="namapic" class="col-md-4 control-label" style="color: white">Nama PIC</label>

                        <div class="col-md-8">
                            <input id="namapic" type="text" class="form-control" name="namapic" value="{{old('namapic')}}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                <div class="row">
                    <label for="kontakpic" class="col-md-4 control-label" style="color: white">No Telp/HP PIC</label>

                    <div class="col-md-8">
                        <input id="kontakpic" type="number" class="form-control" name="kontakpic" value="{{old('kontakpic')}}" required>
                    </div>
                </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="emailpic" class="col-md-4 control-label" style="color: white">Email PIC</label>

                        <div class="col-md-8">
                            <input id="emailpic" type="email" class="form-control" name="emailpic" value="{{old('emailpic')}}" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="emailitspic" class="col-md-4 control-label" style="color: white">Email ITS PIC</label>
                        <div class="col-md-8">
                            <input id="emailpic" type="email" class="form-control" name="emailitspic" value="{{old('emailpic')}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">

                <div class="row">
                
                <div class="col-md-4 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary" style="background-color: #ffcb10;border: none; color: #20417f">
                            Submit Acara
                        </button>
                    {{-- </div> --}}
                </div>
                <div class="col-md-4 ">
                    {{-- <div class="form-group"> --}}
                    <div class="pull-right">
                        <a href="{{url('panduan/studikasus.pdf')}}"><button type="button" class="btn btn-info" {{-- style="background-color: #ffcb10;border: none; color: #20417f" --}}>
                            Panduan Pengisian
                        </button></a>
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
            </div>
            </div>
            </form>            
        </div>
    </div>
    <div id="request" class="tab-pane fade in">
        <div class="row">
            <form id="sent" class="form-horizontal" role="form" method="POST" action="{{route('requestcalendar')}}">
                {{ csrf_field() }}
            <div class="col-md-6 col-md-offset-3" style="padding-top: 0">
                <h3 style="text-align: right;color: white">Request Kalender Acara ITS</h3>
                <div class="form-group">
                    <div class="row">
                        <label for="emailitspic" class="col-md-4 control-label" style="color: white">Email ITS</label>
                        <div class="col-md-8">
                            <input id="emailpic" type="email" class="form-control" name="emailitspic" value="{{old('emailpic')}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">

                <div class="row">
                
                <div class="col-md-4 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" style="background-color: #ffcb10;border: none; color: #20417f">Submit Acara</button>
                </div>
            </div>
            </div>
            </div>
            </form>            
        </div>
    </div>
    </div>
</div>

</section>

@endsection
@section('js')
<script>
$( "#sent" ).submit(function( event ) {
  // swal("Loading","done","success");
  swal('Sedang Mengupload Data')
  swal.showLoading()
});
</script>
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
        // swal({
        //   title: "HTML <small>Title</small>!",
        //   text: "A custom ",
        //   html: true
        // });
        @if ($errors->any() || session('errormsg'))
        swal({
          title: "Error!",
          text: $('#errormsg').html(),
          
        });
        @endif
        @if (session('status'))
            swal("Sukses!", "Pengajuan agenda Anda akan segera kami proses!", "success")
        @endif
        @if(session('statuscalendar'))
            swal("Sukses!", "Permohonan untuk melihat kalender agenda berhasil, silahkan cek email", "success")
        @endif
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
