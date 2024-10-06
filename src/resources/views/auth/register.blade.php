@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
@endsection

@section('content')
<div class="register-form">
    <h2 class="register-form__heading content__heading">会員登録</h2>
    <div class="register-form__inner">
        <form class="register-form__form" action="{{route('register')}}" method="post">
            @csrf
            <div class="register-form__group">
                <input  class="register-form__input" type="text" name="name" id="name" placeholder="名前">
                @error('name')
                {{ $message }}
                @enderror
            </div>
            <div class="register-form__group">
                <input  class="register-form__input" type="mail" name="email" id="email" placeholder="メールアドレス">
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <div class="register-form__group">
                <input  class="register-form__input" type="password" name="password" placeholder="パスワード">
                @error('password')
                {{ $message }}
                @enderror
            </div>
            <div class="register-form__group">
                <input  class="register-form__input" type="password" name="password_confirmation" placeholder="確認用パスワード">
                @error('password')
                {{ $message }}
                @enderror
            </div>
            <input class="register-form__btn" type="submit" value="会員登録">
        </form>
        <div class="already__done">
            <p class="login__text">アカウントをお持ちの方はこちら</p>
            <a class="to__login" href="/login">ログイン</a>
        </div>
    </div>
</div>
@endsection