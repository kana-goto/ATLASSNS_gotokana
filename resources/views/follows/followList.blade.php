@extends('layouts.login')

@section('content')
<li class="post-block2">
  <h2>Follow List</h2>
  @foreach($users as $user)
  <figure><img src="/storage/{{ $user->images }}"></figure>
  @endforeach
</li>

@foreach($posts as $post)
<ul>
  <li class="post-block">
    <figure><a href="/users/{{ $post->user->id }}/user_profile"><img src="/storage/{{ $post->user->images }}"></a></figure>
    <div class="post-content">
      <div>
        <div class="post-name">{{ $post->user->username}}</div>
        <div>{{ $post->updated_at }}</div>
      </div>
      <div>{{$post->post}}</div>
    </div>
  </li>
</ul>

@endforeach

@endsection
