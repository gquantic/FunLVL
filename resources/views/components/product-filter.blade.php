<div class="container">
    <div class="title-and-close">
        <h2>Фильтры</h2>
        <button class="close">
            <img src="{{  asset('images/close.png') }}" alt="close">
        </button>
    </div>
    <form>
        <div class="filters">
            <div class="selections">
                <div class="item">
                    <label class="switch" for="onlineUser">
                        <input type="checkbox" id="onlineUser" name="online" value="1"/>
                        <div class="slider round"></div>
                    </label>
                    <label for="onlineUser">
                        <span>Только продавцы онлайн</span>
                    </label>

                </div>
                <div class="item">
                    <label class="switch" for="verified">
                        <input type="checkbox" id="verified" name="verified" value="1"/>
                        <div class="slider round"></div>
                    </label>
                    <label for="verified">
                        <span>Проверенные продавцы</span>
                    </label>

                </div>
            </div>
            <div class="area-and-apply">
                <textarea name="description" cols="30" placeholder="Поиск по описанию" rows="10"></textarea>
                <button type="submit" class="apply">Применить</button>
            </div>
        </div>
    </form>
</div>
