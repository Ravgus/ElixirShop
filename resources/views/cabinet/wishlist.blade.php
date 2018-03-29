@extends('layouts.main')

@section('title', 'Список желаний')

@section('css', asset('css/content.css'))

@section('header')
    @include('include.small_header')
@endsection

@section('breadcrumbs')

@endsection

@section('content')
    <section class="info">
        <div style="color: #644527;font-size: 24px;text-align: center;">
            Список желаний
        </div>
        <br/>
        <div class="categories_text">{{ $empty }}</div>
        @if(empty($empty))
            <ol type="1">
                @foreach($wishes as $wish)
                    <li class="categories_item">
                        <div style="text-align: left">
                                <a href="{{ route('product', ['category' => $wish->product->category->alias, 'alias' => $wish->product->alias]) }}">{{ $wish->product->name }}</a>
                                <div>{{ $wish->product->small_description }}</div>
                                <br/>
                        </div>
                    </li>
                @endforeach
            </ol>
        @endif
    </section>
    @if(empty($empty))
        <div>{{ $wishes->links() }}</div>
    @endif
@endsection

@section('footer')
    @include('include.small_footer')
@endsection