@extends('layouts.login')

@section('content')
<ul>
  <figure class='form-image'><?php $user = Auth::user(); ?><img src="/storage/{{ $user->images }}" class='user-icon'></figure>
  <li class="post-block3">
    {!! Form::open(['url' => '/profile','method' => 'post', 'files' => true]) !!}
    <div class="form-group">
      <div class='form-name'>
        {{Form::label('username','user name')}}
      </div>
      <div>
        {{Form::text('username', $user->username, ['class' => 'form-control', 'id' =>'username'])}}
        <span class="text-danger">{{$errors->first('name')}}</span>
      </div>
    </div>
    <div class="form-group">
      <div class='form-name'>
        {{Form::label('mail','mail address')}}
      </div>
      <div>
        {{Form::text('mail', $user->mail, ['class' => 'form-control', 'id' =>'mail'])}}
        <span class="text-danger">{{$errors->first('mail')}}</span>
      </div>
    </div>
    <div class="form-group">
      <div>
        {{Form::label('password','password')}}
      </div>
      <div>
        {{Form::password('password', ['class' => 'form-control','placeholder' => 'パスワード'])}}
        <span class="text-danger">{{$errors->first('password')}}</span>
      </div>
    </div>
    <div class="form-group">
      <div>
        {{Form::label('password','password confirm')}}
      </div>
      <div>
        {{Form::password('password_confirmation', ['class' => 'form-control','placeholder' => 'パスワード確認'])}}
        <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
      </div>
    </div>
    <div class="form-group">
      <div>
        {{Form::label('bio','bio')}}
      </div>
      <div>
        {{Form::text('bio', $user->bio, ['class' => 'form-control'])}}
        <span class="text-danger">{{$errors->first('bio')}}</span>
      </div>
    </div>
    <div class="form-group">
      <div>
        {{Form::label('images','icon image')}}
      </div>
      <div>
        {{Form::file('images', ['class' => 'custom-file-input'])}}
        <span class="text-danger">{{$errors->first('images')}}</span>
      </div>
    </div>
    <div class="form-group">
      <div></div>
      <div></div>
    </div>
    {{ Form::submit('更新',['class' => 'update']) }}
    {!! Form::close() !!}
  </li>
</ul>




@endsection
