@extends('template')

@section('main')
    <main>
        <div class="offers-page stock ">
            <div class="container">
                <div class="title-and-offer">
                    <div class="title-and-filter">
                        <p class="hot-title">Чаты и сообщения</p>
                    </div>
                </div>
                <div class="offer-list">
                    @if($chats->count())
                    @foreach($chats as $chat)
                        <span>Чат №{{ $chat->id }}</span>
                        <p>{{ $chat->messages[0]->text ?? '' }}</p>
                            <p><a href="{{ route('chat',['chat'=>$chat->id]) }}">открыть чат</a></p>
                    @endforeach
                    @else
                        <p>Диалогов нет</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
