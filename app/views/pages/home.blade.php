@extends('layouts.default')
@section('content')
<?php
	$results = DB::select('select * from users', array());
	var_dump($results);
?>
@stop
