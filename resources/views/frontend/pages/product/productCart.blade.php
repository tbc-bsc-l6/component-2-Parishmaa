@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
@section('content')
    <div class="modal-body p-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="product-section-title mb-3 text-uppercase" id="product"> {{-- assigns an ID of product to the element --}}
                        {{ $product->name }}
                    </h2>
                </div>

                <div class="col-md-4 text-right">
                    <a href="{{ route('productpage') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>Return to previous page
                    </a>
                </div>

                <div class="col-12">
                    <div class="section-inner-bg">
                        <img src="{{ $product->hasMedia('') ? $product->getMedia('')[0]->getFullUrl() : '' }}"
                            class="img-fluid mx-auto d-block"
                            style="width: 350px; padding:10px; height: 300px; object-fit: cover;" alt="product">
                        {!! $product->description !!}
                        <br>
                        <h4>Product Details</h4>
                        <table class="table table-striped">
                            <tr>
                                <th>Brand</th>
                                <td>{!! $product->brand !!}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{!! $product->name !!}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{!! $product->price !!}</td>
                            </tr>
                            <tr>
                                <th>Available Sizes</th>
                                <td>{!! $product->availableSize !!}</td>
                            </tr>
                            <tr>
                                <th>Available Colors</th>
                                <td>{!! $product->availableColor !!}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12 text-center mb-4">
                    <h3>Order Now!</h3>
                    <div class="container">
                        <form action="{{ route('add-cart') }}" method="post">
                            @csrf
                            <input type="id" name="product_id" value="{{$product->id}}" hidden>
                            <input type="number" name="quantity" value="1" min="1" placeholder="add quantity"
                                class="form-control w-25 d-inline-block"><br><br>
                            <button type="submit" style="padding:5px;" class="btn btn-primary btn-lg">
                                <i class="fas fa-cart-plus"></i> Add to Cart
                            </button>
                            <div id="submission-result"></div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection

<style>

.container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background-color: #fff5f5;
        border: 1px solid #f2cccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    } 
    
    .btn btn-primary btn-lg {
        background-color: #b733b5;
        border-color: #b733ac;
    }

    .btn-primary:hover {
        background-color: #7c236a;
        border-color: #7c2377;
    }

    .btn-outline-secondary {
        border-color: #ddd;
    }

    .btn-outline-secondary:hover {
        border-color: #ccc;
    }
</style> 

{{-- <script>
    $(document).ready(function() {
        $('form').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            var url = $(this).attr('action');
            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                success: function(data) {
                    $('#submission-result').html('Product ID: ' + data.product_id + '<br>User ID: ' + data.user_id + '<br>Quantity: ' + data.quantity);
                }
            });
        });
    });
</script> --}}
