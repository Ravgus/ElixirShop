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
        @if(empty($empty))
            <ol type="1">
                    @foreach($results as $result)
                        <li>
                            <div style="text-align: left">
                                @if($result instanceof \App\Category)
                                    <a href="{{ route('category', ['alias' => $result->alias]) }}">{{ $result->name }}</a>
                                @elseif($result instanceof \App\Product)
                                    <a href="{{ route('product', ['category' => $result->category->alias, 'alias' => $result->alias]) }}">{{ $result->name }}</a>
                                    <div>{{ $result->small_description }}</div>
                                    <br />
                                @endif
                            </div>
                        </li>
                    @endforeach
            </ol>
        @endif
    </div>
    @if(empty($empty))
        <div>{{ $results->links() }}</div>
    @endif
@endsection

@section('footer')
    @include('include.small_footer')
@endsection