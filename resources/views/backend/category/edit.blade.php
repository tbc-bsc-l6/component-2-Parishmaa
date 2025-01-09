@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit category</h1>

        <div class="container custom-form">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Name..">
                        </div>
                        <div class="form-group">
                            <label for="Type">Type</label>
                            <select name="type" class="form-control">
                                <option value="">Select a type</option>
                                @foreach($types as $type)
                                    <option value="{{ $type }}" {{ $category->type == $type ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Description..">{{ $category->description }}</textarea>
                        </div>
                        <div class="form-group">            
                            <label>Image</label>
                            <input type="file" name="img" placeholder="File" class="form-control-file" />
                            <img src="{{ $category->hasMedia('') ? $category->getMedia('')[0]->getFullUrl() : '' }}" alt="" srcset="" width="100" class="img-thumbnail">

                        </div> 
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
    }

    .form-group {
        margin-bottom: 20px;
        width: 650px;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"], input[type="number"], select {
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        width: 650px;
    }

    input[type="file"] {
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        width: 650px;
    }

    .btn {
        padding: 10px 20px;
        background-color: #fe75c7;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 650px;
    }

    .btn:hover {
        background-color: #f700ff;
    }

    #previous-img {
        margin: 20px auto;
        display: block;
    }
</style>