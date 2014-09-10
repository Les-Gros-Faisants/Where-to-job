@extends('layouts.default')
@section('content')
EDIT LOCATION
<?php
// get all columns from location table
 $columns = Schema::getColumnListing('locations');
?>

{{ Form::model($location, array('route' => array('location.update', $location[0]->id))) }}

<!-- loop thru columns to generate each textarea -->
@foreach($columns as $column) <!-- for every field in the table -->
	@if ($column != 'id' && $column != 'user_id') <!-- if it's not an id -->
		{{ Form::label($column, ucfirst($column)) }} <!-- display it in a textarea -->
		{{ Form::text($column, null, array('placeholder'=>$location[0]->$column)) }}
	<br/>
	@endif
@endforeach

<br/><br/>
{{ Form::submit('Click Me!') }}

{{ Form::close() }}
@stop