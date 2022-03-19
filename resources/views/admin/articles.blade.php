@extends('admin.template')

@section('main')
    <main class="container">
        <x-alert :errors="$errors" :success="session('success') "/>
        <a href="{{ route('admin.articles.create') }}" class="button">Добавить страницу</a>
        <ul>
            @foreach($articles as $article)
            <li>
                <div class="article">
                    <h2>{{ $article->name }}</h2>
                    <ul>
                        <li><a href="{{ route('admin.articles.edit',['article'=>$article->id]) }}">Редактировать</a></li>
                        @if($article->deleted_at)
                            <li><a href="{{ route('admin.articles.restore', ['article'=>$article->id,'type'=>1]) }}">Показать</a></li>
                        @else
                            <li><a href="{{ route('admin.articles.delete', ['article'=>$article->id,'type'=>1]) }}">Скрыть</a></li>
                        @endif
                        <li><a href="{{ route('admin.articles.delete', ['article'=>$article->id,'type'=>0]) }}">Удалить</a></li>
                    </ul>
                </div>
            </li>
            @endforeach
        </ul>
    </main>
@endsection
