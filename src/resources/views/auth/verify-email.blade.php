@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/verify.css') }}">
@endsection

@section('content')
    <div class="verify-notice">
        <div class="verify-notice__parts">
            <p>登録していただいたメールアドレスに認証メールを送付しました。<br/>メール認証を完了してください。</p>
            <form method="GET" action="/mypage/profile">
                <button type="submit" class="verify-button">
                    認証はこちらから
                </button>
            </form>
            <div class="resend__link">
                <a class="button-submit" href="">認証メールを再送する</a>
            </div>
        </div>
    </div>
@endsection
