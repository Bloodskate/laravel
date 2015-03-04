
@extends('layout.main')

@section('content')

  //Admin le matra sab user dekhne rakhne
	<h1> All Users </h1>
 @foreach($users as $user)
 	<b><h3><a href = "{{URL::route('profile-user',$user->username)}}"><font color = 'yellow'>{{$user->name}}</font></a></h3> </b><hr>
 @endforeach
@stop