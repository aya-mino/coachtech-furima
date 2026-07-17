@extends('layouts.app')

@section('title', '商品詳細')

@section('content')

<img
    src="{{ $item->image }}"
    alt="{{ $item->name }}"
>

<h1>{{ $item->name }}</h1>
<p>{{ $item->brand_name }}</p>
<p>¥{{ number_format($item->price) }}</p>

<form action="/item/{{ $item->id }}/like" method="POST">
    @csrf

    <button type="submit">
        @if ($isLiked)
            <img src="{{ asset('img/heart-active.png') }}" alt="いいね">
        @else
            <img src="{{ asset('img/heart-default.png') }}" alt="いいね">
        @endif
    </button>
</form>

<span>{{ $item->likes_count }}</span>

<img src="{{ asset('img/comment.png') }}" alt="コメント">

<span>{{ $item->comments_count }}</span>

    
    <p>{{ $item->description }}</p>
    @foreach ($item->categories as $category)
        <span>{{ $category->name }}</span>
    @endforeach


<p>状態：{{ $item->condition->name }}</p>

<h3>コメント</h3>

@foreach ($item->comments as $comment)
    <p>{{ $comment->user->name }}</p>
    <p>{{ $comment->content }}</p>
@endforeach

<form action="/item/{{ $item->id }}/comment" method="POST">
    @csrf

    <textarea
        name="content"
        rows="5"
    ></textarea>

    <button type="submit">
        コメントを送信する
    </button>

    @error('content')
    <p>{{ $message }}</p>
    @enderror
</form>

@if ($item->is_sold)
    <button disabled>購入済み</button>

@else
    <a href="/purchase/{{ $item->id }}">購入手続きへ</a>
@endif
@endsection
