
<?php
use App\Http\Controllers\ProductController;
$total=0;
if(Session::has('user'))
{
  $total=ProductController::cartItem();
}
?>

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
      <title>Shoesly</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{asset('nowcommercestyle/contentstyle/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('nowcommercestyle/contentstyle/images/fevicon.png')}}" type="{{asset('nowcommercestyle/contentstyle/image/logo.png')}}" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets -->
      <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{asset('nowcommercestyle/contentstyle/css/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
    <!-- header section start -->
    <div class="header_section header_main">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3 col-lg-2">
                    <div class="logo">
                        <a href="http://localhost/laravel-Shoesly/public">
                            <img style="height: 60px" src="{{asset('nowcommercestyle/contentstyle/images/logo.png')}}" alt="Shoesly Logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-9 col-lg-10">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
                        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav ml-auto">
                                <a class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}" href="http://localhost/laravel-Shoesly/public">Home</a>
                                <a class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}" href="http://localhost/laravel-Shoesly/public/about">Why Shoesly</a>
                                <a class="nav-item nav-link {{ Request::is('myorder') ? 'active' : '' }}" href="http://localhost/laravel-Shoesly/public/myorder">Orders</a>
                                <a class="nav-item nav-link {{ Request::is('shoes') ? 'active' : '' }}" href="http://localhost/laravel-Shoesly/public/shoes">Shoes</a>
                                <a class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}" href="http://localhost/laravel-Shoesly/public/contact">Contact us</a>

                                <div class="dropdown">
                                    <a class="nav-item nav-link">My Account</a>
                                    <div class="dropdown-content">
                                        @if(Session::has('user'))
                                            <a style="border: 1px solid; border-color: white;" class="nav-item nav-link" href="http://localhost/laravel-Shoesly/public/listupdate">My Profile</a>
                                            <a style="border: 1px solid; border-color: white;" class="nav-item nav-link" href="http://localhost/laravel-Shoesly/public/logout">Sign out</a>
                                        @else
                                            <a style="border: 1px solid; border-color: white;" class="nav-item nav-link" href="http://localhost/laravel-Shoesly/public/login">Login</a>
                                            <a style="border: 1px solid; border-color: white;" class="nav-item nav-link" href="http://localhost/laravel-Shoesly/public/register">Register</a>
                                        @endif
                                    </div>
                                </div>

                                <a class="nav-item nav-link last {{ Request::is('cartlist') ? 'active' : '' }}" href="http://localhost/laravel-Shoesly/public/cartlist"><img src="{{asset('nowcommercestyle/contentstyle/images/shop_icon.png')}}"><span style="color:red;">{{$total}}</span></a>
                                
                                @if(Session::has('user'))
                                <a class="nav-item nav-link">User: {{Session::get('user')['name']}}</a>
                                @else {{''}}
                                @endif
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

  <!-- header section end -->

	<!-- New Arrivals section start -->
  <div class="collection_text">Search Product</div>
    <div class="collection_section layout_padding">
    	<div class="container-fluid px-4">
    		<h1 class="new_text"><strong>Products</strong></h1>
    	    <p class="consectetur_text">Sports shoes are ideally designed to help support athletic activities, but can also be worn to up the style quotient. Shop for men’s running shoes online at Shoesly, to get a wide range of athletic shoes.</p>
    	</div>
    </div>

    			<!-- New Arrivals section start -->
<div class="layout_padding gallery_section">
    <div class="container-fluid px-4">

        <div class="row">

            @foreach ($products as $item)
            <div class="col-sm-4">
                <div class="best_shoes">
                    <a href="detail/{{$item['id']}}">
                    <p class="best_text">{{$item['name']}} </p>
                    <div class="shoes_icon"><img style="height: 210px;" src="{{asset('storage/images/1/' . $item->gallery)}}" alt="Chania"></div>
                    <div class="star_text">
                        <div class="left_part">


                                <button style="background-color: #0a0506; width:110px" class="more_bt">Buy Now</button>
                            </a>
                        </div>
                        <div class="right_part">
                            <div class="shoes_price">$ <span style="color: #ff4e5b;">{{$item['price']}}</span></div>
                        </div>
                    </div>

                </div>

            </div>
            @endforeach
            <div>

            </div></div>
        </div>
    </div>
</div>
   	<!-- New Arrivals section end -->

	<!-- section footer end -->


      <!-- Javascript files-->
      <script src="{{asset('nowcommercestyle/contentstyle/js/jquery.min.js')}}"></script>
      <script src="{{asset('nowcommercestyle/contentstyle/js/popper.min.js')}}"></script>
      <script src="{{asset('nowcommercestyle/contentstyle/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('nowcommercestyle/contentstyle/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('nowcommercestyle/contentstyle/js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{asset('nowcommercestyle/contentstyle/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('nowcommercestyle/contentstyle/js/custom.js')}}"></script>
      <!-- javascript -->
      <script src="{{asset('nowcommercestyle/contentstyle/js/owl.carousel.js')}}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });


$('#myCarousel').carousel({
            interval: false
        });

        //scroll slides on swipe for touch enabled devices

        $("#myCarousel").on("touchstart", function(event){

            var yClick = event.originalEvent.touches[0].pageY;
            $(this).one("touchmove", function(event){

                var yMove = event.originalEvent.touches[0].pageY;
                if( Math.floor(yClick - yMove) > 1 ){
                    $(".carousel").carousel('next');
                }
                else if( Math.floor(yClick - yMove) < -1 ){
                    $(".carousel").carousel('prev');
                }
            });
            $(".carousel").on("touchend", function(){
                $(this).off("touchmove");
            });
        });
      </script>
   </body>
   <style>
   .search-form{
        width: 800px !important

    }</style>
</html>
