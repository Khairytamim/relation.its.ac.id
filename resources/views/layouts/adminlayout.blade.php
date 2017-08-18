<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi | Humas ITS</title>
<!--     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css"> -->
    
  
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{url('/admindist/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('/admindist/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{url('/admindist/css/jquery-ui.css')}}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script src="https://use.fontawesome.com/a50b71a92d.js"></script> -->

    <link rel="stylesheet" href="{{url('/admindist/plugins/datatables/dataTables.bootstrap.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href=""> --}}
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/admindist/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url('/admindist/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{url('/admindist/dist/css/sweetalert.css')}}">

      @yield('gaya')
    
  </head>
  <body class="skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper" >

      <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
          <span class="logo-mini"><b>HUMAS</b></span>
          <span class="logo-lg"><b>HUMAS</b>ITS</span>
        </a>

      <nav class="navbar navbar-inverse navbar-static-top example-8">
        <div class="container" style="padding-left:0; margin-left:0">
          <div class="navbar-header">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" data-targer="#navbar8">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
            </a>
            <a class="navbar-brand text-hide" href="/">Brand Text</a>
          </div>
        </div>
      </nav>

      </header>

      <!-- =============================================== -->

      <aside class="main-sidebar">
        <section class="sidebar">
         @if(Auth::check())
          <div class="user-panel">
            <div class="pull-left image">
              <img href="#" src="{{url('/admindist/dist/img/default-avatar.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><a>{{Auth::user()->name}}</a></p>

              <a ><i class="fa fa-circle text-success"></i> Online</a>
              <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"></i> Logout</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
          </div>
             @endif

          <ul class="sidebar-menu">
            <li class="header">PILIHAN MENU</li>
            {{-- <li class="" id="aktifhome">
              <a href="{{route('home')}}"><i class="fa fa-home"></i> <span>Home</span></a>
            </li> --}}
            <li id="aktifacara" class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Acara</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li id="anakconfirmed"class=""><a href="{{route('listadmin')}}"><i class="fa fa-circle-o"></i>Confirmed</a></li>
                <li id="anakconfirmation"class=""><a href="{{route('konfirmasiadmin')}}"><i class="fa fa-circle-o"></i>Confirmation</a></li>
              </ul>
            </li>
            <li class="" id="aktifusers">
              <a href="{{route('users')}}"><i class="fa fa-user"></i> <span>User</span></a>
            </li>
          </ul>
        </section>
      </aside>

    <div class="content-wrapper">
      <section class="content">
        @yield('content')
      </section>
    </div>

    <footer class="main-footer">
      <strong>Copyright &copy; 2017 <a href="/admin/confirm">Humas ITS</a>.</strong> All rights reserved.
    </footer>

  </div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->

<script src="{{url('/admindist/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script src="{{url('/admindist/plugins/jQueryUI/jquery-ui.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url('/admindist/js/moment.js')}}"></script>
<script src="{{url('/admindist/bootstrap/js/bootstrap.js')}}"></script>

<script src="{{url('/admindist/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('/admindist/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

<script src="{{url('/admindist/js/bootstrap-datetimepicker.min.js')}}"></script>

<!-- SlimScroll -->
<script src="{{url('/admindist/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('/admindist/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('/admindist/dist/js/app.min.js')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.2/socket.io.js"></script>
<!-- AdminLTE for demo purposes -->

  
<script src="{{url('/admindist/dist/js/demo.js')}}"></script>
<script src="{{url('/admindist/dist/js/sweetalert.min.js')}}"></script>
<script type="text/javascript">
  $(function () {
    $('#aktif{{$active}}').toggleClass('active');
  });
  $(function () {
    $('#anak{{$page_title}}').toggleClass('active');
  });
</script>
  @yield('js')
</body>
</html>
