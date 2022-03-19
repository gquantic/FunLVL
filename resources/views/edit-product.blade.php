@extends('template')

@section('main')
    <main class="home">
        <form action="{{ route('products.update') }}" method="post" class="container" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div>
                <label for="">Название товара</label>
                <input type="text" name="name" value="{{ $product->name }}">
            </div>
            <div>
                <label for="">Описание</label>
                <textarea name="description" rows="10">{{ $product->description }}</textarea>
            </div>
            <div>
                <label for="">Изображение миниатюры</label>
                <img src="{{ asset($product->thumbnail_path) }}" alt="">
                <input type="file" name="thumbnail">
            </div>
            <div>
                <label for="">Категория</label>
                <select name="category_id" id="">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ ($category->id === $product->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">Игра</label>
                <select name="game_id" id="">
                    @foreach($games as $game)
                        <option value="{{ $game->id }}" {{ ($game->id === $product->game_id) ? 'selected' : '' }}>{{ $game->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">Сервер</label>
                <select name="server_id" id="">
                    @foreach($servers as $server)
                        <option value="{{ $server->id }}" {{ ($server->id === $product->server_id) ? 'selected' : '' }}>{{ $server->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">Операционная система</label>
                <select name="os_id" id="">
                    @foreach(config('app.os') as $key => $os)
                        <option value="{{ $key }}" {{ ($key === $product->os_id) ? 'selected' : '' }}>{{ $os }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">Цена</label>
                <input type="number" name="price" value="{{ $product->price }}">
            </div>
            <button type="submit">Сохранить</button>
        </form>
    </main>
@endsection
