@extends('layout.main')

@section('content')
This is the groups page
<a href="{{URL::route('group', 'Apple')}}">Apple</a>
<a href="{{URL::route('group', 'Ball')}}">Ball</a>
@stop