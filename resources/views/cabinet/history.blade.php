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
        <div style="
        font-family: 'AdineKirnbergRegular', sans-serif;
        font-size: 60px;
        line-height: 70px;
        font-weight: normal;
        margin-bottom: 20px;
        padding: 0;
        text-align: center;">
            История покупок
        </div>
        <br/>
        <div class="categories_text">{{ $empty }}</div>
        @if(empty($empty))
            <ol type="1">
                @foreach($histories as $history)
                    <li>
                        <div style="; text-align: left; font-size: 20px">
                            @foreach($history as $k=>$v)
                                @if(!is_array($v))
                                    @if($k == 'time')
                                        Дата - {{ $v }} <br />
                                        @continue
                                    @else
                                        Цена - {{ $v }} <br />
                                        @continue
                                    @endif
                                @endif
                                <div>
                                    <a href="{{ route('product', ['category' => $v[0]->category->alias, 'alias' => $v[0]->alias]) }}">{{ $v[0]->name }}</a>
                                    - {{ $v[1] }} штук
                                </div>
                            @endforeach
                        </div>
                        <hr />
                    </li>
                @endforeach
            </ol>
        @endif
    </section>
@endsection

@section('footer')
    @include('include.small_footer')
@endsection