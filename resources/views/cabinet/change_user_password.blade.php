@extends('layouts.main')

@section('title', 'Смена пароля')

@section('css', asset('css/cabinet.css'))

@section('header')
    @include('include.small_header')
@endsection

@section('content')
    <section class="registration">
        <div class="container">
            <div class="row">
                <div class="reg_wrap">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="title_reg">Смена пароля</div>

                        <form method="POST" action="{{ route('changePassword') }}">
                            @csrf

                            <div class="form_wrap">
                                <input id="password" type="password" class="field" name="password" placeholder="Введите новый пароль" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="error_msg">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form_wrap">
                                <input id="password_confirmation" type="password" class="field" name="password_confirmation" placeholder="Подтвердите новый пароль" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="error_msg">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="button_wrap">
                                <button class="submit" type="submit">Изменить</button>
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