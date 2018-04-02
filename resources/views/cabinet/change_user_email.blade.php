@extends('layouts.main')

@section('title', 'Редактирование E-mail адресса')

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
                        <div class="title_reg">Редактирование E-mail адресса</div>

                        <form method="POST" action="{{ route('changeEmail') }}">
                            @csrf

                            <div class="form_wrap">
                                <input id="email" type="email" class="field" name="email" value="@if(old('email')){{ old('email') }}@else{{$user->email or ""}}@endif" placeholder="Введите новый E-mail" required>

                                @if ($errors->has('email'))
                                    <span class="error_msg">
                                        <strong>{{ $errors->first('email') }}</strong>
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