@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/items/show.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="image__part">
        <div class="item__image">
            <img class="item-image" src="{{ $item->image_full_path }}" alt="{{ $item->name }}の画像">
        </div>
    </div>
    <div class="detail__part">
        <div class="item__name">
            <h1 class="item-name">{{ $item->name }}</h1>
            <span class="brand-name">{{ $item->brand_name}}</span>
            <p class="price">¥{{ $item->tax_price }}（税込）</p>
            <div class="icon__part">
                <div class="icon__like">
                    <img id="" class="star" src="{{ asset('icons/star.png') }}" alt="いいねのアイコン画像">
                    <span id="" class="count">3</span>
                </div>
                <div class="icon__comment">
                    <img id="" class="comment" src="{{ asset('icons/comment.png') }}" alt="コメントのアイコン画像">
                    {{-- <span id="" class="count">{{ $item->comments->count() }}</span> --}}
                </div>
            </div>
            <a class="purchase-btn" href="">購入手続きへ</a>
        </div>
        <div class="item__description">
            <h2 class="item-description">商品説明</h2>
            <div class="description">{{ $item['description'] }}</div>
        </div>
        <div class="item__detail">
            <h2 class="item-detail">商品の情報</h2>
            <div class="category__part">
                <p class="category-label">カテゴリー</p>
                <div class="categories">
                    @foreach ($item->categories as $category)
                        <p class="category-parts">{{ $category->name }}</p>
                    @endforeach
                </div>
            </div>
            <div class="condition__part">
                <p class="condition-label">商品の状態</p>
                <p class="item-condition">{{ $item->item_condition }}</p>
            </div>
        </div>
        {{-- <div class="comment__part">
            <h2 class="comment__heading">コメント（{{ $item->comments->count() }}）</h2>
            @foreach ($item->comments as $comment)
                <div class="user-comment">
                    <div class="user-profile">
                        <img class="profile-icon" src="{{ asset('profiles/noimage.png') }}" alt="ユーザープロフィール画像">
                        <p class="user-name">admin</p>
                    </div>
                    <div class="comment-message">
                        <p>{{ $comment->comment }}</p>
                    </div>
                </div>
            @endforeach
        </div> --}}
        <form class="comment-form" action="{{ route('comment.store', $item->id) }}" method="POST">
            @csrf
            <label class="comment__label" for="item-comment">商品へのコメント</label>
            <div class="item-comment">
                <textarea name="comment" id="item-comment"></textarea>
            </div>
            @error('comment')
                <div class="error">{{ $message }}</div>
            @enderror
            <button class="submit-btn" type="submit">コメントを送信する</button>
        </form>
    </div>
</div>
@endsection
