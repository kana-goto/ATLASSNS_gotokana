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
  <td><img src="/storage/{{ $user->images }}">{{$user->username}}</td>
</tr>
@endforeach
</table>

@endsection
