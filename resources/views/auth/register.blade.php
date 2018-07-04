@extends('layouts.main')

@section('title', 'Регистрация')

@section('css', asset('css/reg.css'))

@section('header')
    @include('include.header', ['auth' => true])
@endsection

@section('content')
    <section class="registration">
        <div class="container">
            <div class="row">
                <div class="reg_wrap">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="title_reg">Регистрация</div>
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
                        <div class="or">или зарегистрироватся с помощью</div>

                        <div class="error_msg" id="error"></div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form_wrap">
                                <input id="name" type="text" class="field" name="name" value="{{ old('name') }}" placeholder="Введите логин" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="error_msg">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form_wrap">
                                <input id="email" type="email" class="field" name="email" value="{{ old('email') }}" placeholder="Введите ваш e-mail" required>

                                @if ($errors->has('email'))
                                    <span class="error_msg">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form_wrap pass_r">
                                <input id="password" type="password" class="field" name="password" placeholder="Введите пароль" required>

                                @if ($errors->has('password'))
                                    <span class="error_msg">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form_wrap pass_l">
                                <input id="password-confirm" type="password" class="field" name="password_confirmation" placeholder="Подтвердите пароль" required>
                            </div>


                            <div class="form_wrap">
                                <p id="pass_compare"></p>
                            </div>


                            <div class="text_link">
                                Регистрируясь, вы соглашаетесь с <a href="#">пользовательским соглашением</a>.
                            </div>
                            <div class="button_wrap">
                                <button class="submit" type="submit">Регистрация</button>
                            </div>
                        </form>

                        <div class="text_link last">
                            Уже  зарегистрированы? <a href="{{ route('login') }}">Войти</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')

@endsection