<div>
    <img src="{{ \App\Facades\Setting::asset('clipboard') }}" alt="banner image" class="banner-image">
    <div class="page-banner">
        <div class="container">
            <h1 class="page-header">Pubg Mobile</h1>
            @if($categories)
                <div class="tabs">
                    @foreach($categories as $category)
                        <a href="#" class="item">{{ $category->name }}</a>
                    @endforeach
                </div>
            @endif
            <button class="sellers">
                <span>Продавцам</span>
                <img src="images/rightarrow.png" alt="">
            </button>
        </div>
    </div>
</div>
