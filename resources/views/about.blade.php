@extends('master')

@section('title', 'About Us - Shoesly')

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
   
    .about-section {
        padding: 40px 0 80px;
   }
   
    .about-title {
        font-size: 32px;
        font-weight: 700;
        color: #333;
        margin-bottom: 40px;
        text-align: center;
    }

    .about-content {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        padding: 40px;
    }

    .about-text {
        font-size: 16px;
        line-height: 1.8;
        color: #555;
   }
   
    .about-features {
        margin-top: 30px;
        list-style: none;
        padding: 0;
   }
   
    .about-features li {
        padding: 15px 20px;
        margin-bottom: 10px;
        background-color: #f9f9f9;
        border-radius: 8px;
        font-weight: 600;
        color: #333;
        transition: all 0.3s ease;
        border-left: 4px solid #f74877;
    }

    .about-features li:hover {
       background-color: #f74877;
        color: white;
        transform: translateX(5px);
   }
   
    .about-image {
        display: flex;
        align-items: center;
        justify-content: center;
   }
   
    .about-image img {
        max-height: 350px;
        width: auto;
        transition: all 0.5s ease;
    }

    .about-image img:hover {
        transform: scale(1.05) rotate(2deg);
    }
   </style>
@endsection

@section('content')
<!-- Page title -->
<div class="collection_text">About Us</div>

<!-- About content section -->
<div class="about-section">
    <div class="container">
        <h1 class="about-title">Why Choose Shoesly</h1>
        <div class="about-content">
            <div class="row">
    					<div class="col-md-8">
                    <div class="about-text">
                        <p>Shoesly was founded in 2003 and is dedicated to providing powerful, affordable, and easy-to-use e-commerce software to manufacturers, distributors, and wholesalers who use QuickBooks.</p>

                        <p>Shoesly is an industry leader, providing targeted capabilities that are easy to implement and easy for everyone to use. Our success has come from our dedication to meeting the unique needs of manufacturing and wholesale businesses. This sharp focus has allowed us to provide best-in-the-industry features, support, and robust two-way integration with QuickBooks Desktop.</p>
    					</div>

                    <ul class="about-features">
                        <li>ONLINE MARKETPLACE</li>
                        <li>5 STAR REVIEWS</li>
                        <li>CLIENT RETENTION</li>
                        <li>SYSTEM UPTIME</li>
                    </ul>
    					</div>
                <div class="col-md-4 about-image">
                    <img src="{{asset('nowcommercestyle/contentstyle/images/shoes-img3.png')}}" alt="About Shoesly">
    				</div>
    			</div>
    		</div>
    </div>
</div>
@endsection
