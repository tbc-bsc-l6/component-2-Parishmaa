@extends('backend.layouts.app')

@section('content')
    <div class="col py-3">
        <h1 style="color:#ff6c84">Product</h1>
        <div>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div>
            <a class="btn btn-primary" href="{{ route('product.create') }}" role="button" style="color:pink"> New Product </a>
        </div>
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Available Sizes</th>
                    <th>Available Colors</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->category_id ? $product->category->name : '' }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->availableSize }}</td>
                        <td>{{ $product->availableColor }}</td>
                        <td>
                            <img src="{{ $product->hasMedia('') ? $product->getMedia('')[0]->getFullUrl() : '' }}" alt="" srcset="" width="100" class="img-thumbnail">
                        </td>
                        <td>
                            <a href="{{ route('product.edit', ['product' => $product]) }}" class="btn btn-sm btn-primary">Edit</a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('product.destroy', ['product' => $product]) }}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<style>
    .table {
        margin-top: 20px;
    }
    .table thead th {
        background-color: #ff6c84;
        color: #000000;
        border-bottom: 2px solid #ff6c84;
    }
    .table tbody tr:hover {
        background-color: #ffe6e6;
    }
    .table td {
        vertical-align: middle;
    }
    .img-thumbnail {
        border: none;
        border-radius: 5px;
        padding: 5px;
    }
    .btn-sm {
        padding: 5px 10px;
        font-size: 12px;
    }
</style>