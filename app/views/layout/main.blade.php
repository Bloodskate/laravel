<!DOCTYPE html>
<html>
	<head>
		<title>Laravel</title>
	</head>
<body>
	<body bgcolor = 'black'><font color = 'white'>
	

	@if(Session::has('global'))
		<p>{{ Session::get('global') }}</p>
	@endif
	@include('layout.navigation')
	@yield('content')

</body>

</html>