{{dd($category)}}
<div class="col-md-4 col-sm-6">
    <p class="date-categories">{{ date( strtotime($category->published_date)) }}</p>
    <a href="{{ route('categoryProducts', $category->id) }}" style="text-decoration: none; color: inherit;">
        <div class="card">
            @if($category->hasMedia('categories'))
                <img src="{{ $category->getMedia('categories')[0]->getFullUrl('') }}" class="card-img-top" alt="categories" style="width: 100%; height: 200px; object-fit: cover;"> 
            @else
            <img src="{{'https://srv-np.techarttrekkies.com/placeholder/600x400/000/fff'.str_replace(' ','+',$category->title)}}" class="card-img-top" alt="categories" style="width: 100%; height: 200px; object-fit: cover;"> 
            @endif
            <div class="card-body" style="background-color: var(--secondary);padding:25px">
                <h4 class="mb-3 text-white" style="font-weight:400; font-size:20px;font-weight:bold">
                    {{ $category->title == null ? '' : Str::limit($category->title, 20, '...') }}</h4>
            </div>
        </div>
    </a>
</div>