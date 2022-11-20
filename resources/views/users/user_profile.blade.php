@extends('layouts.login')

@section('content')

@foreach($users as $user)
<img src="/storage/{{ $user->images }}">
<a>name {{$user->username}}</a>
<a>bio {{$user->bio}}</a>


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
