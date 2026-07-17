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
    <a href="/">
        <img
            class="header__logo"
            src="{{ asset('img/COACHTECHヘッダーロゴ.png') }}"
            alt="COACHTECH"
        >
    </a>

    @auth
    <form class="header__search" action="/" method="GET">
        <input
            type="text"
            name="keyword"
            placeholder="なにをお探しですか？"
            value="{{ request('keyword') }}"
        >
    </form>

    <nav class="header__nav">
        <form action="/logout" method="POST">
            @csrf
            <button class="header__logout" type="submit">ログアウト</button>
        </form>

        <a href="/mypage">マイページ</a>

        <a class="header__sell" href="/sell">出品</a>
    </nav>
    @endauth
</header>
    @yield('content')
</body>
</html>