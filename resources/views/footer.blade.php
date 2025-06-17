<!-- section footer start -->
<div class="section_footer">
    <div class="container">
        <div class="footer_main">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="footer_logo mb-3 mb-md-0">
                        <a href="http://localhost/laravel-Shoesly/public">
                            <img src="{{asset('nowcommercestyle/contentstyle/images/logo.png')}}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-6 col-sm-6 col-12">
                    <div class="footer_right d-flex justify-content-md-end justify-content-center align-items-center h-100">
                        <div class="footer_social_icon mr-4 d-none d-md-block">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
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
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
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
                            <li><a href="#"><i class="fab fa-cc-visa fa-2x"></i></a></li>
                            <li><a href="#"><i class="fab fa-cc-mastercard fa-2x"></i></a></li>
                            <li><a href="#"><i class="fab fa-cc-paypal fa-2x"></i></a></li>
                            <li><a href="#"><i class="fab fa-cc-amex fa-2x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3 mb-md-0">
                    <div class="footer_copyright d-flex justify-content-md-end justify-content-center align-items-center h-100">
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- section footer end -->
