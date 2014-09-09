@extends('layouts.default')
@section('content')
<div id='map' style='height:300px;'></div>
<div class="ui horizontal icon divider">
  <i class="circular search icon"></i>
</div>
<div class="ui fluid action input">
  <input placeholder="Search..." type="text">
  <div class="ui button">Search</div>
</div>
@stop
