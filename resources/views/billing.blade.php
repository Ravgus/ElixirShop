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
                                <input id="firstname" type="text" class="field" name="firstname" value="@if(old('firstname')){{ old('firstname') }}@else{{ $user->name }}@endif" placeholder="Введите ваше имя" autofocus required>

                                    <span id="error_firstname" class="error_msg">
                                    </span>

                            </div>

                            <div class="form_wrap">
                                <input id="secondname" type="text" class="field" name="secondname" value="@if(old('secondname')){{ old('secondname') }}@endif" placeholder="Введите вашу фамилию" required>

                                    <span id="error_secondname" class="error_msg">
                                    </span>

                            </div>

                            <div class="form_wrap">
                                <input id="email" type="email" class="field" name="email" value="@if(old('email')){{ old('email') }}@else{{ $user->email }}@endif" placeholder="Введите ваш e-mail" required>

                                    <span id="error_email" class="error_msg">
                                    </span>

                            </div>

                            <div class="form_wrap">
                                <input id="phone" type="text" class="field" name="phone" value="@if(old('phone')){{ old('phone') }}@else{{ $user->phone }}@endif" placeholder="Введите ваш телефон" required>

                                    <span id="error_phone" class="error_msg">
                                    </span>

                            </div>

                            <div class="form_wrap">
                                <input id="address" type="text" class="field" name="address" value="@if(old('address')){{ old('address') }}@else{{ $user->address }}@endif" placeholder="Введите адресс доставки" required>

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