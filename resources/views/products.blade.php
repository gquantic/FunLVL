@extends('template')

@section('main')
    <main>
        <img src="{{ \App\Facades\Setting::asset('clipboard') }}" alt="banner image" class="banner-image">
        <div class="page-banner">
            <div class="container">
                <h1 class="page-header">Pubg Mobile</h1>
            </div>
        </div>
        <div class="offers-page">
            <div class="container">
                <div class="title-and-offer">
                    <div class="title-and-filter">
                        <p class="hot-title">Предложения</p>
                        <button>
                            <img src="{{ asset('images/filter.png') }}" alt="filter">
                        </button>
                    </div>
                    <a href="{{ route('products.create') }}" class="place-offer">Разместить предложение</a>
                </div>
                @if($products->count())
                <div class="offer-list">
                    @foreach($products as $product)
                        <x-inline-product-preview :product="$product"/>
                    @endforeach
                </div>
                @else
                    <p>предложений нет</p>
                @endif
            </div>
        </div>
        <div class="filter-modal">
            <div class="bg-blur"></div>
            <x-product-filter/>
        </div>
    </main>
@endsection
