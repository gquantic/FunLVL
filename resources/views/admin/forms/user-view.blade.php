@extends('admin.template')

@section('main')
<main>
    <h2>{{ $user->name }}</h2>
    <a href="{{ route('admin.user.verified',['user'=>$user->id]) }}">Одобрить</a>
</main>
@endsection

