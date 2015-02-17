<!DOCTYPE html>
<html>
	<head>
		<title>Laravel</title>
	</head>
<body>
	@if(Auth::check())
		Aryocor
	@else
		Welcome to Aryocor!!
		<form action = "{{ URL::route('account-sign-in-post')}}" method = "post">

		<div class = "field">
		
			Email: <input type = 'text' name = 'email' {{ (Input::old('email')) ? ' value = "'. e(Input::old('email')) .'"' : ''}}>
		
			@if($errors->has('email'))
				{{ $errors->first('email')}}
			@endif
		
		</div>
		
		<div class = "field">
		
			Password: <input type = 'password' name = 'password'>
		
			@if($errors->has('password'))
				{{ $errors->first('password')}}
			@endif
		
		</div>

		<div class = "field">
		
			<input type = "checkbox"name = "remember"  id = "remember">
			<label for ="remember">
				Remember me.
			</label>
		
		</div>

		
		<input type = "submit" value = "Sign In" >
		{{ Form::token()}}
	</form>
		
		
	@endif
	

	@if(Session::has('global'))
		<p>{{ Session::get('global') }}</p>
	@endif
	@include('layout.navigation')
	@yield('content')

</body>

</html>