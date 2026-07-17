@extends('layouts.app')

@section('title', 'マイページ')

@section('content')

@if ($user->image)
    <img
        src="{{ asset('storage/' . $user->image) }}"
        alt="{{ $user->name }}"
        width="150"
    >
@endif

<h1>{{ $user->name }}</h1>

<a href="/mypage/profile">プロフィールを編集</a>

<a href="/mypage?page=sell">出品した商品</a>
<a href="/mypage?page=buy">購入した商品</a>

@foreach ($items as $item)

    <img
        src="{{ $item->image }}"
        alt="{{ $item->name }}"
    >

    <p>{{ $item->name }}</p>

@endforeach

@endsection