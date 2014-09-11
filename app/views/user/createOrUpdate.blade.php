@extends('layouts.default')
@section('content')
EDIT /  USER
<?php
// get all columns from user table
$columns = Schema::getColumnListing('users');
?>
@if (isset($user))
{{ Form::model($user, array('route' => array('user.update', $user[0]->id))) }}
@else
{{ Form::open(array('route' => 'user.store')) }}
@endif

<!-- loop thru columns to generate each textarea -->
@foreach($columns as $column) <!-- for every field in the table -->
@if ($column != 'id') <!-- if it's not an id -->
{{ Form::label($column, ucfirst($column)) }} <!-- display it in a textarea -->
@if (isset($user))
{{ Form::text($column, null, array('placeholder'=>$user[0]->$column)) }}
@else
{{ Form::text($column) }}
@endif
<br/>
@endif
@endforeach

<div class="ui error form segment">
	<div class="three fields">
		<div class="field">
			{{ Form::label('First Name', 'First Name') }}
			{{ Form::text('First Name', null, array('placeholder'=>'First Name')) }}
		</div>
		<div class="field">
			{{ Form::label('Last Name', 'Last Name') }}
			{{ Form::text('Last Name', null, array('placeholder'=>'Last Name')) }}
		</div>
		<div class="field">
			{{ Form::label('Username', 'Username') }}
			{{ Form::text('Username', null, array('placeholder'=>'Username')) }}
		</div>
	</div>
	<div class="two fields">
		<div class="field">
			{{ Form::label('Password', 'Password') }}
			{{ Form::password('Password', null, array('placeholder'=>'Password')) }}
		</div>
		<div class="field">
			{{ Form::label('Email', 'Email') }}
			{{ Form::email('Email', $value = null, $attributes = array('placeholder'=>'Email')) }}
		</div>
	</div>
	<div class="three fields">
		<div class="field">
			{{ Form::label('Adress', 'Adress') }}
			{{ Form::text('Adress', null, array('placeholder'=>'Adress')) }}
		</div>
		<div class="field">
			{{ Form::label('City', 'City') }}
			{{ Form::text('City', null, array('placeholder'=>'City')) }}
		</div>
		<div class="field">
			{{ Form::label('Job', 'Job') }}
			{{ Form::text('Job', null, array('placeholder'=>'Job')) }}
		</div>
	</div>
	<div class="field">
		{{ Form::label('Infos', 'Infos') }}
		{{ Form::textarea('Infos', null, array('placeholder'=>'Infos')) }}
	</div>
	<div class="field">
		{{ Form::label('Photo', 'Photo') }}
		{{ Form::file('Photo', $attributes = array()) }}
	</div>
	{{ Form::submit('Submit', array('class'=>'ui blue submit button')) }}
</div>

{{ Form::close() }}
@stop