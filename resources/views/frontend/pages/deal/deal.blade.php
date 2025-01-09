@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="team-section">
            <div class="row">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col text-center">
                            <p class="galleryTitle">Deals and Discounts</p>
                        </div>
                    </div>
                    <div class="row">
                        @if($deals->count() > 0)
                            @foreach ($deals as $deal)
                                <div class="col-md-3 col-sm-6 text-center">
                                    <div class="dealCard">
                                        <img src="{{ $deal->hasMedia('deal-photo') ? $deal->getMedia('deal-photo')[0]->getFullUrl('webp') : 'https://srv-np.techarttrekkies.com/placeholder/300x300/ffdfdf/fff&text='.str_replace(' ','+',$deal->name) }}"
                                            class="img-fluid w-100 dealPic "
                                            alt="{{ $deal->name }}">
                                        <h5 class="dealName">{{ $deal->name }}</h5>
                                        <p class="dealDescription">{{ $deal->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>All deals are out of stock at the moment</p>
                        @endif
                    </div>
                    <div class="row">
                        <div class="paginationClass">
                            {!! $deals->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
.dealCard {
    background-color: #ffc1c1; 
}
</style>
