@extends('backend.layouts.app')

@section('content')
<!-- resources/views/deals/index.blade.php -->

<h1>Deals</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('deals.create') }}" class="btn btn-primary">Create New Deal</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Expiration Date</th>
            <th>Status</th>
            <th>Category</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($deal as $deal)
            <tr>
                <td>{{ $deal->id }}</td>
                <td>{{ $deal->name }}</td>
                <td>{{ $deal->type }}</td>
                <td>{{ $deal->price }}</td>
                <td>
                    @if ($deal->type == 'percentage')
                        {{ $deal->discount }}%
                    @else
                        ${{ $deal->discount }}
                    @endif
                </td>
                <td>{{ $deal->expiration_date }}</td>
                <td>{{ $deal->status }}</td>
                <td>{{ $deal->category->name }}</td>
                <td>
                    <a href="{{ route('deals.edit', $deal->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('deals.destroy', $deal->id) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection