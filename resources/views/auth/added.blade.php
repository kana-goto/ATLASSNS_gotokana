@extends('layouts.logout')

@section('content')

<div id="clear">
  <p>
    <?php
    session_start();
    $_SESSION['username'] = '〇〇';
    echo $_SESSION['username'].'さん';
    unset($_SESSION['username']);
    ?>
  </p>
  <p>ようこそ！AtlasSNSへ！</p>
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>

  <p class="btn"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection
