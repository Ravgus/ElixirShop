@foreach ($products as $product)

    <div class="slide">
        <li class="products_item">
            <a href="{{ route('product', ['category' => $product->category->alias, 'alias' => $product->alias]) }}" class="products_link">
                <span class="products_title">{{ $product->name }}</span>
                <span class="products_preview">
                    <img src="{{ asset($product->image_menu) }}" alt="{{ $product->name }}">
                </span>
            </a>
            <br>
            <div class="products_text">{{ $product->small_description }}</div>
            <div class="products_price">{{ $product->price }} грн</div>
            <button class="products_buy">Купить</button>
        </li>
    </div>

@endforeach