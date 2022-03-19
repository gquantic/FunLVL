@extends('template')

@section('main')
    <main>
        <img src="{{ \App\Facades\Setting::asset('banner') }}" alt="banner image" class="banner-image">
        <div class="page-banner">
            <div class="container">
                <h1 class="page-header">{{ $game->name }}</h1>
                @if($categories)
                <div class="tabs">
                    @foreach($categories as $category)
                    <a href="#" class="item">{{ $category->name }}</a>
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
                @if($products->count())
                <div class="owl-carousel owl-theme">
                    @foreach($products as $product)
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
                <p class="desc">{{ \App\Facades\Setting::name('description') }}</p>
            </div>
        </div>
    </main>
@endsection
