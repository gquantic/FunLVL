@extends('template')

@section('main')
    <main>
        <div class="offers-page stock ">
            <div class="container">
                <div class="title-and-offer">
                    <div class="title-and-filter">
                        <p class="hot-title">История сделок</p>
                    </div>
                </div>
                <div class="offer-list">
                    @if($orders->count())
                    @foreach($orders as $order)
                        <span>{{ $order->created_at }}</span>
                        <x-inline-product-preview :product="$order->product"/>
                    @endforeach
                    @else
                        <p>сделок еще нет</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
