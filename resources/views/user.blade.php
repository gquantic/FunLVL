@extends('template')

@section('main')
    <main class="container">
            <h2>{{ $user->name }}</h2>
            <div>
                @if($user->data)
                    <img src="{{ asset($user->data->avatar_path) }}" alt="">
                @endif
            </div>
            <div>
                <label for="">От пользователя</label>
                <p>{{ $user->data->description ?? '' }}</p>
            </div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
    </main>
@endsection
