@extends('layouts.login')

@section('content')
 {!! Form::open(['url' => '/top']) !!}
 <div class="form-group">
   {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
 </div>
 <button type="submit" class="btn btn-success pull-right">追加ボタン</button>
 {!! Form::close() !!}
 <table>
 @foreach ($list as $list)
            <!-- <tr>
                <td>{{ $list->user_id }}</td>
                <td>{{ $list->post }}</td>
                <td>{{ $list->created_at }}</td>
            </tr> -->
            <div class="content">
              <!-- 投稿の編集ボタン -->
              <a class="js-modal-open" href="/top" post="{{ $list->post }}" post_id="{{ $list->user_id }}">編集</a>
            </div>
 @endforeach
</table>

   <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="{{ url('/top')}}" method="post">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="更新">
                <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="/top">閉じる</a>
        </div>
    </div>

@endsection
