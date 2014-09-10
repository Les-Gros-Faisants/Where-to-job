@extends('layouts.default')
@section('content')
EDIT LOCATION
{{ Form::open(array('url' => 'users')) }}

{{ Form::label('name', 'Name') }}
{{ Form::text('name', null, array('placeholder'=>$location[0]->name)) }}

{{ Form::label('city', 'City') }}
{{ Form::text('city', null, array('placeholder'=>$location[0]->city)) }}


{{ Form::submit('Click Me!') }}

{{ Form::close() }}
@stop