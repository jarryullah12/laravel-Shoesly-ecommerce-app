<!-- Header Section -->

<style>
.header_section {
    background-color: #333;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
    padding: 0;
    transition: all 0.3s ease;
    width: 100%;
}

.header_section.scrolled {
    padding: 0;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.header_section .navbar {
    padding: 0;
    width: 100%;
    background-color: transparent !important;
}

.header_section .navbar-nav {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    width: 100%;
}

.navbar-light .navbar-nav .nav-link {
    padding: 25px 25px;
    font-weight: 600;
    color: white;
    transition: all 0.3s ease;
    text-transform: uppercase;
    font-size: 14px;
    letter-spacing: 0.5px;
    position: relative;
}

.navbar-light .navbar-nav .nav-link:hover {
    color: #ff4e5b;
}

.navbar-light .navbar-nav .nav-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 3px;
    bottom: 15px;
    left: 25px;
    background-color: #ff4e5b;
    transition: width 0.3s ease;
    border-radius: 3px;
}

.navbar-light .navbar-nav .nav-link:hover::after {
    width: calc(100% - 50px);
    background-color: #ff4e5b;
}

.navbar-light .navbar-nav .active > .nav-link,
.navbar-light .navbar-nav .nav-link.active,
.navbar-light .navbar-nav .nav-link.show,
.navbar-light .navbar-nav .show > .nav-link {
    color: #ff4e5b;
    font-weight: 700;
}

.navbar-light .navbar-nav .active > .nav-link::after,
.navbar-light .navbar-nav .nav-link.active::after {
    width: calc(100% - 50px);
}

.header_section .logo {
    padding: 5px 0;
}

.header_section .logo img {
    height: 40px;
    transition: transform 0.3s ease;
}

.header_section .logo img:hover {
    transform: scale(1.05);
}

.dropdown {
    position: relative;
}

.dropdown-content {
    position: absolute;
    background-color: white;
    min-width: 220px;
    box-shadow: 0px 8px 20px rgba(0,0,0,0.15);
    z-index: 1;
    border-radius: 10px;
    display: none;
    top: 100%;
    right: 0;
    overflow: hidden;
    transform: translateY(10px);
    opacity: 0;
    transition: all 0.3s ease;
}

.dropdown:hover .dropdown-content {
    display: block;
    transform: translateY(0);
    opacity: 1;
}

.dropdown-content a {
    padding: 14px 20px !important;
    text-decoration: none;
    display: block;
    color: #333 !important;
    font-size: 14px !important;
    font-weight: 500 !important;
    text-transform: none !important;
    letter-spacing: normal !important;
    border-bottom: 1px solid #f5f5f5;
    transition: all 0.3s ease;
}

.dropdown-content a:hover {
    background-color: #f9f9f9;
    color: #ff4e5b !important;
    padding-left: 25px !important;
}

.dropdown-content a:last-child {
    border-bottom: none;
}

.dropdown-content a i {
    margin-right: 10px;
    font-size: 16px;
}

.cart-icon {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background-color: #f9f9f9;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.cart-icon:hover {
    background-color: #ff4e5b;
}

.cart-icon:hover img {
    filter: brightness(0) invert(1);
}

.cart-icon img {
    height: 20px;
    transition: all 0.3s ease;
}

