@extends('template')

@section('main')
    <main>
        <div class="offers-page stock ">
            <div class="container">
                <div class="title-and-offer">
                    <div class="title-and-filter">
                        <p class="hot-title">Биржа</p>
                    </div>
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
                <div class="hot-links">
                    <a href="#" class="no-offer">Нет подходящего предложения? </a>
                    <a href="{{ route('products.create') }}" class="move">Разместить предложение</a>
                </div>
            </div>
        </div>
        <div class="filter-modal">
            <div class="bg-blur"></div>
            <x-product-filter/>
        </div>
    </main>
@endsection
