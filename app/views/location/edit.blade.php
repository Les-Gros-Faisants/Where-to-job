@extends('layouts.default')
@section('content')
EDIT LOCATION

{{ Form::model($location, array('route' => array('location.update', $location[0]->id))) }}

{{ Form::close() }}
@stop