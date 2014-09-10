@extends('layouts.default')
@section('content')
  EDIT LOCATION
  {{ Form::open(array('url' => 'foo/bar')) }}
  {{ Form::label('name', 'Name') }}
  {{ Form::text('name', $location[0]->name) }}
    {{ Form::close() }}
  <?php
    echo $location;
  ?>
@stop