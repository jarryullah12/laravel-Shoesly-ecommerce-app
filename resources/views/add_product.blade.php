@extends('master')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Add New Product</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ url('add-product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Product Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" step="0.01" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="category">Category</label>
                            <input type="text" name="category" id="category" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="image">Main Product Image</label>
                            <input type="file" name="image" id="image" class="form-control" required>
                            <small class="text-muted">Supported formats: JPG, JPEG, PNG, GIF. Max size: 2MB</small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="gallery">Gallery Image 1</label>
                            <input type="file" name="gallery" id="gallery" class="form-control">
                            <small class="text-muted">Supported formats: JPG, JPEG, PNG, GIF. Max size: 2MB</small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="gallery2">Gallery Image 2</label>
                            <input type="file" name="gallery2" id="gallery2" class="form-control">
                            <small class="text-muted">Supported formats: JPG, JPEG, PNG, GIF. Max size: 2MB</small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="gallery3">Gallery Image 3</label>
                            <input type="file" name="gallery3" id="gallery3" class="form-control">
                            <small class="text-muted">Supported formats: JPG, JPEG, PNG, GIF. Max size: 2MB</small>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                            <a href="{{ url('/') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection