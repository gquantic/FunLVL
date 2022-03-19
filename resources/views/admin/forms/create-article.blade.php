@extends('admin.template')

@section('main')
    <form class="container" action="{{ route('admin.articles.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-alert :errors="$errors" :success="session('success') "/>
        <div>
            <h2>Имя категории</h2>
            <input type="text" name="name">
        </div>
        <div>
            <h2>Содержание</h2>
            <textarea name="content" rows="5"></textarea>
        </div>
        <div>
            <h2>Миниатюра</h2>
            <input type="file" name="logo">
        </div>
        <input type="submit" value="Save">
    </form>
@endsection
