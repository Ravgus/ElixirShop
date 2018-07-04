@extends('layouts.main')

@section('title', 'Главная')

@section('css', asset('css/main_page.css'))

@section('header')
    @include('include.header')
@endsection

@section('breadcrumbs')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                @if($price_result != 0)
                    <table border="1">
                        <caption class="title">Ваши товары</caption>
                        <tr>
                            <th>Имя</th>
                            <th>Количество</th>
                            <th>Цена</th>
                        </tr>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <a href="{{ route('product', ['category' => $product->category->alias, 'alias' => $product->alias]) }}"
                                       class="products_link">
                                        <span>{{$loop->iteration}}. {{ $product->name }}</span>
                                    </a>
                                </td>
                                <td>
                                    <form method="POST"
                                          {{--id="product_{{ $product->id }}"--}} action="{{ route('changeProductCount') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value='{{ $product->id }}'>
                                        <input type="text" class="field" name="count" value='{{ $product->count }}'
                                               placeholder="Количество">

                                        @if ($errors->has('count'))
                                            <span class="error_msg">
                                    <strong>{{ $errors->first('count') }}</strong>
                                </span>
                                        @endif

                                        <br/>
                                        <button>Изменить</button>
                                    </form>
                                </td>
                                <td>
                                    {{ $product->count * $product->price}} грн
                                </td>
                            <tr>
                        @endforeach
                        <tr>
                            <td colspan="3" style="text-align: right;">Цена в общем: {{ $price_result }} грн</td>
                        </tr>
                    </table>
                    <br/>
                    <form method="POST" action="{{ route('showBilling') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="price" value='{{ $price_result }}'>
                        <button>Перейти к оплате</button>
                    </form>
                @else
                    <div style="color: #644527; font-size: 24px; text-align: center;">Вы ничего не выбрали</div>
                @endif
            </div>
        </div>
    </div>
    <br>
@endsection

@section('footer')
    @include('include.footer')
@endsection