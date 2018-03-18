@extends('layouts.main')

@section('title', 'Поиск')

@section('css', asset('css/content.css'))

@section('header')
    @include('include.header')
@endsection

@section('breadcrumbs')

@endsection

@section('content')
    <div class="search_answer">
        {{ $empty }}
        <ol type="1">
            @foreach($urls as $key=>$value)
                <li>
                    <div style="text-align: left">
                        <a href="{{ $value }}">{{ $key }}</a>
                        @if(isset($descriptions[$key]))
                            <div>{{ $descriptions[$key] }}</div>
                            <br />
                        @endif
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
@endsection

@section('footer')
    @include('include.small_footer')
@endsection