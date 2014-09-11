@extends('layouts.default')
@section('content')
	<h1>Contact us</h1>
	{{ Form::open(array('url' => 'contact')) }}
	<div class="ui fluid action input">
	<div>
		<div class="ui pointing right label">
			{{ Form::label('username', 'Name ') }}
		</div>
		<div class="ui input">
			{{ Form::text('username') }}	
		</div>
			{{ $errors->first('username', '<span class="ui orange label">:message</span>') }}
	</div>
	<br/>
	<div>
		<div class="ui pointing right label">
			{{ Form::label('email', 'Email') }}
	    </div>
		<div class="ui input">
    		{{ Form::text('email') }}
		</div>
		{{ $errors->first('email', '<span class="ui orange label">:message</span>') }}
	</div>
	<br/>
	<div class="ui form">
		<div class="field">
			{{ Form::textarea('message') }}
		</div>
	</div>
	{{ $errors->first('message', '<span class="ui orange label">:message</span>') }}
	</div>
	<br/>
	{{ Form::button('send', array('type' => 'submit', 'class' => 'ui blue submit button')) }}
	{{ Form::close() }}
@stop
