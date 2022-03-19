<div class="item">
    <div class="name"><a href="{{ route('products.show',['product'=>$product->id]) }}">{{ $product->name }}</a></div>
    <div class="avatar-rate">
        <div class="avatar" style="background-image: url('{{ asset($product->user->data->avatar_path ?? '') }}')"></div>
        <a href="{{ route('seller',['seller'=>$product->user->id]) }}"><div class="name-rate">
            <p class="name">{{ $product->user->name }}</p>
            <x-rating :rating="$product->user->rating"/>
            </div></a>
    </div>
    <div class="operation-system">
        <img src="{{ asset('images/'.\Illuminate\Support\Str::lower($product->os).'.png') }}" alt="">
        <span>{{ $product->os }}</span>
    </div>
    <div class="price">{{ $product->price }}₽</div>
</div>
