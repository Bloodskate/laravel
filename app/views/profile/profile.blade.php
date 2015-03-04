@extends('layout.main')

@section('content')
	@if(Auth::check())
		@if($user->username==Auth::user()->username)
			<h1>Hello {{$user->name}}.</h1>
			<a href="{{URL::route('account-change-password')}}"><font color='yellow'>Change Password</font></a><br>
			<form action = "{{ URL::route('status-update-post')}}" method = "post" id = 'status'>
			<div class = 'field'>
				Update status : <br><textarea form ="status" name="status"  cols="55" rows = '4' wrap="soft"></textarea>
			</div>
			<div class = 'field'>
				<input type = 'submit' value = 'Post'>
			</div>
			{{Form::token()}}
		
			
		@else
			<h1> {{$user->name}}.</h1><br>
			<h3>About {{$user->name}}<br><br></h3>	
			Email:: {{$user->email}}.<br>
			Username:: {{$user->username}}. <br>
		@endif
	@else
		<h1> {{$user->name}}.</h1><br>
		<h3>About {{$user->name}}<br><br></h3>	
		Email:: {{$user->email}}.
		Username:: {{$user->username}}. <br>
	@endif
	
	<h1>Posts</h1>
	
		@foreach( $posts as $post )

			<p> {{ $post->created_at }} ... {{ $post->post }}  
				... 
					
					@if($user->username==Auth::user()->username)  
						<a href="{{URL::route('status-delete', $post->id)}}">
							<font color = 'yellow'>Delete post      
							</font>
						</a> 
						|
					@endif 

				<a href = "{{URL::route('reply',$post->id)}}"><font color = 'yellow'> Reply </font> </a> </p>
				@foreach($post->reply as $reply)
					----->{{$reply->reply}} by <a href = "{{URL::route('profile-user', $reply->user->username)}}"><font color = 'yellow'>{{$reply->user->name}}</font></a><br>
				@endforeach 
				<hr>
		@endforeach

	
@stop