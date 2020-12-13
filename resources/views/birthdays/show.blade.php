@extends('layouts.layout')
@section('title', 'Birthday Box')
@section('content')

<header>
  <h1>
  <a href="/"　class="header_logo">Birthday Box</a>  
  </h1>
  <nav class="pc-nav">
    <ul>
    @if (Route::has('login'))
    @auth
    <li></li>
    @else
    <li><a href="{{ route('login') }}">ログイン</a></li>

    @if (Route::has('register'))
        <li><a href="{{ route('register') }}">会員登録</a><li>
    @endif
    @endauth
    @endif
    </ul>
  </nav>
</header>

<div class="profile-card">
  <div class="profile-card__inner">
  <div class="profile-thumb">
    <img src="/img/gift.png" alt="アイコン">
  </div>
  <div class="profile-content">
    <span class="profile-name">{{$birthdays->name}}</span>
    <span class="profile-job">{{$birthdays->info}}</span>
    <span class="profile-intro">{{$birthdays->birthday}}</span>
  </div>
    </div>
</div>
<div class="button_group">
  <a href="{{ route ('birthdays.edit', $birthdays->id)}}" id="button1">変更</a>
  <a href="{{ route ('birthdays.destroy', $birthdays->id)}}" id="button2">削除</a>
  <a href="{{ route ('birthdays.index')}}" id="button3">戻る</a>
</div>
  </div>
</div>