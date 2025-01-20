@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Edit product</h1>
    <form method="post" action="{{ route('product.update', $product->id) }}">
        @csrf

        <div class="form-group">
            <label>Category</label>
            <select name="category_id" id="category" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Brand</label>
            <input type="text" name="brand" placeholder="Brand" value="{{ $product->brand }}" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{ $product->name }}" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" placeholder="Price" value="{{ $product->price }}" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" value="{{ $product->description }}" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Available sizes</label>
            <input type="number" name="size" placeholder="size" value="{{ $product->availableSize }}" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Available colours</label>
            <input type="text" name="color" placeholder="color" value="{{ $product->availableColor }}" class="form-control" required/>
        </div>
        <div class="form-group">            
            <label>Image</label>
            <input type="file" name="img" placeholder="File" class="form-control-file" required/>
        </div>   
        {{-- <div class="col-md-12 mt-2">
            <div id="img-box"> --}}
                <img class="img-fluid"
                    src="{{ $product->hasMedia('') ? $product->getMedia('')[0]->getFullUrl() : '' }}"
                    id="previous-img" width="100">
            {{-- </div>
        </div> --}}
        <div class="form-group">
            <input type="submit" value="Update Product" class="btn btn-primary" />
        </div>

    </form>
</div>

<style>
    .container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background-color: #fff0f0;
        border: 1px solid #f2cccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"], input[type="number"], select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
    }

    input[type="file"] {
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
    }

    .btn {
        padding: 10px 20px;
        background-color: #fe75c7;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #f700ff;
    }

    #previous-img {
        margin: 20px auto;
        display: block;
    }
</style>

@endsection