@extends('layouts.login')

@section('content')
<li class="post-block2">

  <figure><?php $user = Auth::user(); ?><img src="/storage/{{ $user->images }}"></figure>

    {!! Form::open(['url' => 'post/create']) !!}
 <div class="form-group">
   {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form', 'placeholder' => '投稿内容を入力してください。']) !!}
 </div>
 <button type="submit" class="post"><img src="images/post.png" class="post-btn"></button>

 {!! Form::close() !!}


</li>




@foreach ($posts as $post)

<ul>
  <li class="post-block">
    <figure><img src="/storage/{{ $post->user->images }}"></figure>
    <div class="post-content">
      <div>
        <div class="post-name">{{ $post->user->username}}</div>
        <div>{{ $post->updated_at }}</div>
      </div>
      <div>{{ $post->post }}</div>
      <div>
          @if (Auth::user()->id == $post->user_id)
            <div class="content">
              <a class="js-modal-open" href="/top" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="images/edit.png" class="post-btn2"></a>
              <a class="delate" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash.png" class="post-btn2" ></a>
            </div>
            @endif
      </div>
    </div>
  </li>
</ul>

 @endforeach


   <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="{{ url('post/update')}}" method="post">
                <textarea name="upPost" class="modal_post" cols="80" rows="5" ></textarea>
                <input type="hidden" name="id" class="modal_id" value="更新">
                <input type ="image" name="submit" width="40" height="40" src="images/edit.png">
                {{ csrf_field() }}
           </form>
        </div>
    </div>

@endsection
