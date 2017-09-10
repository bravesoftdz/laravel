<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('adminka/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('adminka/img/favicon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Adminka</title>


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('adminka/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('adminka/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('adminka/css/paper-dashboard.css') }}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('adminka/css/demo.css') }}" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('adminka/css/themify-icons.css') }}" rel="stylesheet">


    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>

    <!-- CSS -->
    @stack('css')
</head>
<body>
    <div>
        <div class="wrapper">
            @include('admin.sections.sidebar')
            <div class="main-panel">
                @include('admin.sections.menu')
                <div class="content">
                    @yield('content')
                </div>
                @include('admin.sections.footer')
            </div>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('adminka/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('adminka/js/bootstrap.min.js') }}" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="{{ asset('adminka/js/bootstrap-checkbox-radio.js') }}"></script>

    <!--  Charts Plugin -->
    <script src="{{ asset('adminka/js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('adminka/js/bootstrap-notify.js') }}"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="{{ asset('adminka/js/paper-dashboard.js') }}"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('adminka/js/demo.js') }}"></script>

    <!-- Scripts -->
    <script src="{{ asset('adminka/js/main.js') }}"></script>
    @stack('scripts')

    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher("<?= env('PUSHER_APP_ID') ?>", {
            cluster: 'us2',
            encrypted: true
        });

        var channel = pusher.subscribe('laravel');
        channel.bind('admin-remove', function(data) {
            alert(data.message);
        });

        channel.bind('admin-add', function(data) {
            alert(data.message);
        });
    </script>
</body>
</html>
