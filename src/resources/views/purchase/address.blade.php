@extends('layouts.app')

@section('title', '住所変更')

@section('content')

<h1>住所変更</h1>

<p>商品ID:{{ $item_id }}</p>

<form action="/purchase/address/{{ $item_id }}" method="POST">
    @csrf

    <label>郵便番号</label>

    <input
        type="text"
        name="postal_code"
        value="{{ old('postal_code', $user->postal_code) }}"
    >

    <label>住所</label>

    <input
        type="text"
        name="address"
        value="{{ old('address', $user->address) }}"
    >

    <label>建物名</label>

    <input
        type="text"
        name="building"
        value="{{ old('building', $user->building) }}"
    >

    <button type="submit">更新する</button>
</form>

@endsection