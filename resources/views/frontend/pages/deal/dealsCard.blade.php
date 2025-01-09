<div class="col-md-4 col-sm-6" data-wow-delay="0.8s">
    <p class="date-deals">{{ date('j \\ F Y', strtotime($deal->published_date)) }}</p>
    {{-- <a href="{{ route('dealGallery', $deal->id) }}" style="text-decoration: none; color: inherit;"> --}}
        <div class="card" style="width: 250px; height: 360px;">
            @if($deal->hasMedia('deals'))
                <img src="{{ $deal->getMedia('deals')[0]->getFullUrl('webp') }}" class="card-img-top" alt="deals" style="width: 100%; height: 200px; object-fit: cover;"> 
            @else
            <img src="{{'https://srv-np.techarttrekkies.com/placeholder/600x400/000/fff'.str_replace(' ','+',$deal->title)}}" class="card-img-top" alt="deals" style="width: 100%; height: 200px; object-fit: cover;"> 
            @endif
            <div class="card-body" style="background-color: var(--secondary);padding:25px">
                <h4 class="mb-3 text-white" style="font-weight:400; font-size:20px;font-weight:bold">
                    {{ $deal->title == null ? '' : Str::limit($deal->title, 20, '...') }}</h4>
        </div>
    </a>
</div>