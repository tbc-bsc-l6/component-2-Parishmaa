@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Price Filter Section -->
        <div class="row mb-5">
            <div class="col">
                <div class="single-widget range">
                <h3 class="title text-center" style="padding-top:80px; color: #fa8888; text-decoration: none; text-transform: uppercase;">
                    Shop by Price
                </h3>
                <div class="price-filter">
    <div class="price-filter-inner">
        @php
        $max = \DB::table('products')->max('price');
        @endphp
        <form method="GET" action="{{ route('products.filter') }}">
            <div id="slider-range" data-min="0" data-max="{{ $max }}"></div>
            <div class="product_filter mt-3">
                <div class="label-input">
                    <span style="color: #fa8888; font-weight: bold;">Range:</span>
                    <input type="text" id="amount" readonly style="border: 0; font-weight: bold; color: #fa8888;">
                    <input type="hidden" name="price_range" id="price_range"
                        value="{{ request()->get('price_range', '') }}">
                </div>
                <button type="submit" class="filter_button btn btn-primary mt-2" style="background-color: #fa8888; border-color: #fa8888;">
                    Filter
                </button>
            </div>
        </form>
    </div>
</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Listing Section -->
        <div class="row mb-5">
            <div class="col text-center">
                <h1 class="news-section-title text-uppercase" id="news"
                    style="padding-top:80px; color: #fa8888; text-decoration: none;">Products</h1>
            </div>
        </div>
        <div class="row">
            @if($products->count() > 0)
                @foreach ($products as $product)
                    <div class="col-md-3 col-sm-6 text-center">
                        <a href="{{ route('productCart', $product->id) }}" style="text-decoration: none; color: inherit;">
                            <div class="productCard">
                                <img src="{{ $product->hasMedia('') ? $product->getMedia('')[0]->getFullUrl() : 'https://srv-np.techarttrekkies.com/placeholder/300x300/ffdfdf/EE00FF&text='.str_replace(' ','+',$product->name) }}"
                                    class="img-fluid w-100 productPic"
                                    style="width: 400px; padding:10px; height: 200px; object-fit: cover;"
                                    alt="{{ $product->name }}">
                                <h5 class="productName">{{ $product->name }}</h5>
                                <p class="productDescription">{{ $product->description == null ? '' : Str::limit($product->description, 60, '...') }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <p>All products are out of stock at the moment</p>
            @endif
        </div>
    </div>
@endsection

<style>
    .productCard {
        background-color: #fba2a2;
        height: 370px;
        flex-direction: column;
        align-items: center;
        padding: 5px;
        border: 10px solid #ffffff;
    }

    .productPic {
        width: 150px;
        height: 150px;
        object-fit: cover;
        object-position: center;
        border-radius: 5px;
    }

    .productName {
        font-weight: bold;
        margin-top: 10px;
    }

    .productDescription {
        font-size: 14px;
        margin-top: 10px;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
    .ui-slider-handle {
        background: #fba2a2 !important;
        border-color: #fba2a2 !important;
    }
    </style>
    <script>
    $(function () {
        var maxPrice = $('#slider-range').data('max');
        $('#slider-range').slider({
            range: true,
            min: 0,
            max: maxPrice,
            values: [0, maxPrice],
            slide: function (event, ui) {
                $('#amount').val("Rs" + ui.values[0] + " - Rs" + ui.values[1]);
                $('#price_range').val(ui.values[0] + "-" + ui.values[1]);
            }
        });
        $('#amount').val("Rs" + $('#slider-range').slider('values', 0) +
            " - Rs" + $('#slider-range').slider('values', 1));
    });
</script>