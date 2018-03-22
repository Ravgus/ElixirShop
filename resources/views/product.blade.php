@extends('layouts.main')

@section('title', $product->name)

@section('css', asset('css/content_item.css'))

@section('header')
    @include('include.header')
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('product', $current_category, $product) }}
@endsection

@section('content')
    <section class="section-title">
        <div class="container">
            <div class="row">
                <h1 class="title">
                    {{ $product->name }}
                </h1>
            </div>
        </div>
    </section>
    <section class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <aside class="sidebar">
                        <ul class="categories">

                            @foreach ($categories as $category)

                                <li class="categories_item">
                                    <a href="{{ route('category', ['alias' => $category->alias]) }}" class="categories_link">
                                        <span class="categories_icon"><i class="fa fa-flask" aria-hidden="true"></i></span>
                                        <span class="categories_text">{{ $category->name }}</span>
                                    </a>
                                    <div class="categories_amount">{{ $count[$loop->index] }}</div>
                                    <img src="{{ asset('img/border_b.png') }}" alt="" class="border_b">
                                </li>

                            @endforeach

                        </ul>
                    </aside>
                </div>
                <div class="col-lg-1"><img src="{{ asset('img/border_v.png') }}" alt="" class="border_v hidden-xs hidden-sm hidden-md"></div>
                <div class="col-lg-8 col-md-8">
                    <main class="content">

                        <div class="content_wrap">
                            <div class="content_title">{{ $product->name }}</div>
                            <aside class="content_img">
                                <img src="{{ asset($product->image_item) }}" alt="item_big">
                            </aside>
                            <div class="content_text">
                                <div class="text_title">Подробности</div>
                                <div class="text_info">
                                    <p><strong>Описание:</strong>{{ $product->description }}</p>
                                </div>
                                <div class="content_price"><strong>Цена:</strong>{{ $product->price }} грн</div>
                                <div class="buy_wrap">
                                    <form id="add_product" method="POST">
                                        {{ csrf_field() }}
                                        <input type="text" name="count" class="count_input" placeholder="Количество">
                                        <input type="hidden" name="id" value='{{ $product->id }}'>
                                        <input type="hidden" name="title" value='{{ $product->name }}'>
                                        <input type="hidden" name="alias" value='{{ $product->alias }}'>
                                        <button name="submit" class="content_buy">В Корзину</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </main>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('include.small_footer')
@endsection