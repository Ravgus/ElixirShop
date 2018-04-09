@extends('layouts.main')

@section('title', $article->name)

@section('css', asset('css/main_page.css'))

@section('header')
    @include('include.header')
@endsection

@section('breadcrumbs')

@endsection

@section('content')
    <section class="about">
        <div class="section_title">
            <div class="container">
                <div class="row">
                    <h1 class="title">
                        {{ $article->title }}
                    </h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="line"></div>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <div class="text">
                        {!! $article->body !!}
                    </div>
                </div>
                <div class="col-md-9 col-md-offset-3">
                    <div class="line"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('include.footer')
@endsection