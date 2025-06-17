@extends('master')

@section('title', 'Profile Settings - Shoesly')

@section('styles')
<!-- Material Design Iconic Font -->
<link rel="stylesheet" href="{{ asset('nowcommercestyle/fonts/material-design-iconic-font/css/material-design-iconic-font.css') }}">
<link rel="stylesheet" href="{{ asset('nowcommercestyle/fonts/material-design-iconic-font/css/material-design-iconic-font.min') }}">
<!-- Custom Profile CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('nowcommercestyle/css/style.css') }}">
<style>
    .profile-section {
        padding: 40px 0;
        background-color: #f9f9f9;
    }

    .profile-card {
        background-color: #fff;
            border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        padding: 30px;
        margin-bottom: 30px;
    }
    
    .profile-header {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }

    .profile-image {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 20px;
        background-color: #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-image i {
        font-size: 60px;
        color: #ccc;
    }

    .profile-image img {
            width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-info h2 {
        margin: 0;
        color: #333;
        font-weight: 600;
    }

    .profile-info p {
        margin: 5px 0 0;
        color: #777;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
    }
    
    .form-control {
        height: 50px;
        border-radius: 6px;
        border: 1px solid #ddd;
        padding: 10px 15px;
        width: 100%;
        font-size: 15px;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: #f74877;
        box-shadow: 0 0 0 0.2rem rgba(247, 72, 119, 0.25);
    }
    
    .form-select {
        height: 50px;
        border-radius: 6px;
        border: 1px solid #ddd;
        padding: 10px 15px;
        width: 100%;
        font-size: 15px;
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 16px 12px;
    }

    .form-text {
        color: #6c757d;
        font-size: 14px;
        margin-top: 5px;
    }
    
    .form-control.is-invalid, 
    .form-select.is-invalid {
        border-color: #dc3545;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
    }

    .btn-update {
        background-color: #f74877;
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-update:hover {
        background-color: #e73968;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(247, 72, 119, 0.3);
    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 6px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .collection_text {
            width: 100%;
        float: left;
        font-size: 40px;
        color: #ffffff;
            text-align: center;
        font-weight: bold;
        background-color: #f74877;
        padding: 30px 0;
        margin-bottom: 40px;
    }

    .password-group {
        position: relative;
    }

    .toggle-password {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #999;
    }

    .profile-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    @media (max-width: 767px) {
        .profile-header {
            flex-direction: column;
            text-align: center;
        }

        .profile-image {
            margin-right: 0;
            margin-bottom: 20px;
        }
    }
    </style>
@endsection

@section('content')
<div class="collection_text">My Profile</div>

<div class="profile-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Profile Card -->
                <div class="profile-card">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    </div>
                    @endif

                    @if(isset($user) && is_object($user))
                    <!-- Profile Header -->
                    <div class="profile-header">
                        <div class="profile-image">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="profile-info">
                            <h2>{{ $user->name }}</h2>
                            <p>{{ $user->email }}</p>
                        </div>
                    </div>
                    
                    <!-- Profile Form -->
                    <form method="POST" action="{{ url('/profile') }}" id="profileForm">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                    </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror" required>
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    <script>
                                        // Ensure gender is properly selected
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const genderSelect = document.getElementById('gender');
                                            const currentGender = "{{ old('gender', $user->gender) }}";
                                            if (currentGender) {
                                                for (let i = 0; i < genderSelect.options.length; i++) {
                                                    if (genderSelect.options[i].value === currentGender) {
                                                        genderSelect.options[i].selected = true;
                                                        break;
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                    @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <h4 class="mt-4 mb-3">Change Password</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group password-group">
                                    <label for="password" class="form-label">New Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                    <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility('password')"></i>
                                    <small class="form-text">
                                        Leave blank to keep current password. If changing, password must:
                                        <ul class="mt-1">
                                            <li>Be 12-32 characters long</li>
                                            <li>Include letters, numbers, and special characters (!@$#%)</li>
                                        </ul>
                                    </small>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group password-group">
                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" name="confirm_password">
                                    <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility('confirm_password')"></i>
                                    @error('confirm_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="profile-actions">
                            <a href="{{ url('/') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-2"></i> Back to Home
                            </a>
                            <button type="submit" class="btn btn-update btn-lg">
                                <i class="fas fa-save mr-2"></i> Update Profile
                            </button>
                        </div>
                    </form>
                    @else
                    <div class="text-center py-5">
                        <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                        <h4>User Profile Not Available</h4>
                        <p class="text-danger">User profile data is not available. Please log in to update your profile.</p>
                        <a href="{{ url('/login') }}" class="btn btn-primary mt-3">Log In</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function togglePasswordVisibility(fieldId) {
        const passwordField = document.getElementById(fieldId);
        const fieldType = passwordField.getAttribute('type');

        if (fieldType === 'password') {
            passwordField.setAttribute('type', 'text');
            event.target.classList.remove('fa-eye');
            event.target.classList.add('fa-eye-slash');
        } else {
            passwordField.setAttribute('type', 'password');
            event.target.classList.remove('fa-eye-slash');
            event.target.classList.add('fa-eye');
        }
    }
    
    // Form validation
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('profileForm');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');
        
        // Prevent any click events from bubbling up and causing navigation
        form.addEventListener('click', function(event) {
            event.stopPropagation();
        });
        
        form.addEventListener('submit', function(event) {
            // Prevent the default form submission
            event.preventDefault();
            
            // Reset previous error states
            password.classList.remove('is-invalid');
            confirmPassword.classList.remove('is-invalid');
            
            let isValid = true;
            
            // If both password fields have values, check if they match
            if (password.value && confirmPassword.value) {
                if (password.value !== confirmPassword.value) {
                    // Show error
                    confirmPassword.classList.add('is-invalid');
                    
                    // Create or update error message
                    let errorDiv = confirmPassword.nextElementSibling.nextElementSibling;
                    if (!errorDiv || !errorDiv.classList.contains('invalid-feedback')) {
                        errorDiv = document.createElement('div');
                        errorDiv.classList.add('invalid-feedback');
                        confirmPassword.parentNode.appendChild(errorDiv);
                    }
                    errorDiv.textContent = 'Passwords do not match';
                    
                    isValid = false;
                }
            }
            
            // If password is provided, check if it meets requirements
            if (password.value) {
                const passwordRegex = /^.*(?=.{12,32})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/;
                if (!passwordRegex.test(password.value)) {
                    // Show error
                    password.classList.add('is-invalid');
                    
                    // Create or update error message
                    let errorDiv = password.nextElementSibling.nextElementSibling.nextElementSibling;
                    if (!errorDiv || !errorDiv.classList.contains('invalid-feedback')) {
                        errorDiv = document.createElement('div');
                        errorDiv.classList.add('invalid-feedback');
                        password.parentNode.appendChild(errorDiv);
                    }
                    errorDiv.textContent = 'Password must be 12-32 characters and include letters, numbers, and special characters (!@$#%)';
                    
                    isValid = false;
                }
            }
            
            // If the form is valid, submit it
            if (isValid) {
                form.submit();
            }
        });
    });
</script>
@endsection