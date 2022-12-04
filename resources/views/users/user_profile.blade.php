@extends('layouts.login')

@section('content')
@foreach($users as $user)
<li class="post-block2">
  <figure><img src="/storage/{{ $user->images }}"></figure>
  <div class="post-content2">
    <div>
      <div class="user-name">name</div>
      <div class="user-data">{{$user->username}}</div>
    </div>
    <div>
      <div class="user-name">bio</div>
      <div class="user-data">{{$user->bio}}</div>
    </div>
    <div class="d-flex justify-content-end flex-grow-1">
    @if (auth()->user()->isFollowing($user->id))
    <form action="{{ route('unfollow', [$user->id]) }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-danger">フォロー解除</button>
    </form>
    @else
    <form action="{{ route('follow', [$user->id]) }}" method="POST">
      {{ csrf_field() }}
      <button type="submit" class="btn btn-primary">フォローする</button>
    </form>
    @endif
    </div>
  </div>
</li>
@endforeach

@foreach($posts as $post)
<ul>
  <li class="post-block">
    <figure><img src="/storage/{{ $post->user->images }}"></figure>
    <div class="post-content">
      <div>
        <div>{{$post->user->username}}</div>
        <div>{{$post->user->updated_at}}</div>
      </div>
      <div>{{$post->post}}</div>
    </div>
  </li>
</ul>

@endforeach


@endsection
