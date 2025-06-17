@extends('master')

@section('title', 'Shoes - Shoesly')

@section('styles')
<style>
    .collection_text {
        width: 100%;
        float: left;
        font-size: 50px;
        color: #2d2c2c;
        text-align: center;
        font-weight: bold;
        padding-bottom: 20px;
        margin-top: 30px;
    }

    /* Product card styling */
    .best_shoes {
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        padding: 20px;
        height: 100%;
        background-color: #fff;
        border: 1px solid rgba(0,0,0,0.05);
    }
    
    .best_shoes:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15) !important;
    }
      
    .shoes_img {
        overflow: hidden;
        border-radius: 12px;
        margin-bottom: 20px;
        position: relative;
    }

    .shoes_img img {
        transition: transform 0.5s ease;
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .shoes_img img:hover {
        transform: scale(1.08);
    }

    .best_text {
        font-weight: 600;
        font-size: 18px;
        height: 48px;
        overflow: hidden;
        margin-bottom: 15px;
        color: #333;
    }

    .star_text {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .pagination-container {
        margin-top: 50px;
    }

    .pagination {
        justify-content: center;
    }
    
    /* Custom pagination styling */
    .pagination .page-item .page-link {
        color: #333;
        border: 1px solid #ddd;
        margin: 0 3px;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .pagination .page-item .page-link:hover {
        background-color: #f9f9f9;
        color: #f74877;
        border-color: #f74877;
    }
    
    .pagination .page-item.active .page-link {
        background-color: #f74877;
        border-color: #f74877;
        color: white;
    }
    
    .pagination .page-item.disabled .page-link {
        color: #999;
        background-color: #f9f9f9;
        border-color: #ddd;
    }
    
    /* Pagination arrow styling */
    .pagination .page-item:first-child .page-link,
    .pagination .page-item:last-child .page-link {
        border-radius: 30px;
        width: auto;
        padding: 0 15px;
        font-size: 14px;
    }
    
    /* Responsive pagination */
    @media (max-width: 576px) {
        .pagination .page-item .page-link {
            width: 35px;
            height: 35px;
            margin: 0 2px;
            font-size: 14px;
        }
        
        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            padding: 0 10px;
            font-size: 12px;
        }
    }

    /* Search box styling */
    .search-container {
        margin-bottom: 40px;
    }

    .search-container .form-control {
        border: 1px solid #ddd;
        box-shadow: none;
        transition: all 0.3s ease;
        height: 50px;
        font-size: 16px;
    }

    .search-container .form-control:focus {
        border-color: #f74877;
        box-shadow: 0 0 10px rgba(247, 72, 119, 0.2);
    }

    .search-container .btn {
        border: none;
        transition: all 0.3s ease;
        height: 50px;
    }

    .search-container .btn:hover {
        background-color: #e43d6b;
    }

    /* Section styling */
    .collection_section {
        padding: 30px 0 50px;
    }

    .new_text {
        font-size: 32px;
        margin-bottom: 20px;
        color: #333;
    }

    .consectetur_text {
        color: #666;
        margin-bottom: 40px;
        max-width: 800px;
        line-height: 1.7;
        font-size: 16px;
    }

    /* Add to cart button */
    .add-to-cart-btn {
        background-color: #f74877;
        color: white;
        border-radius: 25px;
        padding: 5px 12px;
        transition: all 0.3s ease;
        border: none;
        font-weight: 600;
        font-size: 12px;
        box-shadow: 0 3px 8px rgba(247, 72, 119, 0.3);
    }

    .add-to-cart-btn:hover {
        background-color: #e43d6b;
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(247, 72, 119, 0.4);
    }

    /* Price */
    .price-text {
        color: #f74877;
        font-weight: bold;
        font-size: 18px;
        margin: 0;
    }

    /* Product grid */
    .layout_padding {
        padding-top: 30px;
        padding-bottom: 60px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .collection_text {
            font-size: 36px;
            margin-top: 20px;
        }

        .shoes_img img {
            height: 180px;
        }

        .best_text {
            font-size: 16px;
            height: 44px;
        }
        
        .price-text {
            font-size: 16px;
        }
        
        .add-to-cart-btn {
            padding: 4px 10px;
            font-size: 11px;
        }
    }
    </style>
@endsection

@section('content')
<!-- Page header -->
<div class="collection_text">Shoes Collection</div>

<!-- Introduction section -->
<div class="collection_section">
    <div class="container">
        <h1 class="new_text"><strong>Our Products</strong></h1>
        <p class="consectetur_text">Sports shoes are ideally designed to help support athletic activities, but can also be worn to up the style quotient. Shop for men's running shoes online at Shoesly, to get a wide range of athletic shoes.</p>
    </div>
</div>

<!-- Products section -->
<div class="layout_padding gallery_section">
    <div class="container">
        <!-- Search box -->
        <div class="row mb-4">
            <div class="col-md-8 col-lg-6 mx-auto">
                <div class="search-container">
                    <form action="http://localhost/laravel-Shoesly/public/search" class="d-flex">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Search for shoes..." style="height: 50px; border-radius: 30px 0 0 30px; border-right: none; box-shadow: none; padding-left: 25px;">
                            <div class="input-group-append">
                                <button type="submit" class="btn" style="background-color: #f74877; color: white; border-radius: 0 30px 30px 0; padding: 0 25px;">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Products grid -->
        <div class="row">
            @foreach($products as $item)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="best_shoes" style="box-shadow: 0 5px 15px rgba(0,0,0,0.08);">
                    <div class="shoes_img">
                        <a href="detail/{{$item['id']}}">
                            <img src="{{asset('storage/images/1/' . $item->gallery)}}" alt="{{$item->name}}" class="img-fluid">
                        </a>
                    </div>
                    <div class="best_text">
                        <a href="detail/{{$item['id']}}" style="text-decoration: none; color: inherit;">
                            {{$item['name']}}
                        </a>
                    </div>
                    <div class="star_text d-flex justify-content-between align-items-center">
                        <div class="left_part">
                            <p class="price-text">Rs. {{$item['price']}}</p>
                        </div>
                        <div class="right_part">
                            <form action="add_to_cart" method="POST" style="margin: 0;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$item['id']}}">
                                <button type="submit" class="btn add-to-cart-btn">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($products->hasPages())
        <div class="pagination-container py-4">
            <div class="d-flex justify-content-center">
                {{ $products->appends(request()->query())->links() }}
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
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
    });
