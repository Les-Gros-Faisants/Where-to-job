@extends('layouts.default')
@section('content')
EDIT LOCATION
<?php
// get all columns from user table
 $columns = Schema::getColumnListing('locations');
?>
@if (isset($location))
{{ Form::model($location, array('route' => array('location.update', $location[0]->id))) }}
@else
{{ Form::open(array('route' => 'location.store')) }}
@endif

<div class="ui error form segment">
	<div class="two fields">
		<div class="field">
			{{ Form::label('Location', 'Location') }}
			@if (isset($location))
			{{ Form::text('location', null, array('placeholder'=>$location[0]->location)) }}
			@else
			{{ Form::text('location', null, array('placeholder'=>'Location')) }}
			@endif
		</div>
		<div class="field">
			{{ Form::label('City', 'City') }}
			@if (isset($location))
			{{ Form::text('city', null, array('placeholder'=>$location[0]->city)) }}
			@else
			{{ Form::text('city', null, array('placeholder'=>'City')) }}
			@endif
		</div>
	</div>
		<div class="field">
			{{ Form::label('Name', 'Na') }}
			@if (isset($location))
			{{ Form::text('name', null, array('placeholder'=>$location[0]->name)) }}
			@else
			{{ Form::text('name', null, array('placeholder'=>'Name')) }}
			@endif
		</div>
	<div class="two fields">
		<div class="field">
			{{ Form::label('Ambiance', 'Ambiance') }}
			@if (isset($location))
			{{ Form::text('ambiance', null, array('placeholder'=>$location[0]->ambiance)) }}
			@else
			{{ Form::text('ambiance', null, array('placeholder'=>'Ambiance')) }}
			@endif
		</div>
	</div>
	<div class="field">
		{{ Form::label('Photo', 'Photo') }}
		{{ Form::file('photos', $attributes = array()) }}
	</div>
	{{ Form::submit('Submit', array('class'=>'ui blue submit button')) }}
</div>

{{ Form::close() }}

@stop