@extends('layouts.default')
@section('content')
		<div class='description'>
			<h2>This is not the page you're looking for.</h2>
			<a href='/'>Go to homepage</a> <br/>
			<a href='/back'>Go back</a>
		</div>
@stop
@section('404')
	<link href='{{asset('css/404.css')}}' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Rambla' rel='stylesheet' type='text/css'>
@stop