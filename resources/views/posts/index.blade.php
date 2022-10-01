@extends('layouts.login')

@section('content')

 {!! Form::open(['url' => '/top']) !!}
 <div class="form-group">
   {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
 </div>
 <button type="submit" class="btn btn-success pull-right">追加</button>
 {!! Form::close() !!}
 <table>
 @foreach ($list as $list)
            <tr>
                <td>{{ $list->user_id }}</td>
                <td>{{ $list->post }}</td>
                <td>{{ $list->created_at }}</td>
            </tr>
 @endforeach
</table>

@endsection
