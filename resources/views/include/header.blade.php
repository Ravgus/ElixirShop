<header class="header_content">
    <div class="container">
        <div class="header_topline">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <a href="{{ route('main') }}" class="logo">Elixir</a>
                </div>
                <div class="col-md-5 col-sm-9 col-xs-12">
                    <div class="search">
                        <form method="get" action="{{ route('search_show') }}" class="search_form">
                            {{--{{ csrf_field()}}--}}
                            <input type="text" name="query_body" class="search_input" value="{{ old('query_body') }}" placeholder="Поиск товаров">
                            <button type="submit" class="search_submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="header_menu">
                        <ul class="menu">
                            <li class="menu_item">
                                <a href="{{ route('showBasket') }}" class="menu_link menu_link_iconed">
                                    <span class="menu_link-icon">
                                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                    </span>
                                    <span class="menu_link-text">Корзина</span>
                                </a>
                            </li>
                                @auth
                                    {{--<li class="menu_item">
                                        <a class="menu_link" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                            <span class="menu_link-text">Выйти</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>--}}
                                    <li class="menu_item">
                                        <a href="{{ route('home') }}" class="menu_link">
                                            <span class="menu_link-text">Личный кабинет</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="menu_item">
                                        <a id="href_cabinet" href="{{ route('login') }}" class="menu_link">
                                            <span class="menu_link-text">Войти</span>
                                        </a>
                                    </li>
                                @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @if(!isset($auth))
            <div class="row">
                <div class="col-md-9">
                    <nav class="nav">
                        <ul class="nav_list">
                            <li class="nav_item">
                                <a href="{{ route('category', ['alias' => 'all']) }}" class="nav_link">
                                            <span class="nav_icon">
                                                <i class="fa fa-flask" aria-hidden="true"></i>
                                            </span>
                                    <span class="nav_title">Все товары</span>
                                </a>
                            </li>

                            @foreach($categories as $category)

                                <li class="nav_item">
                                    <a href="{{ route('category', ['alias' => $category->alias]) }}" class="nav_link">
                                            <span class="nav_icon">
                                                <i class="fa fa-flask" aria-hidden="true"></i>
                                            </span>
                                        <span class="nav_title">{{ $category->name }}</span>
                                    </a>
                                </li>

                            @endforeach

                        </ul>
                    </nav>
                </div>
            </div>
        @endif
    </div>
</header>