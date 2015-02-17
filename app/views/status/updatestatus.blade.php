@extends('layout.main')

@section('content')
	<form action = "" method = "post" id = 'status'>
		<div class = 'field'>
			Update status : <br><textarea form ="status" name="status"  cols="55" rows = '4' wrap="soft"></textarea>
		</div>
		<div class = 'field'>
			<input type = 'submit' value = 'Post'>
		</div>
		{{Form::token()}}
@stop