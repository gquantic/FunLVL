<div class="item">
    <div class="name-and-price">
        <p class="name"><a href="{{ route('products.show',['product'=>$product->id]) }}">{{ $product->name }}</a></p>
        <p class="price">{{ $product->price }}₽</p>
    </div>
    <a href="{{ route('seller',['seller'=>$product->user->id]) }}"><div class="user-info">
        <div class="avatar" style="background-image: url({{ $product->user->data->avatar_path ?? '' }})"></div>
        <div class="name-and-rate">
            <p class="name">{{ $product->user->name }}</p>
            <x-rating :rating="$product->user->rating"/>
            <p class="signed-duration">{{ $product->user->dateInterval() }}</p>
        </div>
        </div></a>
    <a href="#" class="more"><img src="images/right.png" alt=""></a>
</div>
