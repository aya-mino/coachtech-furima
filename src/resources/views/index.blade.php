@extends('layouts.app')

@section('title', '商品一覧')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="item-list">
    <div class="item-list__tab">
        <a href="/" class="item-list__tab-link">おすすめ</a>
        <a href="/?tab=mylist" class="item-list__tab-link">マイリスト</a>
    </div>

    <form class="item-list__search" action="/" method="get">
        <input
            class="item-list__search"
            type="text"
            name="keyword"
            value="{{ request('keyword') }}"
            placeholder="なにをお探しですか？"
        >
        <button
            class="item-list__search-button "
            type="submit">検索</button>
    </form>

    <div class="item-list__content">

        @foreach ($items as $item)
            <a href="/item/{{ $item->id }}" class="item-card">

                <img
                    class="item-card__image"
                    src="{{ $item->image }}"
                    alt="{{ $item->name }}"
                >

                @if ($item->is_sold)
                    <p>Sold</p>
                @endif

                <p class="item-card__name">{{ $item->name }}</p>

            </a>   
        @endforeach
    </div>
</div>
@endsection