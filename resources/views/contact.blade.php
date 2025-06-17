@extends('master')

@section('title', 'Contact Us - Shoesly')

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
      
    .contact_section {
        padding: 20px 0 60px;
          }
          
    .new_text {
        font-size: 28px;
        font-weight: bold;
        color: #333;
              margin-bottom: 30px;
        text-align: center;
          }

    .contact_form {
        background-color: #fff;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
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
        height: 150px;
    }

    .btn-primary {
        background-color: #f74877;
        border-color: #f74877;
        border-radius: 30px;
        padding: 10px 30px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #e43d6b;
        border-color: #e43d6b;
        transform: translateY(-2px);
    }
      </style>
@endsection

@section('content')
<!-- Page title -->
    <div class="collection_text">Contact Us</div>

<!-- Contact form section -->
<div class="contact_section">
    <div class="container">
        <h1 class="new_text">Get In Touch With Us</h1>
    		<div class="row">
    			<div class="col-md-8 mx-auto">
    				<div class="contact_form">
                        <form action="/contact" method="POST" class="mt-4">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Your Name" name="name" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control" placeholder="Your Email" name="email" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="tel" class="form-control" placeholder="Your Phone Number" name="phone">
                            </div>
                            <div class="form-group mb-4">
                                <textarea class="form-control" rows="5" placeholder="Your Message" name="message" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-5">Send Message</button>
                            </div>
                        </form>
                    </div>
    			</div>
    		</div>
    	</div>
    </div>
@endsection
