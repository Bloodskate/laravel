@extends('layout.main')

@section('content')
	@if(Auth::check())
		@if($user->username==Auth::user()->username)
			<h1>Hello {{$user->username}}.</h1>
			<a href="{{URL::route('account-change-password')}}">Change Password</a><br>
			<a href="{{URL::route('status-update')}}">Status</a>
			
		@else
			<h1> {{$user->username}}.</h1><br>
			<h3>About {{$user->username}}<br><br></h3>	
			Email:: {{$user->email}}.<br>
			Username:: {{$user->username}}. <br>
			Group:: {{$group->primarygroup}}. <br>
		@endif
	@else
		<h1> {{$user->username}}.</h1><br>
		<h3>About {{$user->username}}<br><br></h3>	
		Email:: {{$user->email}}.
		Username:: {{$user->username}}. <br>
		Group:: {{$group->primarygroup}}. <br>

	@endif
	<h1>Posts</h1>
	@foreach( $posts as $post )

		<p> {{ $post->created_at }} {{ $post->post }} </p><hr>
	@endforeach
@stop