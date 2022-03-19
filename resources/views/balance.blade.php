@extends('template')

@section('main')
    <main>
        <div class="container chat-content">
            <h1>Кинары Aion (RU)</h1>
            <div class="chat-and-user-info">
                <div class="user-info kinar">
                    <div class="account">Аккаунт с соколом, рп, ледником</div>
                    <div class="avatar-rate">
                        <div class="avatar" style="background-image: url('images/avatar.png')"></div>
                        <div class="name-rate">
                            <p class="name">D1amant</p>
                            <div class="rating">
                                <img src="images/star.svg" alt="star">
                                <img src="images/star.svg" alt="star">
                                <img src="images/star.svg" alt="star">
                                <img src="images/star.svg" alt="star">
                                <img src="images/star.svg" class="passive" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="custom-select">
                        <div class="selected">
                            <p>
                                <img src="images/ios.png" alt="">
                                <span> IOS </span>
                            </p>
                            <span class="chevron"><img src="images/bottom-chevron.png" alt=""></span>
                        </div>
                        <div class="options">
                            <div class="option">
                                <p>
                                    <img src="images/android.png" alt="">
                                    <span> android </span>
                                </p>
                            </div>
                            <div class="option">
                                <p>
                                    <img src="images/ios.png" alt="">
                                    <span> IOS </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="give-get">
                        <div class="give">Отдам</div>
                        <img src="images/to.png" alt="">
                        <div class="get">Получу</div>
                    </div>
                    <div class="buy">Купить</div>
                    <div class="reviews">
                        <p class="title">Отзывы пользователя</p>
                        <div class="review-item">
                            <div class="text">
                                Текст отзыватекст отзыва текст отзыва
                                отзываотзываотзываотзыва отзываотзыва
                                отзываотзываотзываотзываотзы.
                            </div>
                            <div class="author-review">
                                <p class="name">Автор Отзывович</p>
                                <div class="avatar" style="background-image: url('images/avatar.png')"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat">
                    <div class="chat-box">

                        <div class="chat-box-body">
                            <div class="chat-box-overlay">
                            </div>
                            <div class="chat-logs">

                            </div><!--chat-log -->
                        </div>
                        <div class="chat-input">
                            <form>
                                <input type="text" id="chat-input" placeholder="Введите ваше сообщение"/>
                                <button type="submit" class="chat-submit" id="chat-submit">
                                    Отправить
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
