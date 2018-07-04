@extends('layouts.main')

@section('title', 'Личный кабинет')

@section('css', asset('css/cabinet.css'))

@section('header')
    @include('include.small_header')
@endsection

@section('breadcrumbs')

@endsection

@section('content')
    <section class="info">
        <div class="col-lg-3 col-md-4">
            <aside class="sidebar">
                <ul class="categories">
                    <li class="categories_item">
                        <a href="{{ route('wishList') }}" class="categories_link">
                            <span class="categories_icon"><i class="fa fa-list-ol" aria-hidden="true"></i></span>
                            <span class="categories_text">Список желаний</span>
                        </a>
                        <img src="{{ asset('img/border_b.png') }}" alt="" class="border_b">
                    </li>
                    <li class="categories_item">
                        <a href="{{ route('showHistory') }}" class="categories_link">
                            <span class="categories_icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i></span>
                            <span class="categories_text">История покупок</span>
                        </a>
                        <img src="{{ asset('img/border_b.png') }}" alt="" class="border_b">
                    </li>
                </ul>
            </aside>
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="title_info">Личные данные</div>

            <table>
                <tr>
                    <td>ФИО</td>
                    <td>{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <td>Е-мейл</td>
                    <td>{{ Auth::user()->email }}</td>
                </tr>
                <tr>
                    <td>Телефон</td>
                    <td>{{ Auth::user()->phone }}</td>
                </tr>
                <tr>
                    <td>Адрес</td>
                    <td>{{ Auth::user()->address }}</td>
                </tr>
            </table>

        </div>
        <div class="col-lg-9 col-lg-offset-3">
            <div class="link_wrap_info">
                <a class="link_info" href="{{ route('changeInformation') }}">Редактировать личные данные</a>
                <a class="link_info" href="{{ route('changeEmail') }}">Изменить e-mail</a>
                <a class="link_info" href="{{ route('changePassword') }}">Изменить пароль</a>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('include.small_footer')
@endsection