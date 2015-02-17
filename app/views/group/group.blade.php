@extends('layout.main')

@section('content')

<hr><hr>
	<ul>
		<li><a href = "{{URL::route('group-apple')}}"> Apple</a>
		<li><a href = "{{URL::route('group-ball')}}"> Ball</a>
	</ul>
@stop