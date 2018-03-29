@extends('layouts.main')

@section('title', 'Главная')

@section('css', asset('css/main_page.css'))

@section('header')
    @include('include.header')
@endsection

@section('breadcrumbs')

@endsection

@section('content')
    @if($price_result != 0)
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
                        <form method="POST" action="{{ route('showBasket') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value='{{ $product->id }}'>
                            <input type="text" class="field" name="count" value='{{ $product->count }}' placeholder="Количество">

                            @if ($errors->has('count'))
                                <span class="error_msg">
                                    <strong>{{ $errors->first('count') }}</strong>
                                </span>
                            @endif

                            <br />
                            <button>Изменить</button>
                        </form>
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
    @else
        <div class="title_reg">Вы ничего не выбрали</div>
    @endif
@endsection

@section('footer')
    @include('include.footer')
@endsection