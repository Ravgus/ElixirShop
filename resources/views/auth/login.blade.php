@extends('layouts.main')

@section('title', 'Вход')

@section('css', asset('css/login.css'))

@section('header')
    @include('include.header', ['auth' => true])
@endsection

@section('content')
    <section class="registration">
        <div class="container">
            <div class="row">
                <div class="reg_wrap">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="title_reg">Авторизация</div>
                        <a href="{{ route('socialAuth', ['driver' => 'facebook']) }}" class="vk_reg">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                            <span class="hidden-xs">Войти через Facebook</span>
                            <span class="hidden-lg hidden-md hidden-sm">Facebook</span>
                        </a>
                        <a href="{{ route('socialAuth', ['driver' => 'google']) }}" class="gg_reg">
                            <i class="fa fa-google-plus-official" aria-hidden="true"></i>
                            <span class="hidden-xs">Войти через Google+</span>
                            <span class="hidden-lg hidden-md hidden-sm">Google+</span>
                        </a>

                        <div class="error_msg" id="error"></div>

                        <form id="login_form" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form_wrap">
                                <input id="email" type="email" class="field" name="email" value="{{ old('email') }}" placeholder="E-mail" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="error_msg">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form_wrap">
                                <input id="password" type="password" class="field" name="password" placeholder="Пароль" required>
                                @if ($errors->has('password'))
                                    <span class="error_msg">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <br />

                            <div class="form-group row">
                                <div class="col-md-3 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="button_wrap">
                                <button class="submit" type="submit">Войти</button>
                            </div>

                        </form>

                        <div class="text_link last">
                            <a href="{{ route('password.request') }}" class="forgot_pass">Забыли пароль?</a>
                            Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироватся</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')

@endsection