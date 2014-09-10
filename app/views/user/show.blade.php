@extends('layouts.default')
@section('content')
  SHOW USER
  @foreach($user as $var)
  {{ $var }}
  @endforeach
@stop
