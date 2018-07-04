@extends('layouts.main')

@section('title', 'Редактирование данных пользователя')

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
                        <div class="title_reg">Редактирование данных пользователя</div>

                        <form method="POST" action="{{ route('changeInformation') }}">
                            @csrf

                            <div class="form_wrap">
                                <input id="name" type="text" class="field" name="name" value="@if(old('name')){{ old('name') }}@else{{$user->name or ""}}@endif" placeholder="Введите новое ФИО" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="error_msg">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form_wrap">
                                <input id="phone" type="text" class="field" name="phone" value="@if(old('phone')){{ old('phone') }}@else{{$user->phone or ""}}@endif" placeholder="Введите новый телефон в формате +380ХХХХХХХХХ" required>

                                @if ($errors->has('phone'))
                                    <span class="error_msg">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form_wrap">
                                <input id="address" type="text" class="field" name="address" value="@if(old('address')){{ old('address') }}@else{{$user->address or ""}}@endif" placeholder="Введите новый адресс" required>

                                @if ($errors->has('address'))
                                    <span class="error_msg">
                                        <strong>{{ $errors->first('address') }}</strong>
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