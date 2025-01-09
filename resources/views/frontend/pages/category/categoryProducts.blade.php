@extends('layouts.app')

@section('content')

    <div class="modal-body p-4">
    
        <div class="container">
        
            <div class="row">
                <div class="col-md-8">
                    <h2 class="category-section-title mb-3 text-uppercase" id="category"> {{-- assigns an ID of category to the element --}}
                        {{ $category->name }}
                    </h2>
                </div>
            
                <div class="col-md-4 text-right">
                    <a href="{{ route('categorypage') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>Return to previous page
                    </a>
                </div>
            
                <div class="col-12">
                    <div class="section-inner-bg">
                        <img src="{{ $category->hasMedia('') ? $category->getMedia('')[0]->getFullUrl() : '' }}" 
                            class="img-fluid mx-auto d-block" 
                            style="width: 350px; padding:10px; height: 300px; object-fit: cover;" alt="category">
                            
                        <br>
                        <p class="fs-6">
                            {!! $category->description !!}
                        </p>
                    </div>
                </div>
            
                <div class="row">
                    @if ($products->count() > 0)
                        @foreach ($products as $product)
                                <div class="col-md-3 col-sm-6 text-center">
                                    <a href="{{ route('productCart', $product->id) }}" style="text-decoration: none; color: inherit;">
                                        <div class="categoryCard">
                                            <img src="{{ $product->hasMedia('') ? $product->getMedia('')[0]->getFullUrl() : 'https://srv-np.techarttrekkies.com/placeholder/300x300/ffdfdf/EE00FF&text=' . str_replace(' ', '+', $product->name) }}" 
                                                class="img-fluid w-100 categoryPic " alt="{{ $product->name }}">
                                            <h5 class="categoryName">{{ $product->name }}</h5>
                                        <p class="categoryDescription">{{ $product->description=null? '' : Str::limit($product->description,60,'...') }}</p>

                                        </div>
                                    </a>
                                </div>
                        @endforeach
                    @else
                        <p>All products are out of stock at the moment</p>
                    @endif
                </div>
            
            </div>
        </div>
    </div>

@endsection