@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css')}}">
@endsection

@section('link')
<div class="header__menu">
    <a class="header__link" href="/">ホーム</a>
    <a class="header__link" href="/attendance">日付一覧</a>
    <form class="logout" action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">ログアウト</button>
    </form>
</div
@endsection

@section('content')
<div class="time-records">
    <table class="time__table">
        <tr class="time__row">
            <th class="time__label">名前</th>
            <th class="time__label">勤務開始</th>
            <th class="time__label">勤務終了</th>
            <th class="time__label">休憩時間</th>
            <th class="time__label">勤務時間</th>
        </tr>
        @foreach ($timestamps as $timestamp)
        <tr class="time__row">
            <td class="time__data">{{$timestamp->name}}</td>
            <td class="time__data">{{$timestamp->workIn}}</td>
            <td class="time__data">{{$timestamp->workOut}}</td>
            <td class="time__data">{{$timestamp->breakIn}}</td>
            <td class="time__data">{{$timestamp->breakOut}}</td>
        </tr>
        @endforeach
    </table>
    {{ $timestamps->links() }}
</div>
@endsection