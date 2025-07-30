@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profiles/profile.css') }}">
@endsection

@section('content')
<div class="profile__content">
    <form class="profile__form" action="/mypage/profile" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <h2 class="profile__heading">プロフィール設定</h2>

        <div class="image-area">
            {{-- Javascriptで画像表示の制御 --}}
            <img src="/profiles/noimage.png" alt="プロフィール画像" class="image-parts">
            <label class="image-label" for="image">画像を選択する</label>
            <input class="image-select" type="file" name="photo" id="image">
        </div>

        <div class="profile__parts">
            <label class="profile__label" for="user_name">ユーザー名</label>
            <input class="profile__input" type="text" name="user_name" id="user_name" >
            @error('user_name')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="profile__parts">
            <label class="profile__label" for="postcode">郵便番号</label>
            <input class="profile__input" type="text" name="postcode" id="postcode" >
            @error('postcode')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="profile__parts">
            <label class="profile__label" for="address">住所</label>
            <input class="profile__input" type="text" name="address" id="address" >
            @error('address')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="profile__parts">
            <label class="profile__label" for="building">建物名</label>
            <input class="profile__input" type="text" name="building" id="building" >
            @error('building')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button class="submit-btn" type="submit">更新する</button>
    </form>
</div>

@endsection