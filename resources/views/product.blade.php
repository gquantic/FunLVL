@extends('template')

@section('main')
    <main>
        <div class="container">
            <x-alert :errors="$errors" :success="session('success') "/>
            <h1>{{ $product->name }}</h1>
            <h2>Описание</h2>
            <p>{{ $product->description }}</p>
            <h4>Операционная система</h4>
            <p>{{ $product->os }}</p>
            <h4>Сервер</h4>
            <p>{{ $product->server->name }}</p>
            <h4>Игра</h4>
            <p>{{ $product->game->name }}</p>
            <a href="{{ route('chat.start',['product'=>$product->id]) }}" >Начать чат с продавцом</a>
        </div>
    </main>
@endsection
