@extends('layouts.app')

@section('title', '商品出品')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')

<div class="sell">
    <h1 class="sell__title">商品の出品</h1>

    <form action="/sell" method="post" enctype="multipart/form-data">
        @csrf
    <h2 class="sell-form__sub-title">商品画像</h2>

        <div class="image-upload">
            <input
                class="image-upload__input"
                type="file"
                id="image"
                name="image"
                accept=".jpg,.jpeg,.png"
            >
            <label for="image" class="image-upload__label">画像を選択する</label>
        </div>

        @error('image')
            <p>{{ $message }}</p>
        @enderror

    <h2 class="sell-form__heading">商品の詳細</h2>
        <h3>カテゴリー</h3>

        @foreach ($categories as $category)
            <label class="category-label">
                <input
                    class="category-label__input"
                    type="checkbox"
                    name="categories[]"
                    value="{{ $category->id }}"
                >
                <span class="category-label__text">
                    {{ $category->name }}
                </span>
            </label>
        @endforeach

        @error('categories')
                <p>{{ $message }}</p>
        @enderror

        <h3>商品の状態</h3>
        <select name="condition_id">
            <option value="">選択してください</option>
    
            @foreach ($conditions as $condition)
                <option value="{{ $condition->id }}">
                    {{ $condition->name }}
                </option>
            @endforeach
        </select>

        @error('condition_id')
            <p>{{ $message }}</p>
        @enderror

    <h2 class="sell-form__heading">商品名と説明</h2>
        <div class="form-group">
            <label class="form-group__label">商品名</label>
            <input
                class="form-group__input"
                type="text"
                name="name"
            >
                @error('name')
                <p>{{ $message }}</p>
                @enderror
        </div>

        <div class="form-group">
            <label class="form-group__label">ブランド名</label>
            <input
                class="form-group__input"
                type="text"
                name="brand_name"
            >
        </div>

        <div class="form-group">
            <label class="form-group__label">商品の説明</label>
            <textarea
                class="form-group__textarea"
                name="description"
                rows="5">
            </textarea>

            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-group__label">販売価格</label>

            <div class="price-input">
                <span class="price-input__mark">￥</span>

                <input
                    class="price-input__field"
                    type="number"
                    name="price"
                >
            </div>
            @error('price')
                <p>{{ $message }}</p>
            @enderror
        </div>

    <button class="sell-form__submit" type="submit">出品する</button>

    </form>
</div>
@endsection