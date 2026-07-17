<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <img
            class="header__logo"
            src="{{ asset('img/COACHTECHヘッダーロゴ.png') }}"
            alt="COACHTECH"
        >

        @auth
        <form action="/logout" method="POST">
            @csrf
            <button type="submit">
                ログアウト
            </button>
        </form>
        @endauth
        
    </header>
    @yield('content')
</body>
</html>