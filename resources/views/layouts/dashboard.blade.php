<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Learn Admin Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('dashboard-assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Stylesheets -->
    <link href="{{ asset('dashboard-assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard-assets/icons/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard-assets/icons/fontawesome/css/brands.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard-assets/icons/fontawesome/css/solid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard-assets/css/style.css') }}" rel="stylesheet">
</head>
<body>
    
    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('dashboard-assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugin/chart/chart.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/chart.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/main.js') }}"></script>
</body>
</html>