<!-- resources/views/create.blade.php -->

@extends('backend.layouts.app')

@section('content')
    <div class="col-md-6 offset-md-3 py-3">
        <h1 class="text-center mb-4">Create a Product</h1>
        <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $defaultCategoryId == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" name="brand" placeholder="Brand" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" placeholder="Price" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" placeholder="Description" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="size">Available sizes</label>
                <input type="number" name="size" placeholder="size" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="color">Available colours</label>
                <input type="text" name="color" placeholder="color" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="file">Image</label>
                <input type="file" name="file" placeholder="File" class="form-control-file" required />
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Create Product</button>
            </div>
        </form>
    </div>
@endsection