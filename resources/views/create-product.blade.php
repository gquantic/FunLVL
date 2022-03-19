@extends('template')

@section('main')
    <main>
        <div class="container chat-content">
            <h1>Добавить товар</h1>
            <div class="add-item-form">
                <x-alert :errors="$errors" :success="session('success') "/>
                <form action="{{ route('products.store') }}" method="post" class="container create-product-form" enctype="multipart/form-data">
                    @csrf
                    <input class="inp1" type="text" placeholder="Название товара"  name="name" required>
                    <div class="form-group">
                        <label for="">Игра</label>
                        <select name="game_id" id="" class="form-control">
                            @foreach($games as $game)
                                <option value="{{ $game->id }}">{{ $game->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Сервер</label>
                        <select name="server_id" id="" class="form-control">
                            @foreach($servers as $server)
                                <option value="{{ $server->id }}">{{ $server->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Карегория</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Операционная система</label>
                        <select name="os_id" id="" class="form-control">
                            @foreach(config('app.os') as $key => $os)
                                <option value="{{ $key }}">{{ $os }}</option>
                            @endforeach
                        </select>
                    </div>
                    <textarea class="inp4" name="description" placeholder="Описание товара" required id="" cols="30" rows="10"></textarea>
                    <input class="inp5" type="text" placeholder="Цена" name="price" required>
                    <input type="submit" value="Добавить товар" class="inp6">
                </form>
            </div>
        </div>
    </main>
@endsection
