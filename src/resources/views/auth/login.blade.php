@extends('layouts.app')

@section('title', 'ログイン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<main class="login">

    <h1 class="login__title">ログイン</h1>

    <form class="login-form" action="/login" method="post">
        @csrf

        <div class="login-form__group">
            <label class="login-form__label">メールアドレス</label>
            <input class="login-form__input" type="email" name="email" value="{{ old('email') }}">
            @error('email')
                <p class="login-form__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="login-form__group">
            <label class="login-form__label">パスワード</label>
            <input class="login-form__input" type="password" name="password">
            @error('password')
                <p class="login-form__error">{{ $message }}</p>
            @enderror
        </div>

        <button class="login-form__button" type="submit">
            ログインする
        </button>

    </form>

    <a class="login__link" href="/register">
        会員登録はこちら
    </a>

</main>
@endsection