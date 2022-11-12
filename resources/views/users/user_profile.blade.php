@extends('layouts.login')

@section('content')


@foreach($posts as $post)

<table>
<tr>
  <td>
    <img src="/storage/{{ $post->user->images }}">
    {{$post->user->username}}
    {{ $post->post }}
    {{$post->user->updated_at}}
  </td>
</tr>
</table>
@endforeach


@endsection
