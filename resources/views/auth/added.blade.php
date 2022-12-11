@extends('layouts.logout')

@section('content')

<div id="clear">
  <div>
    @if (Session::has('username'))
    <p>{{ session('username') }}さん</p>
    @endif
    <p>ようこそ！AtlasSNSへ！</p>
  </div>
  <div class='message'>
    <p>ユーザー登録が完了しました。</p>
    <p>早速ログインをしてみましょう。</p>
  </div>
  <div>
    <p class='login-btn'><a href="/login">ログイン画面へ</a></p>
  </div>
</div>


@endsection
