@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row mb-5">
                <div class="col text-center">
                    <h1 class="news-section-title text-uppercase" id="news"
                        style="padding-top:80px; color: #fa8888; text-decoration: none;">Products
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        @if($products->count() > 0)
                            @foreach ($products as $product)
                                <div class="col-md-3 col-sm-6 text-center">
                                    <a href="{{ route('productCart', $product->id) }}" style="text-decoration: none; color: inherit;">
                                        
                                        <div class="productCard">
                                            <img src="{{ $product->hasMedia('') ? $product->getMedia('')[0]->getFullUrl() : 'https://srv-np.techarttrekkies.com/placeholder/300x300/ffdfdf/EE00FF&text='.str_replace(' ','+',$product->name) }}"
                                                class="img-fluid w-100 productPic " style="width: 400px; padding:10px; height: 200px; object-fit: cover;"
                                                alt="{{ $product->name }}">
                                            <h5 class="productName">{{ $product->name }}</h5>
                                            <p class="productDescription">{{ $product->description=null? '' : Str::limit($product->description,60,'...') }}</p>
                                        </div> 
                                    </a>

                                </div>
                            @endforeach
                        @else
                            <p>All products are out of stock at the moment</p>
                        @endif
                    </div>
                    {{-- <div class="row mt-3 text-center">
                        <div class="paginationClass">
                            {!! $products->links() !!} 
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    {{-- </div> --}}
@endsection

<style>
.productCard {
    background-color: #fba2a2; 
    /* width: 290px;  */
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