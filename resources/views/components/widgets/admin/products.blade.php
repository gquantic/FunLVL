<div class="admin-widget">
    <h3>Продукты, требующие одобрения</h3>
    @if($products->count())
    <ul>
        @foreach($products as $product)
        <li><a href="{{ route('admin.product.view',['product'=>$product->id]) }}">
                {{ $product->name }}
            </a>
        </li>
        @endforeach
    </ul>
    @else
        <p>таких нет</p>
    @endif
</div>
