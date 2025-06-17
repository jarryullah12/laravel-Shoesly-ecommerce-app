<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Shoesly - Premium Footwear')</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/bootstrap.min.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/responsive.css')}}">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('nowcommercestyle/contentstyle/images/fevicon.png')}}" type="image/png">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/jquery.mCustomScrollbar.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/owl.theme.default.min.css')}}">
    <!-- Fancybox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    @yield('styles')
    <style>
        /* Common styles */
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background-color: #ffffff;
            font-family: 'Poppins', sans-serif;
        }
        
        main {
            flex: 1;
            position: relative;
            z-index: 1;
        }
        
        /* Hero Section Styles */
        .banner_section {
            padding: 40px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            position: relative;
            overflow: hidden;
        }
        
        .banner_section::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background-color: rgba(255, 78, 91, 0.1);
            z-index: 0;
        }
        
        .banner_section::after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background-color: rgba(255, 78, 91, 0.08);
            z-index: 0;
        }
        
        .banner_taital {
            position: relative;
            z-index: 1;
            padding: 30px 0;
        }
        
        .banner_text {
            font-size: 48px;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
            text-transform: uppercase;
        }
        
        .mens_text {
            font-size: 28px;
            color: #ff4e5b;
            margin-bottom: 20px;
        }
        
        .lorem_text {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        
        .more_bt {
            display: inline-block;
            padding: 12px 25px;
            background-color: #ff4e5b;
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 500;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(255, 78, 91, 0.3);
        }
        
        .more_bt:hover {
            background-color: #e73a47;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(255, 78, 91, 0.4);
        }
        
        .shoes_img {
            position: relative;
            z-index: 1;
            text-align: center;
            transition: all 0.5s ease;
        }
        
        .shoes_img img {
            transform-origin: center;
            transition: transform 0.5s ease, filter 0.5s ease;
        }
        
        .carousel-item:hover .shoes_img img {
            transform: scale(1.05);
            filter: drop-shadow(0 10px 15px rgba(0,0,0,0.2));
        }
        
        .carousel-indicators {
            bottom: -40px;
        }
        
        .carousel-indicators li {
            background-color: #ccc;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 0 5px;
            opacity: 0.5;
            transition: all 0.3s ease;
        }
        
        .carousel-indicators li.active {
            background-color: #ff4e5b;
            width: 15px;
            height: 15px;
            opacity: 1;
        }
        
        .carousel-control-prev, 
        .carousel-control-next {
            width: 50px;
            height: 50px;
            background-color: rgba(0,0,0,0.2);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0;
            transition: all 0.3s ease;
        }
        
        .carousel-control-prev {
            left: 20px;
        }
        
        .carousel-control-next {
            right: 20px;
        }
        
        .banner_section:hover .carousel-control-prev,
        .banner_section:hover .carousel-control-next {
            opacity: 0.8;
        }
        
        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: rgba(255, 78, 91, 0.8);
            opacity: 1;
        }
        
        /* Dropdown styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .dropdown:hover .dropdown-content {
            display: block;
        }
        
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: all 0.3s ease;
        }
        
        .dropdown-content a:hover {
            background-color: #f1f1f1;
            color: #f74877;
        }
        
        /* Footer styles */
        .section_footer {
            width: 100%;
            background-color: #272222;
            padding: 50px 0 30px;
            position: relative;
            z-index: 2;
        }
        
        .footer_divider {
            width: 100%;
            height: 1px;
            background-color: rgba(255, 255, 255, 0.1);
            margin: 25px 0;
        }
        
        .footer_logo img {
            max-width: 150px;
            filter: brightness(0) invert(1);
            transition: opacity 0.3s ease;
        }
        
        .footer_logo img:hover {
            opacity: 0.8;
        }
        
        .footer_social_icon ul {
            display: flex;
            gap: 15px;
            padding-left: 0;
            list-style: none;
        }
        
        .footer_social_icon ul li a {
            color: #fff;
            font-size: 18px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .footer_number p {
            color: #fff;
            margin: 0;
        }
        
        .footer_number span {
            color: #ff4e5b;
        }
        
        .footer_box_one h3,
        .footer_links_box h3 {
            color: #ffffff;
            font-size: 20px;
            margin-bottom: 20px;
        }
        
        .footer_box_one p {
            color: #999;
            line-height: 1.6;
        }
        
        .footer_links_box ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer_links_box ul li {
            margin-bottom: 10px;
        }
        
        .footer_links_box ul li a {
            color: #999;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer_links_box ul li a:hover {
            color: #f74877;
        }
        
        .footer_social_icon ul li a {
            color: #fff;
            transition: color 0.3s ease;
        }
        
        .footer_social_icon ul li a:hover {
            color: #f74877;
        }
        
        .footer_number {
            color: #fff;
        }
        
        .footer_number span {
            color: #f74877;
        }
        
        .footer_payment_icon ul {
            display: flex;
            list-style: none;
            padding-left: 0;
            gap: 15px;
        }
        
        .footer_payment_icon ul li a {
            color: #999;
            transition: color 0.3s ease;
        }
        
        .footer_payment_icon ul li a:hover {
            color: #f74877;
        }
        
        .footer_copyright p {
            color: #999;
            margin: 0;
            font-size: 14px;
        }
        
        .copyright {
            width: 100%;
            float: left;
            font-size: 12pt;
            color: #ffffff;
            text-align: center;
            padding: 10px 0px;
            background-color: #ff4e5b;
            font-family: Poppins;
        }
    </style>
</head>
<body class="main-layout">
    @include('header', ['total' => $total])
    
    <main>
        @yield('content')
    </main>

    @include('footer')

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