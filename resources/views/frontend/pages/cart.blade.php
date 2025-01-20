@extends('layouts.app')

@section('content')
    <div class="container cart-container">
        <div class="row">
            <div class="col-xl-9">
                <div class="wsus__cart_list">
                    <div class="table-responsive">
                        <h4 class="cart-title">Cart Product Details</h4>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <th class="text-uppercase">SN</th>
                                <th class="text-uppercase">Product </th>
                                <th class="text-uppercase">User Name</th>
                                <th class="text-uppercase">Quantity</th>
                                <th class="text-uppercase">Price</th>
                                <th class="text-uppercase">Total Price</th>
                                <th class="text-uppercase">Action</th>
                            </thead>
                            <tbody>
                                @if (isset($cartLists))
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach ($cartLists as $cartData)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{!! $cartData->product->name ?? 'N/A' !!}</td>
                                            <td>{!! isset($user) ? $user : 'N/A' !!}</td>
                                            <td>{!! $cartData->quantity !!}</td>
                                            <td>${!! number_format($cartData->product->price, 2) !!}</td>
                                            <td>${!! number_format($cartData->quantity * $cartData->product->price, 2) !!}</td>
                                            <td>

                                                <a href="{{ route('remove', $cartData->id) }}">
                                                    <button type="submit" class="btn btn-danger">Remove</button>
                                                </a>
                                            </td>
                                        </tr>
                                        @php
                                            $totalPrice += $cartData->quantity * $cartData->product->price;
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="6" class="text-right">Total Price:</td>
                                        <td><strong>${!! number_format($totalPrice, 2) !!}</strong></td>
                                    </tr>
                                @else
                                No cart data                              @endif

                            </tbody>
                        </table>
                        <form method="POST" action="{{ route('checkout') }}">
                            @csrf
                            <button type="submit" id="checkout-btn">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .cart-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .cart-title {
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }

    .table-striped {
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    .table-striped th,
    .table-striped td {
        border: none;
        padding: 15px;
        text-align: left;
    }

    .table-striped th {
        background-color: #f7f7f7;
        font-weight: bold;
        color: #333;
    }

    .table-striped tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .text-uppercase {
        text-transform: uppercase;
    }

    .table-striped tr:not(:last-child) {
        border-bottom: 1px solid #ffd7d7;
        margin-bottom: 20px;
    }

    #checkout-btn {
        background-color: #4CAF50;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    #checkout-btn:hover {}
</style>
