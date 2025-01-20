@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Orders</h1>

    @if ($orders->isEmpty())
        <p>No orders available.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>${{ $order->total }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $orders->links() }}
    @endif
</div>
@endsection