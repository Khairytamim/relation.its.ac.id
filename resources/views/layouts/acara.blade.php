<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Humas ITS</title>
    {{-- font --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet"> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylish-portfolio.css') }}" rel="stylesheet" >
    <link href="{{ asset('admindist/css/bootstrap-datetimepicker-standalone.css') }}" rel="stylesheet">
    <link href="{{ asset('admindist/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('admindist/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <!--fullcalender-->
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.print.min.css') }}" media="print">
</head>
<body style="background-image:url('bg.png'); background-repeat: repeat;background-size: 100%">
    <div id="app">
        <!-- Navigation -->
        <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle" style="background-color: #ffcb10;border: none; color: #20417f">MENU</a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle" style="background-color: #ffcb10;border: none; color: #20417f"><b>x</b></a>
                <li><h2 style="color: white">HUMAS<b>ITS</b></h2></li>
                <li>
                    <a href="#calender" onclick=$("#menu-close").click();>Kalender</a>
                </li>
                <li>
                    <a href="#panduan" onclick=$("#menu-close").click();>Panduan</a>
                </li>
                <li>
                    <a href="#acara" onclick=$("#menu-close").click();>Submit Acara</a>
                </li>
            </ul>
        </nav>
        <!--content-->
        @yield('content')
        <!--footer-->
        <footer style="padding:10vh 0 0 0; background: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.4),rgba(32,65,127,1));">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1 text-center">
                        <h4 style="color: white"><strong>Kontak Kami</strong>
                        </h4>
                        <p style="color: white">Rektorat Building 1st Floor
                            <br>Kampus ITS, Jalan Raya ITS, Keputih, Sukolilo, Keputih, Surabaya
                            <br>Jawa Timur 60117, Indonesia
                            <br>(031) 456-7890</p>
                        <ul class="list-unstyled">
                            <li style="color: white"><i class="fa fa-envelope-o fa-fw"></i> <a href="mailto:fikry.labsky08@gmail.com" class="btn btn-light">Developed By</a>
                            </li>
                        </ul>
                        {{-- <ul class="list-inline">
                            <li>
                                <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                            </li>
                        </ul> --}}
                        <hr class="small">
                        <p class="text-muted" style="color: white">Copyright &copy; Humas ITS 2017</p>
                    </div>
                </div>
            </div>
            <a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
    <script src="{{url('/admindist/bootstrap/js/bootstrap.js')}}"></script>
    
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <!--fullcalender-->
    <script src="{{ asset('js/fullcalendar.min.js') }}"></script>
    <!--datepicker-->
    <script src="{{ asset('admindist/js/bootstrap-datetimepicker.min.js') }}"></script>
    @yield('js')    
</body>
</html>
