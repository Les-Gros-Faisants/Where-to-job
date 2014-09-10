@extends('layouts.default')
@section('content')
<div>
  <div id='map' class="ui item"></div>
  <div class="ui horizontal icon divider">
    <i class="search icon"></i>
  </div>
  <div class="ui action input searchbar" style="width: 50%; padding: auto; margin: auto;">
    <input placeholder="Search..." type="text">
    <div class="ui button" style="width: 100px;">Search</div>
  </div>
</div>
@stop
