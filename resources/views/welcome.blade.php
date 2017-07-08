@extends('layouts.acara')

@section('content')
<header id="top" class="header" style="background: linear-gradient(rgba(51,122,183,1),rgba(51,122,183,0.8), rgba(51,122,183,0.4),rgba(51,122,183,0)); height: 100vh; ">
    <div class="text-vertical-center">
        <h1 style="color: white">HumasITS</h1>
        <br>
        <a href="#calender" class="btn btn-dark btn-lg">Silahkan Jelajahi</a>
    </div>
</header>
<section id="calender">
<div class="container">
    <div class="panel panel-default" style="margin-top: 3vh">
        <div style="text-align: center;">
            <h1>Kalender Acara</h1>
        </div>
        <div class="panel-body">
            <div id="calendar" ></div>  
        </div>
    </div>
</div>
</section>
<section id="panduan">
<div class="container">
    <div class="panel" style="text-align: center;">
        <h1>PANDUAN PENGISIAN ACARA</h1>
    </div>
</div>
</section>
<section id="event">
    <div class="panel panel-default">
        <div class="panel-heading" style="border-bottom: none;">SILAHKAN ISI FORM</div>
        @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('addacara') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
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
                    <label for="poster" class="col-md-4 control-label">Poster Acara</label>
                    <div class="col-md-8">
                        <input type="file" name="poster" id="exampleInputFile">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2 style="text-align: right;">DETAIL AGENDA</h2>
                <div class="form-group">
                    <label for="namaacara" class="col-md-4 control-label">Nama Agenda</label>

                    <div class="col-md-8">
                        <input id="namaacara" type="text" class="form-control" name="nama_agenda" value="" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="deskripsi" class="col-md-4 control-label">Deskripsi Agenda</label>

                    <div class="col-md-8">
                        <textarea id="deskripsi" type="text" class="form-control" name="deskripsi_agenda" value="" required></textarea> 
                    </div>
                </div>

                <div class="form-group">
                    <label for="lokasi" class="col-md-4 control-label">Lokasi Agenda</label>

                    <div class="col-md-8">
                        <input id="lokasi" type="text" class="form-control" name="lokasi" value="" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="lokasi" class="col-md-4 control-label">Tanggal Agenda</label>
                    <div class='col-md-8'>
                        <div class='input-group date' id='tanggalmulai'>
                            <input type='text' class="form-control" name="tanggalmulai" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lokasi" class="col-md-4 control-label">Waktu Agenda</label>
                    <div class='col-md-8'>
                        <div class='input-group date' id='waktu'>
                            <input type='text' class="form-control" name="waktu" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
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
                    <label for="kontakpic" class="col-md-4 control-label">No Telp/HP PIC</label>

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
                        <button type="submit" class="btn btn-primary">
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
        $('#tanggalselesai').datetimepicker({
            useCurrent: false,
            viewMode: 'years',
            format: 'YYYY-MM-DD' //Important! See issue #1075
        });
        $('#tanggalmulai').datetimepicker({
                useCurrent: false,
                viewMode: 'years',
                format: 'YYYY-MM-DD'
            });
        $('#waktu').datetimepicker({
                    format: 'LT'
                });
        $("#tanggalmulai").on("dp.change", function (e) {
            $('#tanggalselesai').data("DateTimePicker").minDate(e.date);
        });
        $("#tanggalselesai").on("dp.change", function (e) {
            $('#tanggalmulai').data("DateTimePicker").maxDate(e.date);
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
                    alert('Event: ' + calEvent.title);
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
