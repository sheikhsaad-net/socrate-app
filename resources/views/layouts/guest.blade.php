<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ url('/assets/img/favicon.png') }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ url('/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ url('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
  <link href="{{ url('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ url('/assets/css/corporate-ui-dashboard.css?v=1.0.0') }}" rel="stylesheet" />

   <!-- Scripts -->
   @vite(['resources/css/app.css', 'resources/js/app.js'])

   <!-- Styles -->
   @livewireStyles
</head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts
    <!--   Core JS Files   -->
    <script src="{{ url('/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ url('/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ url('/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ url('/assets/js/corporate-ui-dashboard.min.js?v=1.0.0') }}"></script>
    </body>
</html>
