@php
use Illuminate\Support\Str;
@endphp

@extends('master')
@section('content')

<div class="banner_section">
    <div class="container-fluid">
        <section class="slide-wrapper">
<div class="container-fluid">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
                        @foreach ($products as $key => $product)
                            <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
@endforeach
        </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @foreach ($products as $key => $product)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <div class="row">
                                    <div class="col-sm-7">
                                        <div class="banner_taital">
                    <a href="detail/{{$product['id']}}">
                                                <h1 class="banner_text">{{$product['name']}}</h1>
                                                <h1 class="mens_text"><strong>{{$product['short_description'] ?? 'Premium Shoes'}}</strong></h1>
                                                <p class="lorem_text">{{Str::limit($product['description'], 150)}}</p>
                                                <div class="btn-group mt-4">
                                                    <button class="more_bt mr-2"><a style="color:white" href="detail/{{$product['id']}}">Buy Now</a></button>
                                                    <button class="more_bt" style="background-color: #333;"><a style="color:white" href="{{url('/shoes')}}">See More</a></button>
                        </div>
                                            </a>
                        </div>
                    </div>
                                    <div class="col-sm-5">
                                        <a href="detail/{{$product['id']}}">
                                            <div style="height: 515px" class="shoes_img">
                                                <img style="height: 410px; object-fit: contain;"
                                                     src="{{Str::startsWith($product->gallery, 'http') ? $product->gallery : asset('storage/images/1/' . $product->gallery)}}"
                                                     alt="{{$product->name}}">
                </div>
                                        </a>
            </div>
        </div>
    </div>
                        @endforeach
</div>

                    <!-- Controls -->
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
</div>
            </div>
        </section>
    </div>
</div>

<!-- new collection section start -->
<div class="layout_padding collection_section">
    <div class="container-fluid">
        <h1 class="new_text"><strong>New  Collection</strong></h1>
        <p class="consectetur_text">Sports shoes are ideally designed to help support athletic activities, but can also be worn to up the style quotient. Shop for men's running shoes online at Shoesly, to get a wide range of athletic shoes.</p>
        <div class="collection_section_2">
            <div class="row">
                <div class="col-md-6">
                    <div  class="about-img">
    	    				<button class="new_bt"><a style="color:white;" href="{{url('/collection')}}">New</a></button>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        </ol>
                        <div class="carousel-inner" style="height: 350px;" >
                         @foreach ($products as $product)

                       <div class="carousel-item {{$product['id']==1?'active':''}} ">
                        <div style="text-align:center">
                            <a href="detail/{{$product['id']}}">
                            <div class="shoes_img"><img style="height: 110px;" src="{{Str::startsWith($product->gallery, 'http') ? $product->gallery : asset('storage/images/1/' . $product->gallery)}}" alt="{{$product->name}}"></div>
                        </a>

                        </div>

                        <a href="detail/{{$product['id']}}">
                        <p class="sport_text">{{$product['name']}}</p>
                        <div class="dolar_text">Rs<strong style="color: #f12a47;">{{$product->price}}</strong> </div>

                        <br>
                        <div class="star_icon">
                            <button style="background-color: #0a0506; width:110px" class="more_bt">Buy Now</button>
                        </div>
                    </a>
                        <br>

                    </div>
            @endforeach
                    </div>
                </div>
                </div>
                    <button style="font-size:16px;" class="seemore_bt"><a style="color: white" href="{{url('/shoes')}}">See More</a></button>
                </div>
                {{-- 2nd new collection carousel --}}
                <div class="col-md-6">
                    <div  class="about-img2">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">


                            </ol>
                        <div class="carousel-inner" style="height: 360px;">

                            @foreach ($products as $product)

                            <div class="carousel-item {{$product['id']==3?'active':''}} ">

                        <div style="text-align:center" >


                        </div>
                        <div style="text-align:center" style="height: 110px;">
                            <a href="detail/{{$product['id']}}">
                            <div class="shoes_img"><img style="height: 110px;" src="{{Str::startsWith($product->gallery, 'http') ? $product->gallery : asset('storage/images/1/' . $product->gallery)}}" alt="{{$product->name}}"></div>
                        </a>

                        </div>

                        <a href="detail/{{$product['id']}}">
                        <p class="sport_text" style="text-align:center">{{$product['name']}}</p>
                        <div class="dolar_text">Rs<strong style="color: #f12a47;">{{$product->price}}</strong> </div>

                        <br>
                        <div class="star_icon">
                            <button style="background-color: #0a0506; width:110px" class="more_bt">Buy Now</button>
                        </div>
                    </a>
                        <br>

                    </div>
            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="collection_section">
    <div class="container-fluid">
        <h1 class="new_text"><strong>Why Shoesly</strong></h1>
        <p class="consectetur_text">Shoesly is an industry leader, providing targeted capabilities that are easy to implement and easy for everyone to use. </p>
    </div>
</div>
<div class="collectipn_section_3 layuot_padding">
    <div class="container-fluid">
        <div class="racing_shoes">
            <div class="row">
                <div class="col-md-8">
                    <div class="shoes-img3"><img src="{{asset('nowcommercestyle/contentstyle/images/shoes-img3.png')}}"></div>
                </div>
                <div class="col-md-4">
                    <div class="sale_text"><u><strong>ONLINE MARKETPLACE <br><span style="color: #0a0506;">5 STAR REVIEWS</span> <br>CLIENT RETENTION</strong></u></div>
                    <div class="number_text"><u><strong> <span style="color: #0a0506">SYSTEM UPTIME</span></strong></u></div>
                    <button class="seemore"><a style="color: white;" href="{{url('/about')}}">See More</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="collection_section layout_padding">
    <div class="container-fluid">
        <h1 class="new_text"><strong>Products</strong></h1>
        <p class="consectetur_text">Sports shoes are ideally designed to help support athletic activities, but can also be worn to up the style quotient. Shop for men’s running shoes online at Shoesly, to get a wide range of athletic shoes.</p>
    </div>
</div>
{{-- end collection section --}}
<!-- New Arrivals section start -->
<div class="layout_padding gallery_section">
    <div class="container-fluid">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-sm-4">
                <div class="best_shoes" style="height: 410px;">
                    <a href="detail/{{$product['id']}}">
                    <p class="best_text" style="text-align:center;">{{$product['name']}} </p>

                    <div class="shoes_icon" style="height: 110px;"><img style="height: 180px;" src="{{Str::startsWith($product->gallery, 'http') ? $product->gallery : asset('storage/images/1/' . $product->gallery)}}" alt="{{$product->name}}"></div>
                    <div class="star_text">
                        <div class="left_part">


                                <button style="background-color: #0a0506; width:110px" class="more_bt">Buy Now</button>
                            </a>
                        </div>
                        <div class="right_part">
                            <div class="shoes_price">Rs <span style="color: #ff4e5b;">{{$product['price']}}</span></div>
                        </div>
                    </div>

                </div>

            </div>
            <div>





        </div>
        @endforeach
    </div>
</div>
</div>

<!-- New Arrivals section end -->

<!-- Footer spacer -->
<div style="margin-bottom: 50px;"></div>

@endsection
