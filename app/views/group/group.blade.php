@extends('layout.main')

@section('content')

<hr><hr>


	
	@foreach ( $posts as $post )
		@if($post->ongroup==$ongroup)
		<p><h1><a href= "{{URL::route('profile-user',$post->user->username)}}"> {{$post->user->username}}</h1> </a>             {{ $post->post }}</p><hr>
		@endif
	@endforeach
@stop