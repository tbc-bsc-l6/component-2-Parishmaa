@if (count($products))

    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="news-section-title text-uppercase wow fadeIn mb-5" data-wow-delay="0.8s" id="news"
                style="padding-top:70px; color: #fa8888; text-decoration: none;">Products
            </h2>
            <a href="{{ url(route('productpage')) }}" class="btn btn-secondary" style="margin-left: 10px;">View all products</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @forelse($products as $key=>$product)
                <div class="col-md-4 text-center " style="padding: 10px; background-color: #ffdfdf;"
                    {{ $key == 1 ? 'productCenterDash' : '' }} data-wow-delay="0.5s">
                    <a href="{{ route('productCart', $product->id) }}" style="text-decoration: none; color: inherit;">
                    <img src="{{ $product->hasMedia('') ? $product->getMedia('')[0]->getFullUrl() : 'https://srv-np.techarttrekkies.com/placeholder/300x300/ffc1c1/fff&text=' . str_replace(' ', '+', $product->name) }}"class="img-top mt-5 mb-10 productImg" alt="news"style="width: 350px; padding:10px; height: 300px; object-fit: cover;">
                    <h5 class="productTitle" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ $product->name }}</h5>
                    {{-- <p class="productDescription" style="overflow: hidden; text-overflow: ellipsis; padding:10px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $product->description=null? '' : Str::limit($product->description,60,'...') }}</p> --}}
                    </a>
                </div>
            @empty
                <p>All products are out of stock for the moment.</p>
            @endforelse
        </div>
    </div>

@endif
