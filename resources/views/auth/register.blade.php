@extends('layouts.logout')

@section('content')


{!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>

<div class="form-group">
{{ Form::label('user name') }}
{{ Form::text('username',null,['class' => 'input']) }}
@if ($errors->has('username'))<li>{{$errors->first('username')}}</li>@endif
</div>

<div class="form-group">
{{ Form::label('mail adress') }}
{{ Form::text('mail',null,['class' => 'input']) }}
@if ($errors->has('mail'))<li>{{$errors->first('mail')}}</li>@endif
</div>

<div class="form-group">
{{ Form::label('password') }}
{{ Form::password('password',null,['class' => 'input']) }}
@if ($errors->has('password'))<li>{{$errors->first('password')}}</li>@endif
</div>

<div class="form-group">
{{ Form::label('password comfirm') }}
{{ Form::password('password_confirmation',null,['class' => 'input']) }}
@if ($errors->has('password'))<li>{{$errors->first('password_confirmation')}}</li>@endif
</div>

{{ Form::submit('REGISTER', ['class'=>'btn btn-login']) }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
