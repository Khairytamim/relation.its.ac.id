@extends('layouts.adminlayout')

@section('content')
<div class="container"  style="background-color: white">
    <div style="margin-top: 3vh;margin-bottom: 3vh;">
        <div style="text-align: center;" class="col-md-9 col-sm-12">
            <h2>KALENDER ACARA</h2>
        </div>
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
    <div class="modal-dialog" role="document"> 
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agenda</h4>
            </div> 
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
            </div> 
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button> 
            </div>
        </div> 
    </div> 
</div>    


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
    // to show edit calender
    $(document).ready(function() {
        // swal({
        //   title: "HTML <small>Title</small>!",
        //   text: "A custom ",
        //   html: true
        // });
        @if ($errors->any())
        swal({
          title: "Error!",
          text: $('#errormsg').html(),
          html: true
        });
        @endif
        @if (session('status'))
            swal("Sukses!", "Pengajuan agenda Anda akan segera kami proses!", "success")
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