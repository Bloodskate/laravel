@extends('layout.main')

@section('content')
	@foreach($all as $one)
		<a href = "{{URL::route('group', $one->group)}}"><font color = 'yellow'> {{$one->group}} <hr> </font></a>
	@endforeach
@stop