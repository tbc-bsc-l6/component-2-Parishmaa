@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-9">
                <div class="wsus__cart_list">
                    <div class="table-responsive">
                        <table>
                            <tbody>
                                <tr class="d-flex">
                                    <th class="product-id">
                                        product id
                                    </th>

                                    <th class="user-id">
                                        user id
                                    </th>

                                    <th class="quantity">
                                        quantity
                                    </th>
                                    <th class="">
                                        <a href="#" class="common_btn clear_cart">clear cart</a>
                                    </th>
                                </tr>
                    </div>
                </div>
            @endsection
