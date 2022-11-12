@extends('layouts.login')

@section('content')
 {!! Form::open(['url' => 'post/create']) !!}
 <div class="form-group">
   {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
 </div>
 <button type="submit" class="btn btn-success pull-right">投稿ボタン</button>
 {!! Form::close() !!}
 <table>
 @foreach ($posts as $post)
            <tr>
                <td><img src="/storage/{{ $post->user->images }}"></td>
                <td>{{ $post->user->username}}</td>
                <td>{{ $post->post }}</td>
                <td>{{ $post->updated_at }}</td>
            </tr>
            <div class="content">
              <!-- 投稿の編集ボタン -->
              <a class="js-modal-open" href="/top" post="{{ $post->post }}" post_id="{{ $post->user_id }}">編集</a>
              <a class="delate" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a>
            </div>
 @endforeach
</table>

   <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="{{ url('post/update')}}" method="post">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="更新">
                <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="/top">閉じる</a>
        </div>
    </div>

@endsection
