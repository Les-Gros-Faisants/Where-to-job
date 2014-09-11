@extends('layouts.default')
@section('content')
<div>
    <div id="map_div" class="ui segment">
      <div id='map' style="overflow:hidden;width:750px;height:400px;position:relative;" class="ui item"></div>
    </div>
    <div id="searchbar" class="ui item">
      <div class="ui fluid action input">
        {{ Form::model(null, array('route' => array('location.search'))) }}

        <div class="ui fluid left icon input">
          {{ Form::text('city', null, array('placeholder'=>'City...')) }}
          <i class="globe icon"></i>
        </div>
        <br/>
        <div class="ui fluid left icon input">
          {{ Form::text('ambience', null, array('placeholder'=>'Ambience...', 'id' => 'ambience_field', 'disabled' => 'disabled')) }}
          <i class="glass icon"></i>
        </div>
        <br/>
        {{Form::button('<i class="search icon"></i>', array('type' => 'submit', 'class' => 'ui fluid icon button'))}}
        {{ Form::close() }}
      </div>
    </div>
    <div id="results">
      @if (isset($locations) && isset($city) && count($locations) > 0)
        <p>{{ count($locations) }} found in {{ $city }}</p>
        @foreach ($locations as $item)
          <p>{{ $item->name }}</p>
        @endforeach
      @elseif (isset($city))
        <p>No results for {{ $city }}</p>
      @endif
    </div>
  </div>
@stop
