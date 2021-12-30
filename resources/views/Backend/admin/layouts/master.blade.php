<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>TechnolosiesStuff</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- Fa-fa icon --}}
    <link href="{{ asset('Admin/asset/css/fa-fa icon.css') }}" rel="stylesheet" />
    <!-- site icon -->
    <link rel="icon" href="{{ asset('Admin/asset/images/fevicon.png') }}" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('Admin/asset/css/bootstrap.min.css') }}" />
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('Admin/asset/css/style.css') }}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('Admin/asset/css/responsive.css') }}" />
    <!-- color css -->
    <link rel="stylesheet" href="{{ asset('Admin/asset/css/colors.css') }}" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{ asset('Admin/asset/css/bootstrap-select.css') }}" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{ asset('Admin/asset/css/perfect-scrollbar.css') }}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('Admin/asset/css/custom.css') }}" />
   {{-- select2 --}}
    @stack('css')

</head>
<body class="dashboard dashboard_1">
    
    @include('backend.admin.layouts.menubar')
    @include('backend.admin.layouts.header')
     @include('flash-message')


    @yield('content')
    <!-- jQuery -->
    <script src="{{ asset('Admin/asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Admin/asset/js/popper.min.js') }}"></script>
    <script src="{{ asset('Admin/asset/js/bootstrap.min.js') }}"></script>
    <!-- wow animation -->
    <script src="{{ asset('Admin/asset/js/animate.js') }}"></script>
    <!-- select country -->
    <script src="{{ asset('Admin/asset/js/bootstrap-select.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('Admin/asset/js/owl.carousel.js') }}"></script>
    <!-- chart js -->
    <script src="{{ asset('Admin/asset/js/Chart.min.js') }}"></script>
    <script src="{{ asset('Admin/asset/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('Admin/asset/js/utils.js') }}"></script>
    <script src="{{ asset ('Admin/asset/js/analyser.js') }}"></script>
    <!-- nice scrollbar -->
    <script src="{{ asset('Admin/asset/js/perfect-scrollbar.min.js') }}"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="{{ asset('Admin/asset/js/custom.js') }}"></script>
    <script src="{{ asset('Admin/asset/js/chart_custom_style1.js') }}"></script>

    {{-- select 2 --}}
    
     @stack('scripts')
</body>
@include('backend.admin.layouts.footer')
</html>
