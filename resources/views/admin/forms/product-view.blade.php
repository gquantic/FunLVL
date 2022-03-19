@extends('admin.template')

@section('main')
<main class="container">
    <h2>{{ $product->name }}</h2>
    @if($product->approved)
        <a href="{{ route('admin.product.unapproved',['product'=>$product->id]) }}">Отозвать</a>
    @else
    <a href="{{ route('admin.product.approved',['product'=>$product->id]) }}">Одобрить</a>
    @endif
</main>
@endsection

