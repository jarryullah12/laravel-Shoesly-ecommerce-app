@extends('master')

@section('title', 'Shopping Cart - Shoesly')

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

    .cart-list-devider {
        border-bottom: 1px solid #ccc;
        margin-bottom: 20px;
        padding-bottom: 20px;
    }

    .trending-img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        transition: transform 0.3s ease;
    }

    .trending-img:hover {
        transform: scale(1.05);
    }

    .custom-product {
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }

    .search-item {
        background-color: #fff;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .btn-warning {
        background-color: #ff6b6b;
        border-color: #ff6b6b;
        color: white;
        transition: all 0.3s ease;
    }

    .btn-warning:hover {
        background-color: #ff5252;
        border-color: #ff5252;
        transform: translateY(-2px);
    }

    .btn-danger {
        background-color: #f74877;
        border-color: #f74877;
        transition: all 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #e43d6b;
        border-color: #e43d6b;
        transform: translateY(-2px);
    }
</style>
@endsection

@section('content')
<!-- Page title -->
<div class="collection_text">Shopping Cart</div>

<!-- Cart content -->
    <div class="layout_padding contact_section">
        @if(Session::has('success'))
        <div class="container">
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
        @endif

        @if(Session::has('error'))
        <div class="container">
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        </div>
        @endif

    <div class="container">
    		<div class="row">
            <div class="col-md-12">
                <div class="custom-product">
                    <div class="trending-wrapper">
                           @if(count($products) > 0)
                        <a class="btn btn-danger mb-4" href="{{ url('ordernow') }}">Order Now</a>
                        @foreach ($products as $item)
                            <div class="row search-item cart-list-devider">
                            <div class="col-sm-3">
                                  <a href="detail/{{$item->id}}">
                                    <img class="trending-img" src="{{ asset('storage/images/1/' . $item->gallery) }}" alt="{{ $item->name }}">
                                      </a>
                              </div>
                              <div class="col-sm-6">
                                <div class="product-details">
                                        <h3>{{$item->name}}</h3>
                                        <h5>{{$item->description}}</h5>
                                    <h4 class="price-text mt-3">Rs. {{$item->price}}</h4>
                                        </div>
                              </div>
                            <div class="col-sm-3 d-flex align-items-center justify-content-end">
                                <a href="{{ url('removecart/' . $item->cart_id) }}" class="btn btn-warning">
                                    <i class="fas fa-trash-alt mr-2"></i> Remove
                                </a>
                            </div>
                            </div>
                          @endforeach

                          @else
                          <div class="alert alert-info">
                            <h4>Your cart is empty</h4>
                            <p>Explore our collection of shoe products and add items to your cart.</p>
                            <a href="http://localhost/laravel-Shoesly/public/shoes" class="btn btn-primary">Shop Now</a>
                          </div>
                          @endif
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
@endsection
