@extends('layout.main')

@section('content')
	<form action = "{{ URL::route('reply-post',$onstatusid)}}" method = "post" id = 'reply'>
		<div class = 'field'>
			Reply : <br><textarea form ="reply" name="reply"  cols="33" rows = '2' wrap="soft"></textarea>
		</div>
		<div class = 'field'>
			<input type = 'submit' value = 'Post'>
		</div>
		{{Form::token()}}
@stop