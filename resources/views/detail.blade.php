
<?php
use App\Http\Controllers\ProductController;
$total=0;
if(Session::has('user'))
{
  $total=ProductController::cartItem();
}
?>
@extends('master')

@section('title', 'Product Details - Shoesly')

@section('styles')
<style>
/* Custom styles for product detail page */
</style>
@endsection

@section('content')
<!-- contact section start -->
<div class="collection_text">Details for product</div>
    <div class="layout_padding contact_section" style="background-color: #f9f9f9; padding: 40px 0;">

    	<div class="container-fluid px-4">
    		<div class="row">



                            <div class="col-lg-6 col-md-6 mb-4">
                                <div class="card shadow-sm border-0 p-3 bg-white">
                                    <div class="product-main-image text-center mb-4">
                                        <img id="mainImage" class="img-fluid" style="max-height: 350px; object-fit: contain;" src="{{ asset('storage/images/1/' . $product['gallery'] ) }}" alt="{{$product['name']}}">
                                    </div>
                                    <div class="product-thumbnails d-flex justify-content-center">
                                        <div class="thumbnail-item mx-2 border p-2" style="cursor: pointer;" onclick="document.getElementById('mainImage').src='{{ asset('storage/images/1/' . $product['gallery'] ) }}'">
                                            <img src="{{ asset('storage/images/1/' . $product['gallery'] ) }}" style="height: 80px; width: auto;" alt="Thumbnail 1">
                                        </div>
                                        <div class="thumbnail-item mx-2 border p-2" style="cursor: pointer;" onclick="document.getElementById('mainImage').src='{{ asset('storage/images/1/' . $product['gallery2'] ) }}'">
                                            <img src="{{ asset('storage/images/1/' . $product['gallery2'] ) }}" style="height: 80px; width: auto;" alt="Thumbnail 2">
                                        </div>
                                        <div class="thumbnail-item mx-2 border p-2" style="cursor: pointer;" onclick="document.getElementById('mainImage').src='{{ asset('storage/images/1/' . $product['gallery3'] ) }}'">
                                            <img src="{{ asset('storage/images/1/' . $product['gallery3'] ) }}" style="height: 80px; width: auto;" alt="Thumbnail 3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="card shadow-sm border-0 p-4 bg-white h-100">
                                    <h1 class="product-title mb-3" style="color: #333; font-size: 28px; font-weight: bold;">{{$product['name']}}</h1>
                                    <div class="price-container mb-3">
                                        <h2 class="price" style="color: #f74877; font-weight: bold; font-size: 24px;">₹ {{$product['price']}}</h2>
                                    </div>
                                    <div class="category mb-2">
                                        <span class="badge" style="background-color: #f0f0f0; color: #666; font-size: 14px; padding: 5px 10px; border-radius: 20px;">{{$product['category']}}</span>
                                    </div>
                                    <div class="description my-4">
                                        <h5 class="mb-2" style="font-weight: 600; color: #555;">Description</h5>
                                        <p style="color: #666; line-height: 1.6;">{{$product['description']}}</p>
                                    </div>
                                    <div class="add-to-cart-section mt-auto">
                                        <form action="http://localhost/laravel-Shoesly/public/add_to_cart" method="POST">
                                            <input type="hidden" name="product_id" value="{{$product['id']}}">
                                            @csrf
                                            <button type="submit" class="btn btn-lg w-100" style="background-color: #f74877; color: white; border: none; padding: 12px; border-radius: 30px; font-weight: 600; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#d63867'" onmouseout="this.style.backgroundColor='#f74877'">Add to Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>




    		</div>
    	</div>
    </div>
    
    <!-- Related Products Section -->
    <div class="container-fluid px-4 mb-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center mb-4" style="color: #333; font-weight: bold;">Related Products</h2>
            </div>
        </div>
        <div class="row">
            @if(count($relatedProducts) > 0)
                @foreach($relatedProducts as $relatedProduct)
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <a href="/laravel-Shoesly/public/detail/{{$relatedProduct['id']}}" class="text-decoration-none">
                            <div class="text-center p-3">
                                <!-- Try multiple image sources to ensure at least one works -->
                                <img
                                    src="{{ $relatedProduct['image'] ? asset($relatedProduct['image']) :
                                        ($relatedProduct['gallery'] ? asset('storage/images/1/' . $relatedProduct['gallery']) :
                                        asset('nowcommercestyle/contentstyle/images/shoes-img1.png')) }}"
                                    class="card-img-top"
                                    style="height: 180px; object-fit: contain;"
                                    alt="{{$relatedProduct['name']}}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title" style="color: #333; font-weight: 600;">{{$relatedProduct['name']}}</h5>
                                <p class="card-text text-truncate" style="color: #666;">{{$relatedProduct['description']}}</p>
                                <p class="card-text" style="color: #f74877; font-weight: bold;">₹ {{$relatedProduct['price']}}</p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12">
                    <p class="text-center">No related products found.</p>
                </div>
            @endif
        </div>
    </div>
    <!-- Related Products Section End -->
    
    	<!-- contact section end -->
 <!-- section footer start -->

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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
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
      <style>
* {
  box-sizing: border-box;
}

.zoom {
  padding: 50px;
  transition: transform .2s;
  background-color: rgb(245, 238, 238);
  width: 400px;
  height: 300px;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.5);
}
</style>
<style>
* {
  box-sizing: border-box;
}

.zoomsecond {
  padding: 50px;
  transition: transform .2s;
  background-color: rgb(245, 238, 238);
  width: 400px;
  height: 200px;
  margin: 0 auto;
}

.zoomsecond:hover {
  -ms-transform: scale(1.0); /* IE 9 */
  -webkit-transform: scale(1.0); /* Safari 3-8 */
  transform: scale(1.0);
}
</style>
@endsection
