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
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylish-portfolio.css') }}" rel="stylesheet">
    <link href="{{ asset('admindist/css/bootstrap-datetimepicker-standalone.css') }}" rel="stylesheet">
    <link href="{{ asset('admindist/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('admindist/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/sweetalert2/5.3.8/sweetalert2.css" rel="stylesheet"/>
</head>
<body style="background-image:url('bg.png'); background-repeat: repeat;background-size: 100%">
        <!--navigation-->
        <div class="section-menu">
            <nav class="navbar navbar-default">
                <div class="container container-header">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="http://its.ac.dev/">
                            <img src="{{url('/img/icons/logo-its.png')}}" class="logo">
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="clearfix">
                            <ul id="menu-secondary-menu" class="nav navbar-nav secondary-top-menu">
                                <li><a href="#panduan">Panduan</a></li>
                                <li><a href="#calender">Kalender</a></li>
                                <li><a href="#acara">Submit Acara</a></li>
                                <li class="login hidden-xs">
                                    <a href="http://its.ac.id">
                                        <img src="{{url('/img/icons/logo-login.png')}}" class="logo">

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!--content-->
        @yield('content')
        <!--footer-->
        <div class="section_footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2 col-xs-5">
                            <img src="{{url('/img/logo.png')}}" class="logo-in-footer">
                        </div>
                        <div class="col-sm-3 col-xs-7">
                            <p>Rektorat Building 1st Floor
                            <br>Kampus ITS, Jalan Raya ITS, Keputih, Sukolilo, Keputih, Surabaya
                            <br>Jawa Timur 60117, Indonesia</p>
                        </div>
                        <div class="col-sm-3 col-xs-4 border-right-white-in-mobile">
                            <div class="footer-top-content border-left-white">
                                <div class="menu-footer-top-menu-container">
                                    <ul class="menu">
                                        <li>Kontak Kami</li>
                                        <li style="font-size: 12px">(031) 456-7890</li>
                                        <a style="padding: 6px" href="mailto:fikry.labsky08@gmail.com" class="btn btn-primary btn-block">Developed By</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-xs-4 border-right-white-in-mobile">
                            <div class="footer-top-content border-left-white">
                                <div class="title-footer padding-left-35 text-center">
                                    Temukan Kami :
                                </div>
                                <ul class="sosmed">
                                    <li>
                                        <a href="#" target="_blank">
                                            <img src="{{url('/img/icons/logo-youtube.png')}}">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <img src="{{url('/img/icons/logo-instagram.png')}}">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <img src="{{url('/img/icons/logo-facebook.png')}}">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <a href="#" target="_blank">
                                            <img src="{{url('/img/icons/twitter.png')}}">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <img src="{{url('/img/icons/logo-medsos-A.png')}}">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <a href="#" target="_blank">
                                            <img src="{{url('/img/icons/logo-line.png')}}">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2 col-xs-4">
                            <div class="footer-top-content border-left-white">
                                <div class="title-footer padding-left-35 text-center">
                                    Perpustakaan ITS
                                </div>
                                <div class="perpustakaan-content">
                                    <a href="#" target="_blank">
                                        <a href="#" target="_blank">
                                            <img src="{{url('/img/icons/perpustakaan.png')}}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            Copyright © Humas ITS 2017
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    {{-- <script src="{{url('/admindist/bootstrap/js/bootstrap.js')}}"></script> --}}
    <!--datepicker-->
    <script src="{{ asset('admindist/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!--sweetalert-->
    <script src="https://cdn.jsdelivr.net/sweetalert2/5.3.8/sweetalert2.js"></script>

    @yield('js')    
</body>
</html>