</script>
@endsection

@section('footer')
<!-- section footer start -->
<div class="section_footer">
    <div class="container-fluid px-4">
        <div class="footer_main">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="footer_logo mb-3 mb-md-0">
                        <a href="http://localhost/laravel-Shoesly/public"><img src="{{asset('nowcommercestyle/contentstyle/images/logo.png')}}" alt="logo"></a>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-6 col-sm-6 col-12">
                    <div class="footer_right d-flex justify-content-md-end justify-content-center align-items-center h-100">
                        <div class="footer_social_icon mr-4 d-none d-md-block">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="footer_number d-none d-md-block">
                            <p>Call for help: <span>+91-8529630125</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_divider"></div>
            <div class="row pt-5 pb-5">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-4 mb-lg-0">
                    <div class="footer_box_one">
                        <h3>Shoesly</h3>
                        <p>Discover the latest trends in footwear with Shoesly. Quality and style in every step.</p>
                        <div class="footer_social_icon mt-4 d-block d-md-none">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-4 mb-lg-0">
                    <div class="footer_box_two footer_links_box">
                        <h3>Shop</h3>
                        <ul>
                            <li><a href="http://localhost/laravel-Shoesly/public/shoes">Men's Shoes</a></li>
                            <li><a href="http://localhost/laravel-Shoesly/public/shoes">Women's Shoes</a></li>
                            <li><a href="http://localhost/laravel-Shoesly/public/shoes">Kids' Shoes</a></li>
                            <li><a href="http://localhost/laravel-Shoesly/public/shoes">Sports Shoes</a></li>
                            <li><a href="http://localhost/laravel-Shoesly/public/shoes">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-4 mb-lg-0">
                    <div class="footer_box_three footer_links_box">
                        <h3>Information</h3>
                        <ul>
                            <li><a href="http://localhost/laravel-Shoesly/public/about">About Us</a></li>
                            <li><a href="http://localhost/laravel-Shoesly/public/contact">Contact Us</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Returns & Exchanges</a></li>
                            <li><a href="#">Shipping Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-4 mb-lg-0">
                    <div class="footer_box_four footer_links_box">
                        <h3>My Account</h3>
                        <ul>
                            <li><a href="http://localhost/laravel-Shoesly/public/listupdate">Profile</a></li>
                            <li><a href="http://localhost/laravel-Shoesly/public/myorder">My Orders</a></li>
                            <li><a href="http://localhost/laravel-Shoesly/public/cartlist">Shopping Cart</a></li>
                            <li><a href="#">Wishlist</a></li>
                            @if(Session::has('user'))
                            <li><a href="http://localhost/laravel-Shoesly/public/logout">Logout</a></li>
                            @else
                            <li><a href="http://localhost/laravel-Shoesly/public/login">Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer_divider"></div>
            <div class="row pt-4 align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3 mb-md-0">
                    <div class="footer_payment_icon d-flex justify-content-md-start justify-content-center">
                        <ul>
                            <li><a href="#"><img src="{{asset('nowcommercestyle/contentstyle/images/payment_icon_1.png')}}" alt="visa"></a></li>
                            <li><a href="#"><img src="{{asset('nowcommercestyle/contentstyle/images/payment_icon_2.png')}}" alt="mastercard"></a></li>
                            <li><a href="#"><img src="{{asset('nowcommercestyle/contentstyle/images/payment_icon_3.png')}}" alt="paypal"></a></li>
                            <li><a href="#"><img src="{{asset('nowcommercestyle/contentstyle/images/payment_icon_4.png')}}" alt="american express"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3 mb-md-0">
                    <div class="footer_copyright d-flex justify-content-md-end justify-content-center align-items-center h-100">
                        <p> 2021 Shoesly - All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- section footer end -->
@endsection
