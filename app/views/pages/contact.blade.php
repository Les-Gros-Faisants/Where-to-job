@extends('layouts.default')
@section('content')
	<h1>Contact</h1>
	{{ Form::open(array('url' => '/contact')) }}
	{{ Form::text('username', 'name') }}
	{{ Form::text('email', 'email') }}
	{{ Form::close() }}
@stop
