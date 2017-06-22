<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Humas ITS</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admindist/css/bootstrap-datetimepicker-standalone.css') }}" rel="stylesheet">
    <link href="{{ asset('admindist/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('admindist/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <!--fullcalender-->
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.print.min.css') }}" media="print">
</head>
<body style="background-image:url('bg.png'); background-repeat: repeat;background-size: 100%">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style="opacity: 0.8; border-bottom: 4px solid #20417f;">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">HUMAS ITS</a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li><a href="{{ route('acara') }}">Submit Acara</a></li>
                        <li><a href="{{ route('calendar') }}">Kalender</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>

    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <!--fullcalender-->
    <script src="{{ asset('js/fullcalendar.min.js') }}"></script>
    <!--datepicker-->
    <script src="{{ asset('admindist/js/bootstrap-datetimepicker.min.js') }}"></script>
    @yield('js')    
</body>
</html>
