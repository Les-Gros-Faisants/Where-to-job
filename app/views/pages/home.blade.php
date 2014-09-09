@extends('layouts.default')
@section('content')
  <div id='map' style='height:300px;'></div>
  <div class="ui horizontal icon divider">
    <i class="circular search icon"></i>
  </div>
  <div class="ui action input" style="width: 50%; padding: auto; margin: auto;">
    <input placeholder="Search..." type="text">
    <div class="ui button" style="width: 100px;">Search</div>
  </div>
@stop
