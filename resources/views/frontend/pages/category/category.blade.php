@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="team-section">
            <div class="row">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col text-center">
                            <h1 class="news-section-title text-uppercase wow fadeIn mb-5" data-wow-delay="0.8s" id="news"
                style="padding-top:80px; color: #fa8888; text-decoration: none;">Categories
            </h1>
                        </div>
                    </div>
                    <div class="row">
                        @if($categories->count() > 0)
                            @foreach ($categories as $category)
                            
                            <div class="col-md-3 col-sm-6 text-center">
                                    <a href="{{ route('categoryProducts', $category->id) }}" style="text-decoration: none; color: inherit;">
                                    <div class="categoryCard">
                                        <img src="{{ $category->hasMedia('') ? $category->getMedia('')[0]->getFullUrl() : 'https://srv-np.techarttrekkies.com/placeholder/300x300/ffdfdf/EE00FF&text='.str_replace(' ','+',$category->name) }}"
                                            class="img-fluid w-100 categoryPic " style="width: 350px; padding:10px; height: 250px; object-fit: cover;"
                                            alt="{{ $category->name }}">
                                        <h5 class="categoryName">{{ $category->name }}</h5>
                                        <p class="categoryDescription">{{ $category->description=null? '' : Str::limit($category->description,60,'...') }}</p>

                                    </div>
                                </a>
                            </div>
                            @endforeach
                        @else
                            <p>All categories are out of stock at the moment</p>
                        @endif
                    </div>
                    <div class="row">
                        <div class="paginationClass">
                            {!! $categories->links() !!} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
.categoryCard {
    background-color: hsl(0, 92%, 81%); 
    /* width: 290px;  */
    /* height: 370px;  */
    flex-direction: column; 
    align-items: center; 
    padding: 5px;
    border: 10px solid #ffffff; 
}

.categoryPic {
    max-width: 100%;
    height: 20px; 
    object-fit:contain; 
}

.categoryName {
    font-weight: bold; 
    margin-top: 10px;  
}

.categoryDescription {
    font-size: 14px; 
    margin-top: 10px; 
}
</style>