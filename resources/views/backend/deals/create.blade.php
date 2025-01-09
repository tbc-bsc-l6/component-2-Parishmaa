@extends('backend.layouts.app')

@section('content')

<h1>Create Deal</h1>

<form method="POST" action="{{ route('deals.store') }}">
    @csrf

    <div>
        <label for="name">Deal Name</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div>
        <label for="type">Deal Type</label>
        <select name="type" id="type">
            <option value="percentage">Percentage</option>
            <option value="fixed_amount">Fixed Amount</option>
        </select>
    </div>

    <div>
        <label for="description">Deal Description</label>
        <textarea id="description" name="description" required></textarea>
    </div>

    <div>
        <label for="price">Deal Price</label>
        <input type="number" id="price" name="price" required>
    </div>

    <div>
        <label for="discount">Deal Discount</label>
        <input type="number" id="discount" name="discount" required>
    </div>

    <div>
        <label for="expiration_date">Deal Expiration Date</label>
        <input type="date" id="expiration_date" name="expiration_date" required>
    </div>

    <div>
        <label for="status">Deal Status</label>
        <select name="status" id="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            <option value="expired">Expired</option>
        </select>
    </div>

    <button type="submit">Create Deal</button>
</form>
@endsection