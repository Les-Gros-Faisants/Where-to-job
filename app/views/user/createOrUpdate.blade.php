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

<br/><br/>
{{ Form::submit('Click Me!') }}

{{ Form::close() }}
@stop