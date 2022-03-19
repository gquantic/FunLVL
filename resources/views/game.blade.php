@extends('template')

@section('main')
    <main>
        <img src="{{ asset($game->banner_path ?? '') }}" alt="banner image" class="banner-image">
        <div class="page-banner">
            <div class="container">
                <h1 class="page-header">{{ $game->name }}</h1>
                @if($categories)
                    <div class="tabs">
                        @foreach($categories as $category)
                            <a href="{{ route('shop.game',[
                                    'category_id'=>$category->id,
                                    'game'=>$game->id
    ]) }}" class="item">{{ $category->name }}</a>
                        @endforeach
                    </div>
                @endif
                <button class="sellers">
                    <span>Продавцам</span>
                    <img src="images/rightarrow.png" alt="">
                </button>
            </div>
        </div>
        <div class="hot-contracts">
            <div class="container">
                <div class="hot-title-and-offer">
                    <p class="hot-title">Горящие сделки</p>
                    <a href="{{ route('products.create') }}" class="place-offer">Разместить предложение</a>
                </div>
            </div>
            <div class="container owl-container">
                @if($game->products->count())
                    <div class="owl-carousel owl-theme">
                        @foreach($game->products as $product)
                            <x-block-product-preview :product="$product"/>
                        @endforeach
                    </div>
                @else
                    <p>предложений нет</p>
                @endif
            </div>
        </div>
        <div class="page-description">
            <div class="container">
                <h2>Описание</h2>
                <p class="desc">{{ $game->description }}</p>
            </div>
        </div>
    </main>
@endsection
