@extends('layout.main')

@section('content')
	This is the apple group
	@foreach ( $posts as $post )
		<p>{{ $users->username}}{{ $post->post }}</p><hr>
	@endforeach
@stop