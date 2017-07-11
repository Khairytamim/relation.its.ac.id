@extends('layouts.adminlayout')



@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Acara Yang Telah Dikonfirmasi</h3>
        </div>
        <div class="box-body">
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
          @if (session('delete'))
              <div class="alert alert-success">
                  {{ session('delete') }}
              </div>
          @endif
          <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Nama Agenda</th>
                <th>Lokasi Agenda</th>
                <th>Tanggal Agenda</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach($acara as $value)
                <tr>
                  <td>{{$value->nama_agenda}}</td>
                  <td>{{$value->lokasi_agenda}}</td>
                  <td>{{$value->tanggal_mulai}}</td>
                  <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#b{{$value->id_acara}}">Delete</button></td>
                </tr>
                <!-- Modal -->
                {{-- <div class="modal fade" id="b{{$value->id_acara}}" role="dialog">
                  <div class="modal-dialog">
                    <form action="{{ route('deleteacara') }}" method="post">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Anda Yakin Ingin Menghapus</h4>
                        <input type="hidden" name="id" value="{{$value->id_acara}}">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Yakin</button>
                      </div>
                    </div>
                    {{ csrf_field() }}
                    </form>
                  </div>
                </div> --}}
                <div class="modal fade" id="b{{$value->id_acara}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('deleteacara') }}" method="post">
                          <input type="hidden" name="id" value="{{$value->id_acara}}">
                          {{ csrf_field() }}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>

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
    $('#example').DataTable({
         "order": []
      });
  });
</script>

@endsection


