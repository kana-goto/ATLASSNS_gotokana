@extends('layouts.login')

@section('content')
Follow List

<table>
@foreach($posts as $post)
<img src="/storage/{{ $post->user->images }}">
<tr>
  <td><img src="/storage/{{ $post->user->images }}">
  {{$post->user->username}}
  {{ $post->post }}




</td>
</tr>
@endforeach
</table>
@endsection
