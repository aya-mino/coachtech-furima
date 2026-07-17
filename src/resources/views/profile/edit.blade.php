@extends('layouts.app')

@section('title', 'プロフィール編集')

@section('content')

<h1>プロフィール設定</h1>

<form action="/mypage/profile" method="POST" enctype="multipart/form-data">
    @csrf

    @if ($user->image)
        <img
            src="{{ asset('storage/' . $user->image) }}"
            alt="{{ $user->name }}"
            width="150"
        >
    @endif

    <input
        type="file"
        name="image"
        accept=".jpg,.jpeg,.png"
    >

    <label>ユーザー名</label>
    <input
        type="text"
        name="name"
        value="{{ old('name', $user->name) }}"
    >

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

    <button type="submit">
        更新する
    </button>

</form>

@endsection