.cart-count {
    position: absolute;
    top: -8px;
    right: -8px;
    background-color: #ff4e5b;
    color: white;
    border-radius: 50%;
    width: 22px;
    height: 22px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: bold;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

.user-greeting {
    font-weight: 600;
    color: #333;
    font-size: 14px;
    padding: 0 15px;
    border-left: 1px solid #eee;
    margin-left: 10px;
}

.navbar-toggler {
    border: none;
    padding: 10px;
    outline: none !important;
    box-shadow: none !important;
}

.navbar-toggler-icon {
    width: 24px;
    height: 24px;
    background-image: none !important;
    position: relative;
}

.navbar-toggler-icon::before,
.navbar-toggler-icon::after,
.navbar-toggler-icon .middle-bar {
    content: '';
    position: absolute;
    width: 24px;
    height: 3px;
    background-color: white;
    border-radius: 3px;
    transition: all 0.3s ease;
}

.navbar-toggler-icon::before {
    top: 0;
}

.navbar-toggler-icon::after {
    bottom: 0;
}

.navbar-toggler-icon .middle-bar {
    top: 50%;
    transform: translateY(-50%);
}

.navbar-toggler[aria-expanded="true"] .navbar-toggler-icon::before {
    transform: rotate(45deg);
    top: 10px;
}

.navbar-toggler[aria-expanded="true"] .navbar-toggler-icon::after {
    transform: rotate(-45deg);
    bottom: 10px;
}

.navbar-toggler[aria-expanded="true"] .navbar-toggler-icon .middle-bar {
    opacity: 0;
}

.search-box {
    width: 100%;
    margin: 10px 15px;
}

.search-box input {
    width: 100%;
    opacity: 1;
    padding: 0 45px 0 20px;
}

@media (max-width: 992px) {
    .header_section .navbar-nav {
        flex-direction: column;
        padding: 10px 0;
        align-items: flex-start;
    }
    
    .navbar-light .navbar-nav .nav-link {
        padding: 15px;
        border-bottom: 1px solid #eee;
        width: 100%;
    }
    
    .navbar-light .navbar-nav .nav-link:last-child {
        border-bottom: none;
    }
    
    .navbar-light .navbar-nav .nav-link::after {
        bottom: 10px;
        left: 15px;
    }
    
    .dropdown-content {
        position: static;
        box-shadow: none;
        border-radius: 0;
        margin-left: 15px;
        width: 100%;
        transform: none;
        opacity: 1;
    }
    
    .dropdown:hover .dropdown-content {
        display: none;
        transform: none;
    }
    
    .dropdown.show .dropdown-content {
        display: block;
    }
    
    .user-greeting {
        border-left: none;
        margin-left: 0;
        padding: 15px;
        width: 100%;
        border-bottom: 1px solid #eee;
    }
    
    .cart-icon {
        margin: 15px;
    }
}
</style>

<div class="header_section">
    <div class="container-fluid" style="width: 100%; padding: 0;">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #333 !important; width: 100%;">
            <a class="navbar-brand" href="/laravel-Shoesly/public/">
                <img src="{{asset('nowcommercestyle/contentstyle/images/logo.png')}}" alt="Shoesly Logo" style="height: 45px; margin-right: 20px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="/laravel-Shoesly/public/">Home</a>
                    </li>
                    <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                        <a class="nav-link" href="/laravel-Shoesly/public/about">Why Shoesly</a>
                    </li>
                    <li class="nav-item {{ Request::is('shoes') ? 'active' : '' }}">
                        <a class="nav-link" href="/laravel-Shoesly/public/shoes">Shoes</a>
                    </li>
                    @if(Session::has('user'))
                    <li class="nav-item {{ Request::is('myorder') ? 'active' : '' }}">
                        <a class="nav-link" href="/laravel-Shoesly/public/myorder">My Orders</a>
                    </li>
                    <li class="nav-item {{ Request::is('add-product') ? 'active' : '' }}">
                        <a class="nav-link" href="/laravel-Shoesly/public/add-product">Add Product</a>
                    </li>
                    @endif
                    <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                        <a class="nav-link" href="/laravel-Shoesly/public/contact">Contact us</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                            @if(Session::has('user'))
                                {{Session::get('user')['name']}}
                            @else
                                Account
                            @endif
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if(Session::has('user'))
                                <a class="dropdown-item" href="/laravel-Shoesly/public/listupdate">My Profile</a>
                                <a class="dropdown-item" href="/laravel-Shoesly/public/myorder">My Orders</a>
                                <a class="dropdown-item" href="/laravel-Shoesly/public/add-product">Add Product</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/laravel-Shoesly/public/logout">Sign out</a>
                            @else
                                <a class="dropdown-item" href="/laravel-Shoesly/public/login">Sign in</a>
                                <a class="dropdown-item" href="/laravel-Shoesly/public/register">Register</a>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/laravel-Shoesly/public/cartlist" style="color: white;">
                            <img src="{{asset('nowcommercestyle/contentstyle/images/shop_icon.png')}}" height="20" alt="Cart">
                            <span class="badge badge-pill badge-danger">{{$total}}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<script>
// For mobile dropdown toggling
document.addEventListener('DOMContentLoaded', function() {
    // Handle mobile dropdown toggles
    if (window.innerWidth < 992) {
        const dropdownLinks = document.querySelectorAll('.dropdown > .nav-link');
        dropdownLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                this.parentElement.classList.toggle('show');
            });
        });
    }
    
    // Handle navbar scrolling effect
    window.addEventListener('scroll', function() {
        const header = document.querySelector('.header_section');
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
});
</script>