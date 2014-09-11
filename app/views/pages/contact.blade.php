@extends('layouts.default')
@section('content')
	<h1>Contact</h1>
	{{ Form::open(array('url' => 'contact')) }}
	<div>
		{{ Form::label('username', 'Name: ') }}
		{{ Form::text('username') }}
	</div>
	<div>
		{{ Form::label('email', 'Email: ') }}
		{{ Form::text('email') }}
	</div>
	<div>
		{{ Form::textarea('message') }}
	</div>
	{{ Form::submit('Send !') }}
	{{ Form::close() }}
@stop
