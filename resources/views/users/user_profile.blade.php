@extends('layouts.login')

@section('content')

@foreach($users as $user)
<img src="/storage/{{ $user->images }}">
<a>name {{$user->username}}</a>
<a>bio {{$user->bio}}</a>


@if (auth()->user()->isFollowed($user->id))
    <div class="px-2">
      <span class="px-1 bg-secondary text-light">フォローされています</span>
    </div>
  @endif
  <div class="d-flex justify-content-end flex-grow-1">
    @if (auth()->user()->isFollowing($user->id))
    <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-danger">フォロー解除</button>
    </form>
    @else
    <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
      {{ csrf_field() }}
      <button type="submit" class="btn btn-primary">フォローする</button>
    </form>
    @endif
  </div>

@endforeach

@foreach($posts as $post)

<table>
<tr>
  <td>
    <img src="/storage/{{ $post->user->images }}">
    {{$post->user->username}}
    {{$post->post}}
    {{$post->user->updated_at}}
  </td>
</tr>
</table>
@endforeach


@endsection
