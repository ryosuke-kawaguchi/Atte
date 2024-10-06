@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/stamp.css')}}">
@endsection

@section('link')
<a class="header__link" href="/">ホーム</a>
<a class="header__link" href="/attendance">日付一覧</a>
<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit">ログアウト</button>
</form>

@endsection

@section('content')
<div class="timetable">
    @if(session('message'))
    <div class="alert">{{session('message')}}</div>
    @endif
    <div class="timetable-worker">
            <p class="timetable-worker__text">{{ Auth::user()->name }}さんお疲れ様です！</p>
    </div>
    <form class="work-start" action="/workin" method="post">
        @csrf
            <button class="work-start">勤務開始</button>
    </form>
    <form class="work-finish" action="/workout" method="post">
        @csrf
            <button class="work-finish" action="/workout" method="post">勤務終了</button>
    </form>
</br>
    <form class="rest-start" action="/breakin" method="post">
        @csrf
            <button class="rest-start" action="/restin" method="post">休憩開始</button>
    </form>
    <form class="rest-finish" action="/breakout" method="post">
        @csrf
            <button class="rest-finish" action="/breakout" method="post">休憩終了</button>
    </form>
</div>
@endsection