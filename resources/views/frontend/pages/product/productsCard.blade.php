<div class="col-md-4 col-sm-6">
    <p class="date-products">{{ date( strtotime($product->published_date)) }}</p>
    <a href="{{ route('cart', $product->id) }}" style="text-decoration: none; color: inherit;">
        <div class="card">
            @if($product->hasMedia('products'))
                <img src="{{ $product->getMedia('products')[0]->getFullUrl('') }}" class="card-img-top" alt="products" style="width: 100%; height: 200px; object-fit: cover;"> 
            @else
            <img src="{{'https://srv-np.techarttrekkies.com/placeholder/600x400/000/fff'.str_replace(' ','+',$product->title)}}" class="card-img-top" alt="products" style="width: 100%; height: 200px; object-fit: cover;"> 
            @endif
            <div class="card-body" style="background-color: var(--secondary);padding:25px">
                <h4 class="mb-3 text-white" style="font-weight:400; font-size:20px;font-weight:bold">
                    {{ $product->title == null ? '' : Str::limit($product->title, 20, '...') }}</h4>
            </div>
        </div>
    </a>
        
</div>
