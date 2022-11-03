@extends('layouts.login')

@section('content')

<form method="post" action="{{ url('/search')}}">
  <input type="search" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{$search}} @endif">
  <button type="submit">検索</button>
{{ csrf_field() }}
</form>

<table>
@foreach($users as $user)
<tr>
  <td><img src="/storage/{{ $user->images }}">
  {{$user->username}}

  <form action="{{ route('follow', [$user->id]) }}" method="POST">
  {{ csrf_field() }}
  <button type="submit" class="btn btn-primary">フォローする</button>
  </form>
  <form action="{{ route('unfollow', [$user->id]) }}" method="POST">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
  <button type="submit" class="btn btn-danger">フォロー解除</button>
  </form>
</td>
</tr>
@endforeach
</table>

@endsection
