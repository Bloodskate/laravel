@extends('layout.main')

@section('content')
	This is the apple group
	@foreach ( $posts as $post )
		<p><h1><a href= "{{URL::route('profile-user',$post->user->username)}}"> {{$post->user->username}}</h1> </a>             {{ $post->post }}</p><hr>
	@endforeach
@stop