@extends('layouts.default')
@section('content')
@if(Auth::check())
  SHOW LOCATION
  @foreach($location as $var)
  {{ $var }}
  @endforeach
@endif
Please log in
@stop
