@extends('layouts.default')
@section('content')
  SHOW LOCATION
  <?php
  foreach ($location as $var)
    echo $var . "<br/><br/>"
  ?>
@stop
