@extends('layouts.main')

@section('title', $title_category)

@section('css', asset('css/content.css'))

@section('header')
    @include('include.header')
@endsection

@section('content')
    <section class="section-title">
        <div class="container">
            <div class="row">
                <h1 class="title">
                    Товары в асортименте
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
                        <img src="{{ asset('img/border_g.png') }}" alt="" class="border_products hidden-xs hidden-md">
                        <ul class="products">

                            @include('include.products')

                        </ul>
                    </main>
                </div>
            </div>
        </div>
    </section>
    <section class="pagination">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-4">
                    <div class="pagination_wrap">
                        {{ $products->links() }}
                        <img src="{{ asset('img/border_g.png') }}" alt="" class="border_pagination hidden-xs hidden-md">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('include.footer')
@endsection