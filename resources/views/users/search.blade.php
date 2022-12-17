@extends('layouts.login')

@section('content')
<li class="post-block2">
    <form method="post" action="{{ url('/search')}}">
  <input type="search" placeholder="ユーザー名" name="search" >
  <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button>
  {{ csrf_field() }}
  </form>
  <div class="word">
    @if (isset($search)) 検索ワード：{{$search}} @endif
  </div>
</li>




@foreach($users as $user)
<ul>
  <li class="post-block3">
    <figure><a href="/users/{{ $user->id }}/user_profile"><img src="/storage/{{ $user->images }}" class='user-icon'></a></figure>
    {{$user->username}}
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
  </li>
</ul>



@endforeach


@endsection
