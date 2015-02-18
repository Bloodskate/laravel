@extends('layout.main')

@section('content')
	@if(Auth::check())
		@if($user->username==Auth::user()->username)
			<h1>Hello {{$user->username}}.</h1>
			<a href="{{URL::route('account-change-password')}}">Change Password</a><br>
			
			
		@else
			<h1> {{$user->username}}.</h1><br>
			<h3>About {{$user->username}}<br><br></h3>	
			Email:: {{$user->email}}.<br>
			Username:: {{$user->username}}. <br>
			Group:: {{$group->group1}}. <br>
		@endif
	@else
		<h1> {{$user->username}}.</h1><br>
		<h3>About {{$user->username}}<br><br></h3>	
		Email:: {{$user->email}}.
		Username:: {{$user->username}}. <br>
		Group:: {{$group->group1}}. <br>

	@endif
	<h1>Posts</h1>
	@foreach( $posts as $post )

		<p> {{ $post->user->created_at }}  {{ $post->post }} on <a href="{{URL::route('group',$post->ongroup)}}">{{$post->ongroup}}</a><br></p><hr>
	@endforeach
	
@stop