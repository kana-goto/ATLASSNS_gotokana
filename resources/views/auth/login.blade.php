@extends('layouts.logout')

@section('content')


{!! Form::open(['url' => '/login']) !!}

<p>AtlasSNSへようこそ</p>
<div class="form-group">
{{ Form::label('mail address') }}
{{ Form::text('mail',null,['class' => 'input']) }}
</div>
<div class="form-group">
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}
</div>

{{ Form::submit('LOGIN', ['class'=>'btn btn-login']) }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}



@endsection
