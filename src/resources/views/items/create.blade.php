@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/items/create.css') }}">
@endsection

@section('content')
    <div class="create__content">
        <form class="create__form" action="/sell" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="create__heading">商品の出品</h2>
            <div class="item-image">
                <p class="item__label">商品画像</p>
                <div class="image-area">
                    <label class="image-label" for="image">画像を選択する</label>
                    <input class="image-select" type="file" name="image_url" id="image">
                </div>
                @error('image_url')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="item-detail">
                <p class="item-detail__heading">商品の詳細</p>
            </div>
            <div class="category-area">
                <p class="category__label">カテゴリー</p>
                <div class="category-btn__parts">
                    @foreach($categories as $category)
                        <label class="checkbox-btn">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                            <span>{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>
                @error('categories')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="condition-area">
                <p class="condition__label">商品の状態</p>
                <div class="condition__input">
                    <select name="condition">
                        <option value="">選択してください</option>
                        <option value="1" >良好</option>
                        <option value="2" >目立った傷や汚れなし</option>
                        <option value="3" >やや傷や汚れあり</option>
                        <option value="4" >状態が悪い</option>
                    </select>
                </div>
                @error('condition')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="item-description">
                <p class="item-description__heading">商品名と説明</p>
            </div>
            <div class="create__parts">
                <label class="create__label" for="name">商品名</label>
                <input class="create__input" type="text" name="name" id="name" >
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="create__parts">
                <label class="create__label" for="brand_name">ブランド名</label>
                <input class="create__input" type="text" name="brand_name" id="brand_name" >
            </div>
            <div class="create__parts">
                <label class="create__label" for="description">商品の説明</label>
                <div class="create__textarea">
                    <textarea name="description" type="text" id="description"></textarea>
                </div>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="create__parts">
                <label class="create__label" for="price">販売価格</label>
                <div class="yen-input-wrapper">
                    <input class="create__input yen-input" type="number" name="price" id="price">
                </div>
                @error('price')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button class="submit-btn" type="submit">出品する</button>
        </form>
    </div>
@endsection
