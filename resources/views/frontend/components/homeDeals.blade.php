@if (count($deals))

        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('dealpage') }}">
                    <h2 class="news-section-title text-uppercase wow fadeIn mb-5" data-wow-delay="0.8s" id="news"
                        style="padding-top:80px; color: #FF69B4;">Deals
                    </h2>
                </a>
                <a href="{{ url(route('dealpage')) }}" class="btn btn-secondary" style="align-self: flex-end;">View all
                    deals</a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @forelse($deals as $key=>$deal)
                    <div class="col-md-4 text-center wow fadeInRight" style="background-color: #ffdfdf;"
                        {{ $key == 1 ? 'dealCenterDash' : '' }} data-wow-delay="0.5s">
                        <img src="{{ $deal->hasMedia('deal-photo') ? $deal->getMedia('deal-photo')[0]->getFullUrl('webp') : 'https://srv-np.techarttrekkies.com/placeholder/300x300/ffc1c1/fff&text=' . str_replace(' ', '+', $deal->name) }}"
                            class="img-top mt-5 mb-3 dealImg" alt="news">
                        <h5 class="dealTitle">{{ $deal->name }}</h5>
                        <p class="dealDescription">{{ $deal->description }}</p>
                    </div>
                @empty
                    <p>We don't have any deals and discounts at the moment..</p>
                @endforelse
            </div>
        </div>
    
    @endif
    

