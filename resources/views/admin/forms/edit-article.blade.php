@extends('admin.template')

@section('main')
    <form class="container" action="{{ route('admin.categories.update',['article'=>$article->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-alert :errors="$errors" :success="session('success') "/>
        @method('PUT')
        <div>
            <h2>Имя сервера</h2>
            <input type="text" name="name" value="{{ $article->name }}">
        </div>
        <div>
            <h2>Содержание</h2>
            <textarea name="content" rows="5">{{ $article->description }}</textarea>
        </div>
        <div>
            <h2>Миниатюра</h2>
            <div class="logo">
                <img src="{{ asset($article->logo_path) }}" alt="">
            </div>
            <input type="file" name="logo">
        </div>
        <input type="submit" value="Save">
    </form>
@endsection
