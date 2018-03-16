@extends('layouts.main')

@section('title', '404')

@section('css', asset('css/404.css'))

@section('header')

@endsection

@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-4 hidden-sm hidden-xs">
                    <div class="image">
                        <img src="{{ asset('img/alchemist.png') }}" alt="alchemist picture">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="info">
                        <div class="image_wrap">
                            <img src="{{ asset('img/404.png') }}" alt="404">
                        </div>
                        <div class="text">
                            Похоже наши алхимики еще не вывели формулу этой страницы, советуем воспользоватся навигаций чтобы обрести путь к сайту
                        </div>
                        <ul>
                            <li><a href="{{ route('main') }}">Главная</a></li>
                            <li><a href="#">Контакты</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection