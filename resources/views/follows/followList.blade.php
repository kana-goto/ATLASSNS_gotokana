@extends('layouts.login')

@section('content')
Follow List

<table>
@foreach($users as $user)
<img src="/storage/{{ $user->images }}">
<tr>
  <td><img src="/storage/{{ $user->images }}">
  {{$user->username}}




</td>
</tr>
@endforeach
</table>
@endsection
