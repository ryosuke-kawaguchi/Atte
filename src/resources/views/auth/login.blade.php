@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css')}}">
@endsection

@section('content')
<div class="login-form">
    <h2 class="login-form__heading">ログイン</h2>
    <div class="login-form__inner">
        <form class="login-form__form" action="{{route('login')}}" method="post">
            @csrf
            <div class="login-form__group">
                <input class="login-form__input" type="text" name="email" placeholder="メールアドレス">
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <div class="login-form__group">
                <input class="login-form__input" type="password" name="password" placeholder="パスワード">
                @error('password')
                {{ $message }}
                @enderror
            </div>
            <input class="login-form__btn" type="submit" value="ログイン">
        </form>
        <div class="unregistered">
            <p class="unregistered__text">アカウントをお持ちでない方はこちら</p>
            <a class="to__register" href="/register">会員登録</a>
        </div>
    </div>
</div>
@endsection