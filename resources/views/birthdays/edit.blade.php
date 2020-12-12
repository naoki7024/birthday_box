@extends('layouts.layout')
@section('title', 'Birthday Box')

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

<!-- バリデーション表示 -->
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div>
  @endif
<div class="form_container">
  <form action="{{route('birthdays.update', $birthdays->id)}}" method="post">
    @csrf
    @method('PATCH')
    <!-- 名前 -->
    <div class="forms">
      <label>お相手</label>
      <input type="text" name="name" id ="name" class="common" value="{{old('name') ?? $birthdays->name}}">
      <span class="focus"></span>
    </div>
    <br>
    <!-- 生年月日 -->
    <div class="forms">
      <label>生まれ   （例）20210101</label>
      <input type="text" name="birthday" id ="birthdays" class="common" value="{{old('birthday') ?? $birthdays->birthday}}">
      <span class="focus"></span>
    </div>
    <!-- メモ -->
    <br>
    <div class="forms">
      <label>メモ</label>
      <input type="text" name="info" class="common" value="{{old('info') ?? $birthdays->info}}">
      <span class="focus"></span>
    </div>
    <div class="button_wrapper">
      <button class="button1" type="submit">BOXに入れなおす</button>
    </div>
  </form>
  <a href="{{ route ('birthdays.show', $birthdays->id)}}" id="button3">戻る</a>
</div>