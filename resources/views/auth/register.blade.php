@extends('layouts.logout')

@section('content')


{!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>

<div class="form-group">
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
@if ($errors->has('username'))<li>{{$errors->first('username')}}</li>@endif
</div>

<div class="form-group">
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
@if ($errors->has('mail'))<li>{{$errors->first('mail')}}</li>@endif
</div>

<div class="form-group">
{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}
@if ($errors->has('password'))<li>{{$errors->first('password')}}</li>@endif
</div>

<div class="form-group">
{{ Form::label('パスワード確認') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}
@if ($errors->has('password'))<li>{{$errors->first('password')}}</li>@endif
</div>

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}
l

@endsection
