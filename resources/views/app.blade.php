<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Funny Comics Land - @yield('title')</title>

        <!-- Fonts -->

        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            .change-font {
                font-family: 'Roboto', sans-serif;
            }
        </style>
    </head>
    <body class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand ml-4" href="{{route('home')}}">Funny Comics Land</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="{{route('home')}}">О нас</a>
                    <a class="nav-link" href="{{route('list')}}">Каталог</a>
                    <a class="nav-link" href="{{route('location')}}">Где нас найти?</a>
                    @auth
                        <a class="nav-link" href="{{route('cart')}}">Корзина</a>
                        <a class="nav-link" href="{{route('orders')}}">Мои заказы</a>
                        <a class="nav-link" href="{{route('logout')}}">Выход</a>
                    @else
                        <a class="nav-link" href="{{route('login')}}">Войти</a>
                        <a class="nav-link" href="{{route('register')}}">Регистрация</a>
                    @endauth
                </div>
            </div>
        </nav>

        <div class="alert alert-primary d-none" role="alert">
            <div class="d-flex">
                <div class="alert-body mr-2"></div>
                <button type="button" class="btn-close closeModal" aria-label="Close"></button>
            </div>
        </div>

        <div class="m-4">
            @yield('content')
        </div>

        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        @stack('scripts')
        <script>
            const addToCart = (itemId, count = 1, reload = false) => {
                $.post('/cart/' + itemId, {count}, data => {
                    alert(data.message);
                    if (reload) location.reload();
                }).fail(err => alert('Ошибка при добавлении товара'))
            }

            $('.addToCart').click(function() {
                const itemId = $(this).data('id');
                addToCart(itemId)
            })


        </script>
    </body>
</html>
