@extends('layouts.layout')
@section('title', 'Clinic Box')

<header>
  <h1>
  <a href="/"　class="header_logo">Clinic Box</a>  
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

@section('content')
<!-- 誕生日投稿 -->
  <form id="formPost" method="POST" action="{{ route('birthdays.store') }}" >
    {{@csrf_field()}}
    <!-- 名前 -->
    <div class="forms">
      <input class="common" type="text" name="name" placeholder="">
      <label>クリニック名</label>
      <span class="focus"></span>
    </div>
    <br>
    <!-- 生年月日 -->
    <div class="forms">
      <input class="common" type="text" name="birthday" placeholder="">
      <label>通院日（例）20210101</label>
      <span class="focus"></span>
    </div>
    <br>
    <div class="forms">
      <input class="common" type="text" name="info" placeholder="">
      <label>症状</label>
      <span class="focus"></span>
    </div>
    <div class="button_wrapper">
      <button class="button1" type="submit">BOXに入れる</button>
    </div>
  </form>
  <!-- バリデーション表示 -->
@if ($errors->any())
  <div class="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div>
  @endif

<div class="posts_container">
  <!-- 誕生日一覧表示 -->
  <table class="table">
    <!-- データを繰り返し処理で取得していく -->
    <tbody>
      @foreach($datas as $data)
      <tr>
        <th class="icon "></th>
        <th> {{$data->name}}</th>
        <td id="birthday">{{$data->birthday}}</td>
        <td>
        <a href="{{ route ('birthdays.show', $data->id)}}" id="button1">詳細</a>
      </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
    <div class="paginate">
    {{ $datas->links() }}
    </div>
@endsection
  
  
