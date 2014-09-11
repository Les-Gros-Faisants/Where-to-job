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
			@if (isset($user))
			{{ Form::text('First Name', null, array('placeholder'=>$user[0]->firstname)) }}
			@else
			{{ Form::text('First Name', null, array('placeholder'=>'First Name')) }}
			@endif
		</div>
		<div class="field">
			{{ Form::label('Last Name', 'Last Name') }}
			@if (isset($user))
			{{ Form::text('Last Name', null, array('placeholder'=>$user[0]->lastname)) }}
			@else
			{{ Form::text('Last Name', null, array('placeholder'=>'Last Name')) }}
			@endif
		</div>
<!-- 		<div class="field">
			{{ Form::label('Username', 'Username') }}
			@if (isset($user))
			{{ Form::text('Username', null, array('placeholder'=>$user[0]->username)) }}
@else
			{{ Form::text('Username', null, array('placeholder'=>'Username')) }}
			@endif
		</div> -->
	</div>
	<div class="two fields">
		<div class="field">
			{{ Form::label('Password', 'Password') }}
			@if (isset($user))
			{{ Form::password('Password', null, array('placeholder'=>$user[0]->password)) }}
			@else
			{{ Form::password('Password', null, array('placeholder'=>'Password')) }}
			@endif
		</div>
		<div class="field">
			{{ Form::label('Email', 'Email') }}
			@if (isset($user))
			{{ Form::email('Email', $value = null, $attributes = array('placeholder'=>$user[0]->email)) }}
			@else
			{{ Form::email('Email', $value = null, $attributes = array('placeholder'=>'Email')) }}
			@endif
		</div>
	</div>
	<div class="three fields">
		<div class="field">
			{{ Form::label('Addres', 'Addres') }}
			@if (isset($user))
			{{ Form::text('Addres', null, array('placeholder'=>$user[0]->address)) }}
			@else
			{{ Form::text('Addres', null, array('placeholder'=>'Addres')) }}
			@endif
		</div>
		<div class="field">
			{{ Form::label('City', 'City') }}
			@if (isset($user))
			{{ Form::text('City', null, array('placeholder'=>$user[0]->city)) }}
			@else
			{{ Form::text('City', null, array('placeholder'=>'City')) }}
			@endif
		</div>
		<div class="field">
			{{ Form::label('Job', 'Job') }}
			@if (isset($user))
			{{ Form::text('Job', null, array('placeholder'=>$user[0]->job)) }}
			@else
			{{ Form::text('Job', null, array('placeholder'=>'Job')) }}
			@endif
		</div>
	</div>
	<div class="field">
		{{ Form::label('Infos', 'Infos') }}
		@if (isset($user))
		{{ Form::textarea('Infos', null, array('placeholder'=>$user[0]->infos)) }}
		@else
		{{ Form::textarea('Infos', null, array('placeholder'=>'Infos')) }}
		@endif
	</div>
	<div class="field">
		{{ Form::label('Photo', 'Photo') }}
		{{ Form::file('Photo', $attributes = array()) }}
	</div>
	{{ Form::submit('Submit', array('class'=>'ui blue submit button')) }}
</div>

{{ Form::close() }}
@stop