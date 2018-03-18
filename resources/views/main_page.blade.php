@extends('layouts.main')

@section('title', 'Главная')

@section('css', asset('css/main_page.css'))

@section('header')
    @include('include.header')
@endsection

@section('breadcrumbs')

@endsection

@section('content')
    @if (session('message'))
        <div class="error_msg" style="text-align: center; color: darkolivegreen">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif
    @if ($errors->has('email'))
        <div class="error_msg" style="text-align: center; color: darkred">
            <strong>{{ $errors->first('email') }}</strong>
        </div>
    @endif
    <section class="section_title">
        <div class="container">
            <div class="row">
                <h1 class="title">
                    Самые популярные товары
                </h1>
            </div>
        </div>
    </section>
    <section class="slider_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="line"></div>
                </div>
                <div class="col-md-12">
                    <div class="slider_wrap">
                        <ul class="slider_products">

                            @include('include.products')

                        </ul>
                    </div>
                </div>
                <div class="col-md-9 col-md-offset-3">
                    <div class="line"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="about">
        <div class="section_title">
            <div class="container">
                <div class="row">
                    <h1 class="title">
                        Интернет-магазин Elixir
                    </h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="text">
                        <span>М</span>ы именно то что вам нужно Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus quas consequuntur, veniam a quidem. Ad repudiandae sapiente consequatur unde, ab laudantium deleniti eum nulla necessitatibus rem esse omnis veniam voluptates! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci facilis expedita voluptatum nesciunt minus dolorum dolorem iusto, eos fuga harum, blanditiis cumque sed rerum facere voluptatibus ab reprehenderit aperiam ipsa. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum accusantium, suscipit repudiandae nobis at aliquid voluptatibus! Qui officiis aperiam, aliquam inventore recusandae officia in laudantium. Quidem nesciunt quo excepturi quisquam.
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="line"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('include.footer')
@endsection