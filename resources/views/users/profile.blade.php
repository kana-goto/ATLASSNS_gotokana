@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/profile','method' => 'post', 'files' => true]) !!}

<div class="form-group">
  {{Form::label('username','user name')}}
  {{Form::text('username', $user->username, ['class' => 'form-control', 'id' =>'username'])}}
  <span class="text-danger">{{$errors->first('name')}}</span>
</div>

<div class="form-group">
  {{Form::label('mail','mail address')}}
  {{Form::text('mail', $user->mail, ['class' => 'form-control', 'id' =>'mail'])}}
  <span class="text-danger">{{$errors->first('mail')}}</span>
</div>

<div class="form-group">
  {{Form::label('password','password')}}
  {{Form::password('password', ['class' => 'form-control','placeholder' => 'パスワード'])}}
  <span class="text-danger">{{$errors->first('password')}}</span>
</div>

<div class="form-group">
  {{Form::label('password','password confirm')}}
  {{Form::password('password_confirmation', ['class' => 'form-control','placeholder' => 'パスワード確認'])}}
  <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
</div>

<div class="form-group">
  {{Form::label('bio','bio')}}
  {{Form::text('bio', $user->bio, ['class' => 'form-control'])}}
  <span class="text-danger">{{$errors->first('bio')}}</span>
</div>

<div class="form-group">
  {{Form::label('images','icon image')}}
  {{Form::file('images', ['class' => 'custom-file-input'])}}
  <span class="text-danger">{{$errors->first('images')}}</span>
</div>

{{ Form::submit('更新') }}

{!! Form::close() !!}


@endsection
