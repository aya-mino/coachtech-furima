@extends('layouts.app')

@section('title', '購入画面')

@section('content')

<img
    src="{{ $item->image }}"
    alt="{{ $item->name }}"
>

<h2>{{ $item->name }}</h2>

<p>¥{{ number_format($item->price) }}</p>

<hr>

<form action="/purchase/{{ $item->id }}" method="POST">
    @csrf

    <h3>支払い方法</h3>

    <select name="payment_method" required>
        <option value="" selected disabled hidden>選択してください</option>

        <option value="convenience">コンビニ払い</option>

        <option value="card">カード支払い</option>
    </select>

    <hr>

    <h3>配送先</h3>

    <p>〒 {{ $user->postal_code }}</p>

    <p>{{ $user->address }}</p>

    <p>{{ $user->building }}</p>

    <a href="/purchase/address/{{ $item->id }}">
        変更する
    </a>

    <button type="submit">
        購入する
    </button>
</form>
@endsection