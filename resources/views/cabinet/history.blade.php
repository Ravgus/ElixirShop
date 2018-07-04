@extends('layouts.main')

@section('title', 'История покупок')

@section('css', asset('css/cabinet.css'))

@section('header')
    @include('include.small_header')
@endsection

@section('breadcrumbs')

@endsection

@section('content')
    <section class="info">
        <div class="col-lg-3 col-md-4">
            <aside class="sidebar">
                <ul class="categories">
                    <li class="categories_item">
                        <a href="{{ route('showWishList') }}" class="categories_link">
                            <span class="categories_icon"><i class="fa fa-list-ol" aria-hidden="true"></i></span>
                            <span class="categories_text">Список желаний</span>
                        </a>
                        <img src="{{ asset('img/border_b.png') }}" alt="" class="border_b">
                    </li>
                    <li class="categories_item">
                        <a href="{{ route('showHistory') }}" class="categories_link">
                            <span class="categories_icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i></span>
                            <span class="categories_text">История покупок</span>
                        </a>
                        <img src="{{ asset('img/border_b.png') }}" alt="" class="border_b">
                    </li>
                </ul>
            </aside>
        </div>
        <div class="col-lg-9 col-md-8">
            <div style="
        font-family: 'AdineKirnbergRegular', sans-serif;
        font-size: 60px;
        line-height: 70px;
        font-weight: normal;
        margin-bottom: 20px;
        padding: 0;
        text-align: left;">
                История покупок
            </div>
            <br/>
            <div class="categories_text">{{ $empty }}</div>
            {{--@if(empty($empty))
                <ol type="1">
                    @foreach($histories as $history)
                        <li>
                            <div style="; text-align: left; font-size: 20px">
                                @foreach($history as $k=>$v)
                                    @if(!is_array($v))
                                        @if($k == 'time')
                                            Дата - {{ $v }} <br/>
                                            @continue
                                        @else
                                            Цена - {{ $v }} <br/>
                                            @continue
                                        @endif
                                    @endif
                                    <div>
                                        <a href="{{ route('product', ['category' => $v[0]->category->alias, 'alias' => $v[0]->alias]) }}">{{ $v[0]->name }}</a>
                                        - {{ $v[1] }} штук
                                    </div>
                                @endforeach
                            </div>
                            <hr/>
                        </li>
                    @endforeach
                </ol>
            @endif--}}
            @if(!empty($histories))
                <ol type="1">
                    @foreach($histories as $history)
                        <li>
                            <div style="; text-align: left; font-size: 20px">
                                    Дата - {{ $history['time'] }} <br/>
                                    Цена - {{ $history['total_price'] }} грн <br/>
                                @foreach($history['data'] as $v)
                                    <div>

                                        <a href="{{ route('product', ['category' => $v['category'], 'alias' => $v['alias']]) }}">{{ $v['name'] }}</a>
                                        - {{ $v['count'] }} штук
                                    </div>
                                @endforeach
                            </div>
                            <hr/>
                        </li>
                    @endforeach
                </ol>
            @endif
        </div>
    </section>
@endsection

@section('footer')
    @include('include.small_footer')
@endsection