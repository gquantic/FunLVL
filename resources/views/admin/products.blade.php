@extends('admin.template')

@section('main')
    <main class="container">
        <x-alert :errors="$errors" :success="session('success') "/>
        <ul>
            @foreach($products as $product)
                <li>
                    <div class="product">
                        <h2>{{ $product->name }}</h2>
                        <ul>
                            <li><a href="{{ route('admin.product.view',['product'=>$product->id]) }}">Смотреть</a></li>
{{--                            @if($product->deleted_at)--}}
{{--                                <li><a href="{{ route('admin.categories.restore', ['product'=>$product->id,'type'=>1]) }}">Показать</a></li>--}}
{{--                            @else--}}
{{--                                <li><a href="{{ route('admin.categories.delete', ['product'=>$product->id,'type'=>1]) }}">Скрыть</a></li>--}}
{{--                            @endif--}}
{{--                            <li><a href="{{ route('admin.categories.delete', ['product'=>$product->id,'type'=>0]) }}">Удалить</a></li>--}}
                        </ul>
                    </div>
                </li>
            @endforeach
        </ul>
    </main>
@endsection

