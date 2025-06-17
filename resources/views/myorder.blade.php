@extends('master')

@section('title', 'My Orders - Shoesly')

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
      
    .card {
        border-radius: 10px;
        overflow: hidden;
    }

    .card-header {
        background-color: #f8f9fa;
              border-bottom: 1px solid #eee;
          }
          
    .order-item {
        transition: all 0.3s ease;
          }

    .order-item:hover {
        background-color: #f9f9f9;
      }

    .order-item img {
        transition: transform 0.3s ease;
        max-height: 150px;
        object-fit: contain;
    }

    .order-item:hover img {
        transform: scale(1.05);
    }

    .badge-warning {
        background-color: #ffc107;
        color: #212529;
    }

    .badge-success {
        background-color: #28a745;
    }

    .badge-info {
        background-color: #17a2b8;
    }

    .btn-outline-secondary {
        border-color: #6c757d;
        color: #6c757d;
    }

    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: #fff;
    }

    .btn-primary {
        background-color: #f74877;
        border-color: #f74877;
    }

    .btn-primary:hover {
        background-color: #e43d6b;
        border-color: #e43d6b;
    }
      </style>
@endsection

@section('content')
<!-- Page title -->
    <div class="collection_text">My Orders</div>

<!-- Orders section -->
<div class="order-section">
    <div class="container">
        <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3">
                            <h4 class="mb-0" style="color: #333; font-weight: 600;">Your Order History</h4>
                        </div>
                        <div class="card-body p-0">
                            @if(count($orders) > 0)
                                @foreach ($orders as $item)
                                <div class="order-item p-4 border-bottom">
                                    <div class="row align-items-center">
                                        <div class="col-lg-3 col-md-4 mb-3 mb-md-0">
                                        <a href="detail/{{$item->id}}" class="d-block text-center">
                                            <img class="img-fluid rounded shadow-sm" src="{{ asset('storage/images/1/' . $item->gallery) }}" alt="{{$item->name}}">
                                            </a>
                                        </div>
                                        <div class="col-lg-6 col-md-8">
                                            <h4 style="color: #333; font-weight: 600;">{{$item->name}}</h4>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <p class="mb-2"><span style="font-weight: 600; color: #666;">Order Status:</span> 
                                                        <span class="badge badge-pill {{ $item->status == 'pending' ? 'badge-warning' : ($item->status == 'completed' ? 'badge-success' : 'badge-info') }}" 
                                                              style="font-size: 12px; padding: 5px 10px; text-transform: capitalize;">
                                                            {{$item->status}}
                                                        </span>
                                                    </p>
                                                    <p class="mb-2"><span style="font-weight: 600; color: #666;">Payment Status:</span> 
                                                        <span class="badge badge-pill {{ $item->payment_status == 'pending' ? 'badge-warning' : 'badge-success' }}" 
                                                              style="font-size: 12px; padding: 5px 10px; text-transform: capitalize;">
                                                            {{$item->payment_status}}
                                                        </span>
                                                    </p>
                                                    <p class="mb-2"><span style="font-weight: 600; color: #666;">Payment Method:</span> <span style="color: #333;">{{$item->payment_method}}</span></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-2"><span style="font-weight: 600; color: #666;">Delivery Address:</span> <span style="color: #333;">{{$item->address}}</span></p>
                                                    <p class="mb-2"><span style="font-weight: 600; color: #666;">Price:</span> <span style="color: #f74877; font-weight: 700; font-size: 18px;">₹{{$item->price}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-12 mt-3 mt-lg-0 text-center text-lg-right">
                                        <a href="detail/{{$item->id}}" class="btn btn-outline-secondary" style="border-radius: 30px; padding: 8px 20px; font-size: 14px;">
                                            <i class="fas fa-eye mr-2"></i> View Product
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="text-center py-5">
                                    <img src="{{asset('nowcommercestyle/contentstyle/images/empty-order.png')}}" alt="No Orders" style="max-width: 120px; opacity: 0.5;" class="mb-3">
                                    <h5 class="text-muted">You haven't placed any orders yet</h5>
                                <a href="shoes" class="btn btn-primary mt-3" style="border-radius: 30px; padding: 8px 25px;">
                                        Shop Now
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
@endsection
