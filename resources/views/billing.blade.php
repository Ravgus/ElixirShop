@extends('layouts.main')

@section('title', 'Главная')

@section('css', asset('css/reg.css'))

@section('header')
    @include('include.header')
@endsection

@section('breadcrumbs')

@endsection

@section('content')
    <section class="registration">
        <div class="container">
            <div class="row">
                <div class="reg_wrap">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                        <div class="title_reg">Оплата</div>

                        <form method="POST" id="make_billing" {{--action="{{ route('makeBilling') }}"--}}>

                            {{ csrf_field() }}

                            <div class="form_wrap">
                                <input id="firstname" type="text" class="field" name="firstname" value="{{ old('firstname') }}" placeholder="Введите ваше имя" autofocus>

                                    <span id="error_firstname" class="error_msg">
                                    </span>

                            </div>

                            <div class="form_wrap">
                                <input id="secondname" type="text" class="field" name="secondname" value="{{ old('secondname') }}" placeholder="Введите вашу фамилию">

                                    <span id="error_secondname" class="error_msg">
                                    </span>

                            </div>

                            <div class="form_wrap">
                                <input id="email" type="email" class="field" name="email" value="{{ old('email') }}" placeholder="Введите ваш e-mail">

                                    <span id="error_email" class="error_msg">
                                    </span>

                            </div>

                            <div class="form_wrap">
                                <input id="phone" type="text" class="field" name="phone" value="{{ old('phone') }}" placeholder="Введите ваш телефон">

                                    <span id="error_phone" class="error_msg">
                                    </span>

                            </div>

                            <div class="form_wrap">
                                <input id="address" type="text" class="field" name="address" value="{{ old('address') }}" placeholder="Введите адресс доставки">

                                    <span id="error_address" class="error_msg">
                                    </span>

                            </div>

                            <div class="form_wrap">
                                {{--<input id="payment" type="text" class="field" name="payment" value="{{ old('payment') }}" placeholder="Введите адресс доставки" required>--}}

                                <select required size="3" name="payment_type">
                                    <option disabled>Выберите метод оплаты</option>
                                    <option selected value="privat24">Приват24</option>
                                    <option value="card">Перевод на карту</option>
                                    <option value="c.o.d.">Наложный платеж</option>
                                </select>

                                {{--@if ($errors->has('payment'))
                                    <span class="error_msg">
                                        <strong>{{ $errors->first('payment') }}</strong>
                                    </span>
                                @endif--}}
                            </div>

                            <div class="title_reg">К оплате: {{ $price }} грн</div>

                            <div class="button_wrap">
                                <button class="submit" type="submit">Заказать</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')

@endsection