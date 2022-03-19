@extends('template')

@section('main')
    <main>
        <div class="container chat-content">
            <x-alert :errors="$errors" :success="session('success') "/>
            <h1>Чат с пользователем {{  $withName }}</h1>
            <div class="chat-and-user-info">
                <div class="user-info">
                    <div class="account">{{ $product->name }}</div>
                    <div class="avatar-rate">
                        <div class="avatar"
                             style="background-image: url('{{ $product->user->data->avatar_path ?? '' }}')"></div>
                        <div class="name-rate">
                            <p class="name">{{ $product->user->name }}</p>
                            <x-rating :rating="$product->user->rating"/>
                        </div>
                    </div>
                    <div class="operation-system">
                        <img src="images/{{ $product->os }}.png" alt="">
                        <span>{{ $product->os }}</span>
                    </div>
                    <div class="price">{{ $product->price }}₽</div>
                    <div>
                        <a href="{{ route('spend',['chat'=>$chatId]) }}">Оплатить</a>
                    </div>
                    <div class="reviews">
                        <p class="title">Отзывы пользователя</p>
                        <div class="review-item">
                            <div class="text">
                                {{ $product->user->feedbacks[0]->text ?? '' }}
                            </div>
                            <div class="author-review">
                                <p class="name">{{ $product->user->feedbacks[0]->author->name ?? '' }}</p>
                                <div class="avatar"
                                     style="background-image: url('{{ asset($product->user->feedbacks[0]->author->avatar_path ?? '') }}')"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat" id="chat" data-with-name="{{  $withName }}" data-chat-id="{{ $chatId }}" data-user-id="{{ Auth::id() }}">
                    <div class="chat-box">

                        <div class="chat-box-body">
                            <div class="chat-box-overlay">
                            </div>
                            <div class="chat-logs">

{{--                                <div v-for="message in messages" v-bind:class="message.class">--}}
{{--                                    <h3 v-text="message.name"></h3>--}}
{{--                                    <span v-text="message.datetime"></span>--}}
{{--                                    <p v-text="message.text"></p>--}}
{{--                                </div>--}}

                                @foreach($product->orders[0]->chat->messages as $message)
                                <div class="{{ (Auth::id() === $message->user_id) ? 'owner' : 'guest' }}">
                                    <h3>{{ $message->user->name }}</h3>
                                    <span>{{ $message->created_at }}</span>
                                    <p>{{ $message->text }}</p>
                                </div>
                                @endforeach

                            </div><!--chat-log -->
                        </div>
                        <div class="chat-input">
                            <form>
                                <input type="text" id="chat-input" placeholder="Send a message..."/>
                                <button type="submit" class="chat-submit" id="chat-submit">
                                    <i class="material-icons">send</i>
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <template id="message">
            <div class="wrap">
                <h3 class="name"></h3>
                <span></span>
                <p class="content"></p>
            </div>
        </template>
    </main>
@endsection
