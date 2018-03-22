@extends('layouts.main')

@section('title', 'Главная')

@section('css', asset('css/main_page.css'))

@section('header')
    @include('include.header')
@endsection

@section('breadcrumbs')

@endsection

@section('content')
    <table border="1">
        <caption>Ваши товары</caption>
        <tr>
            <th>Имя</th>
            <th>Количество</th>
            <th>Цена</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>
                    <a href="{{ route('product', ['category' => $product->category->alias, 'alias' => $product->alias]) }}" class="products_link">
                        <span class="products_title">{{$loop->iteration}}. {{ $product->name }}</span>
                    </a>
                </td>
                <td>
                    {{ $product->count }}
                </td>
                <td>
                    {{ $product->count * $product->price}}
                </td>
            <tr>
        @endforeach
            <tr>
                <td><td><td>Цена в общем: {{ $price_result }}</td></td></td>
            </tr>
    </table>
    <br />
    <form method="POST" action="{{ route('showBilling') }}">
        {{ csrf_field() }}
        <input type="hidden" name="price" value='{{ $price_result }}'>
        <button>Перейти к оплате</button>
    </form>
@endsection

@section('footer')
    @include('include.footer')
@endsection