@extends('layouts.login')

@section('content')
Follow List
@foreach($users as $user)
<img src="/storage/{{ $user->images }}">
@endforeach

<table>
@foreach($posts as $post)
<tr>
  <td><a href="/users/{{ $post->user->id }}/user_profile"><img src="/storage/{{ $post->user->images }}"></a>
  {{$post->user->username}}
  {{$post->post}}
  {{$post->user->updated_at}}
</td>
</tr>
@endforeach
</table>
@endsection
