@extends('layouts.default')
@section('content')
  SHOW LOCATION
  @foreach($location as $var)
  {{ $var }}
  @endforeach
@stop