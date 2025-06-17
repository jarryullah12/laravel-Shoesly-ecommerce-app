@extends('master')

@section('title', 'Profile Settings - Shoesly')

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

    .profile-section {
        padding: 30px 0 60px;
    }

    .profile-card {
        background-color: #fff;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    .profile-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .profile-table th, .profile-table td {
        padding: 15px;
        text-align: center;
        border: 1px solid #e5e5e5;
    }

    .profile-table th {
        background-color: #f8f9fa;
        font-weight: 600;
        color: #333;
    }

    .profile-table tr:hover {
        background-color: #f9f9f9;
    }

    .btn-edit {
        background-color: #28a745;
        border-color: #28a745;
        color: white;
        border-radius: 5px;
        padding: 8px 15px;
        transition: all 0.3s ease;
    }

    .btn-edit:hover {
        background-color: #218838;
        border-color: #1e7e34;
        transform: translateY(-2px);
    }

    .btn-delete {
        background-color: #dc3545;
        border-color: #dc3545;
        color: white;
        border-radius: 5px;
        padding: 8px 15px;
        transition: all 0.3s ease;
    }

    .btn-delete:hover {
        background-color: #c82333;
        border-color: #bd2130;
        transform: translateY(-2px);
    }

    .btn a {
        color: white;
        text-decoration: none;
    }

    .empty-profile {
        text-align: center;
        padding: 50px 0;
    }

    .empty-profile i {
        font-size: 50px;
        color: #ccc;
        margin-bottom: 20px;
    }
</style>
@endsection

@section('content')
<!-- Page title -->
<div class="collection_text">Profile Settings</div>

<!-- Profile settings section -->
<div class="profile-section">
    <div class="container">
    		<div class="row">
            <div class="col-lg-10 col-md-12 mx-auto">
                <div class="profile-card">
                    @if(Session::has('user'))
                        @if(count($lists) > 0)
                            <table class="profile-table">
                                <thead>
                    <tr>
                                        <th>Name</th>
                                        <th>Email Address</th>
                                        <th>Gender</th>
                                        <th>Update Account</th>
                                        <th>Delete Account</th>
                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lists as $item)
                                    <tr>
                                        <td>{{$item['name']}}</td>
                                        <td>{{$item['email']}}</td>
                                        <td>{{$item['gender']}}</td>
                                        <td>
                                            <a href="{{ url('profile/' . $item->id) }}" class="btn btn-edit">
                                                <i class="fas fa-edit mr-1"></i> Edit
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ url('delete/' . $item->id) }}" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
                                                <i class="fas fa-trash-alt mr-1"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="empty-profile">
                                <i class="fas fa-user-circle"></i>
                                <h4>No profile information found</h4>
                                <p>Your profile information appears to be missing. Please contact customer support.</p>
          </div>
                        @endif
                    @else
                        <div class="text-center py-5">
                            <h4>Please login to view your profile</h4>
                            <a href="login" class="btn btn-primary mt-3">Login Now</a>
    				</div>
                    @endif
    			</div>
    		</div>
    	</div>
    </div>
</div>
@endsection
