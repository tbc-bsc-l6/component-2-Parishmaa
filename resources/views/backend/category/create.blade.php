@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Create a category</h1>

    <div class="container custom-form" style="max-width: 600px; margin: 40px auto; padding: 20px; background-color: #f9f9f9; border: 1px solid #ccc; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <form action='{{route('category.store')}}' method='post' style="margin-top: 20px;" enctype="multipart/form-data">

                    <div class="form-group" style="margin-bottom: 20px;">
                        @csrf
                        <label for="Name" style="display: block; margin-bottom: 10px;">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name.." style="padding: 10px; width:550px; border: 1px solid #ccc; border-radius: 5px;" required>
                    </div>

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label for="Type" style="display: block; margin-bottom: 10px;">Type</label>
                        <select name="type" class="form-control" style="padding: 10px; width:550px; border: 1px solid #ccc; border-radius: 5px;">
                            <option value="">Select a type</option>
                            @foreach($types as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label for="Description" style="display: block; margin-bottom: 10px;">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3" placeholder="Description.." style="padding: 10px; width:550px; border: 1px solid #ccc; border-radius: 5px;" required></textarea>
                    </div>

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label for="file" style="display: block; margin-bottom: 10px;">Image</label>
                        <input type="file" name="file" placeholder="File" class="form-control-file" style="width:550px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
                    </div>

                    <button type="submit" class="btn btn-primary" style="background-color: #e656dc; width:550px; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Create category</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection