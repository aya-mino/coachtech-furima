@extends('layouts.app')

@section('title', 'プロフィール設定')

@section('content')

<h1>プロフィール設定</h1>

<form method="POST">
    @csrf

    <div>
        <label>ユーザー名</label>
        <input type="text" name="name">
    </div>

    <div>
        <label>郵便番号</label>
        <input type="text" name="postal_code">
    </div>

    <div>
        <label>住所</label>
        <input type="text" name="address">
    </div>

    <div>
        <label>建物名</label>
        <input type="text" name="building">
    </div>

    <button type="submit">
        更新する
    </button>
</form>

@endsection