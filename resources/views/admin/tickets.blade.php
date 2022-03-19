@extends('admin.template')

@section('main')
    <main class="container">
        <x-alert :errors="$errors" :success="session('success') "/>
        <ul>
            @foreach($tickets as $ticket)
            <li>
                <div class="category">
                    <h2>{{ $ticket->name }}</h2>
                    <h6>{{ $ticket->category->name }}</h6>
                    <ul>
                        <li><a href="{{ route('admin.ticket.show',['ticket'=>$ticket->id]) }}">Ответить</a></li>
                    </ul>
                </div>
            </li>
            @endforeach
        </ul>
    </main>
@endsection
