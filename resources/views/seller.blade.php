@extends('template')

@section('main')
    <main>
        <div class="container ">
            <div class="seller-and-reviews">
                <div class="seller">
                    <h1>Продавец {{ $user->name }}</h1>
                    <div class="seller-info">
                        <div class="avatar" style="background-image: url('{{ asset($user->data->avatar_path ?? '') }}')"></div>
                        <div class="info">
                            <div class="name-rate">
                                <p class="name">{{ $user->name }}</p>
                                <x-rating :rating="$user->rating"/>
                            </div>
                            <p class="position">{{ $user->dateInterval() }}</p>
                            <p class="description">
                                {{ $user->data->description }}
                            </p>
                        </div>
                    </div>
                    <a href="#" class="write-to-seller">Написать продавцу</a>
                </div>
                <div class="reviews">
                    <p class="title">Отзывы пользователя</p>
                    @if($user->feedbacks)
                        @foreach($user->feedbacks as $feedback)
                            <x-feedback :feedback="$feedback"/>
                        @endforeach
                    @endif
                    <a href="{{ route('seller.feedbacks',['seller'=>$user->id]) }}" class="see-all-review see-all">
                        <span>Все отзывы</span>
                        <img src="images/right-duble.png" alt="">
                    </a>
                </div>
            </div>
            <div class="seller-offers">
                <p class="title">Предложения продавца</p>
                @if($user->products->count())
                    @foreach($user->products as $product)
                        <x-inline-product-preview :product="$product"/>
                    @endforeach
                @endif
                <a href="{{ route('seller.products',['seller'=>$user->id]) }}" class="see-all">
                    <span>Все предложения</span>
                    <img src="{{ asset('images/right-duble.png') }}" alt="">
                </a>
            </div>
        </div>
    </main>
@endsection
