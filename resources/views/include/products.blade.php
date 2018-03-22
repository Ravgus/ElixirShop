@foreach ($products as $product)

    <div class="slide">
        <li class="products_item">
            <a href="{{ route('product', ['category' => $product->category->alias, 'alias' => $product->alias]) }}" class="products_link">
                <span class="products_title">{{ $product->name }}</span>
            </a>
            <span class="products_preview">
                <img src="{{ asset($product->image_menu) }}" alt="{{ $product->name }}">
            </span>
            <br>
            <div class="products_text">{{ $product->small_description }}</div>
            <div class="products_price">{{ $product->price }} грн</div>
            <form method="get" action="{{ route('product', ['category' => $product->category->alias, 'alias' => $product->alias]) }}">
                <button class="products_buy">Подробнее</button>
            </form>
        </li>
    </div>

@endforeach