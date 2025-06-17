@extends('auth_layout')

@section('title', 'Login - Shoesly')

@section('styles')
<link rel="stylesheet" href="{{ asset('nowcommercestyle/fonts/material-design-iconic-font/css/material-design-iconic-font.css') }}">
<style>
    .login-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background-image: url('{{ asset('nowcommercestyle/images/bg-registration-form-1.jpg')}}');
        background-size: cover;
        background-position: center;
        padding: 0;
    }
    
    .login-inner {
        max-width: 850px;
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        display: flex;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
    }
    
    .image-holder {
        width: 50%;
    }
    
    .image-holder img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .form-container {
        width: 50%;
        padding: 40px;
    }
    
    .form-logo {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .form-logo img {
        height: 60px;
    }
    
    .form-wrapper {
        position: relative;
        margin-bottom: 25px;
    }
    
    .form-control {
        border: 1px solid #ddd;
        border-radius: 25px;
        padding: 12px 25px;
        width: 100%;
        font-size: 14px;
    }
    
    .form-control:focus {
        border-color: #f74877;
        box-shadow: 0 0 5px rgba(247, 72, 119, 0.2);
        outline: none;
    }
    
    .form-wrapper i {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
    }
    
    .login-btn {
        width: 100%;
        border: none;
        border-radius: 25px;
        padding: 12px;
        background: #f74877;
        color: #fff;
        font-weight: 600;
        cursor: pointer;
        text-transform: uppercase;
        font-size: 14px;
        transition: all 0.3s ease;
    }
    
    .login-btn:hover {
        background: #e43d6b;
        transform: translateY(-2px);
    }
    
    .login-btn i {
        margin-left: 5px;
    }
    
    .register-link {
        text-align: center;
        margin-top: 20px;
    }
    
    .register-link a {
        color: #f74877;
        text-decoration: none;
    }
    
    .error-msg {
        color: #ff5252;
        font-size: 12px;
        margin-top: 5px;
        display: block;
    }
    
    @media (max-width: 767px) {
        .login-inner {
            flex-direction: column;
        }
        
        .image-holder {
            width: 100%;
            height: 200px;
        }
        
        .form-container {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
<div class="login-wrapper">
    <div class="login-inner">
        <div class="image-holder">
            <img src="{{asset('nowcommercestyle/images/registration-form-1.jpg')}}" alt="Login background">
        </div>
        <div class="form-container">
            <div class="form-logo">
                <img src="{{asset('nowcommercestyle/images/logo.png')}}" alt="Shoesly Logo">
            </div>
            
            <form action="login" method="POST">
                @csrf
                <div class="form-wrapper">
                    <input type="email" name="email" placeholder="Email Address" class="form-control">
                    <i class="zmdi zmdi-email"></i>
                    @error('email')
                    <span class="error-msg">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-wrapper">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                    <i class="zmdi zmdi-lock"></i>
                    @error('password')
                    <span class="error-msg">{{$message}}</span>
                    @enderror
                </div>

                <button type="submit" class="login-btn">
                    Sign In
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
            </form>
            
            <div class="register-link">
                <p>Don't have an account? <a href="http://localhost/laravel-Shoesly/public/register">Register here</a></p>
            </div>
        </div>
    </div>
</div>
@endsection