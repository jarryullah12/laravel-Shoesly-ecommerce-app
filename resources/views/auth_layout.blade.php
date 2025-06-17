<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>@yield('title', 'Shoesly')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('nowcommercestyle/contentstyle/images/fevicon.png')}}" type="image/gif" />
    <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @yield('styles')
</head>
<body class="main-layout">
    <main>
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="{{asset('nowcommercestyle/contentstyle/js/jquery.min.js')}}"></script>
    <script src="{{asset('nowcommercestyle/contentstyle/js/popper.min.js')}}"></script>
    <script src="{{asset('nowcommercestyle/contentstyle/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('nowcommercestyle/contentstyle/js/jquery-3.0.0.min.js')}}"></script>
    <script src="{{asset('nowcommercestyle/contentstyle/js/plugin.js')}}"></script>
    <!-- Scrollbar JS -->
    <script src="{{asset('nowcommercestyle/contentstyle/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!-- Owl Carousel -->
    <script src="{{asset('nowcommercestyle/contentstyle/js/owl.carousel.js')}}"></script>
    <!-- Custom JS -->
    <script src="{{asset('nowcommercestyle/contentstyle/js/custom.js')}}"></script>
    @yield('scripts')
</body>
</html>