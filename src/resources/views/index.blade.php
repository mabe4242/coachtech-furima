@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="list-nav">
        <a class="list-nav__tab active" href="#">おすすめ</a>
        <a class="list-nav__tab" href="#">マイリスト</a>
    </div>
    <div class="item__wrapper">
        @foreach ($items as $item)
        <div class="item-card">
            <a href="/item/{{ $item->id }}">
                <img src="{{ $item->image_full_path }}" alt="{{ $item->name }}の画像" class="item-image">
                <p class="item-name">{{ $item->name }}</p>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
