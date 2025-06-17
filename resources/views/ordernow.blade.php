@extends('master')

@section('title', 'Order Checkout - Shoesly')

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

    .order-section {
        padding: 30px 0 60px;
    }

    .custom-product {
        background-color: #fff;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .cart-item {
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        border-bottom: 1px solid #eee;
        transition: all 0.3s ease;
    }

    .cart-item:hover {
        background-color: #f9f9f9;
    }

    .cart-item img {
        transition: transform 0.3s ease;
        border-radius: 5px;
    }

    .cart-item:hover img {
        transform: scale(1.05);
    }

    .table {
        margin-top: 20px;
    }

    .table th, .table td {
        padding: 12px 15px;
    }

    .form-control {
        border-radius: 8px;
        padding: 12px 15px;
        border: 1px solid #ddd;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #f74877;
        box-shadow: 0 0 5px rgba(247, 72, 119, 0.2);
    }

    textarea.form-control {
        resize: none;
        height: 100px;
    }

    .btn-primary {
        background-color: #f74877;
        border-color: #f74877;
        border-radius: 30px;
        padding: 10px 25px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #e43d6b;
        border-color: #e43d6b;
        transform: translateY(-2px);
    }

    .payment-options {
        margin-top: 20px;
    }

    .payment-option {
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .payment-option:hover {
        background-color: #f9f9f9;
    }

    .payment-option input[type="radio"] {
        margin-right: 10px;
    }
</style>
@endsection

@section('content')
@if(Session::has('user'))
<!-- Page title -->
<div class="collection_text">Checkout</div>

<!-- Order checkout section -->
<div class="order-section">
            <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="custom-product">
                    <h4 class="mb-4">Order Summary</h4>

                        <div class="cart-items">
                            @foreach ($products as $item)
                        <div class="row cart-item">
                                <div class="col-md-3">
                                <img src="{{ asset('storage/images/1/' . $item->gallery) }}" alt="{{$item->name}}" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                    <h5>{{$item->name}}</h5>
                                    <p>{{$item->description}}</p>
                                <p class="price-text">Price: ₹{{$item->price}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <hr>

                    <div class="order-summary">
                        <table class="table table-striped">
                          <tbody>
                            <tr>
                              <td>Amount</td>
                                    <td>₹{{$totalprice}}</td>
                            </tr>
                            <tr>
                              <td>Tax</td>
                                    <td>₹0</td>
                            </tr>
                            <tr>
                              <td>Delivery Charges</td>
                                    <td>₹100</td>
                            </tr>
                                <tr class="font-weight-bold">
                              <td>Total Amount</td>
                                    <td>₹{{$totalprice+100}}</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>

                    <form method="POST" action="orderplace">
                        @csrf
                        <div class="form-group">
                            <label for="address">Delivery Address</label>
                            <textarea name="address" placeholder="Enter your delivery address" class="form-control" required></textarea>
                          </div>

                          <div class="form-group">
                            <label>Payment Method</label>
                            <div class="payment-options">
                                <div class="payment-option">
                                    <input type="radio" id="online" name="payment" value="cash" required>
                                    <label for="online">Online Payment</label>
                          </div>
                                <div class="payment-option">
                                    <input type="radio" id="emi" name="payment" value="cash">
                                    <label for="emi">EMI Payment</label>
                                </div>
                                <div class="payment-option">
                                    <input type="radio" id="cod" name="payment" value="cash">
                                    <label for="cod">Payment on Delivery</label>
                    </div>
          </div>
              </div>

                        <button type="submit" class="btn btn-primary">
                            Complete Order
                        </button>
                    </form>
          </div>
    				</div>
    			</div>
    		</div>
    	</div>
@else
<script>window.location = "/login";</script>
@endif
@endsection
