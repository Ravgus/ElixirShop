<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <ul class="map">
                    <li>Условия</li>
                    <li><a href="{{ route('about') }}">О магазине</a></li>
                    <li><a href="{{ route('contacts') }}">Контакты</a></li>
                    <li><a href="{{ route('partnership') }}">Сотрудничество с нами</a></li>
                    <li><a href="{{ route('delivery') }}">Оплата и доставка</a></li>
                    <li><a href="{{ route('guarantees') }}">Гарантии и конфиденциальность</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <ul class="map">
                    <li>Мой Эликсир</li>
                    <li><a href="{{ route('home') }}">Мой кабинет</a></li>
                    <li><a href="{{ route('showHistory') }}">Мои заказы</a></li>
                    <li><a href="{{ route('career') }}">Карьера в компании</a></li>
                    {{--<li><a href="{{ route('') }}">Дисконтная карта</a></li>
                    <li><a href="{{ route('') }}">Расширеный сервис</a></li>--}}
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <ul class="map">
                    <li>Помощь</li>
                    <li><a href="{{ route('questionsAnswers') }}">Вопросы и ответы</a></li>
                    <li><a href="{{ route('connection') }}">Связь с руководством</a></li>
                    <li><a href="{{ route('support') }}">Служба поддержки</a></li>
                    <li><a href="{{ route('returnProducts') }}">Возврат товаров</a></li>
                    <li><a href="{{ route('shares') }}">Акции</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="subscribe">
                    <span>Уведомления</span>
                    <form class="subs_form" action="{{ route('subscribe') }}" method="post">
                        {{ csrf_field() }}
                        <input type="text" class="subs_input" name="email" value="{{ old('email') }}" placeholder="Введите е-мейл">
                        <button type="submit" class="subs_submit">
                            Подписаться
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="footer_copyright">
                г.Херсон, ул. Залаегерсег 18, ТРЦ «Фабрика» © Elixir 2017
            </div>
        </div>
    </div>

</footer>