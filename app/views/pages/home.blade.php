@extends('layouts.default')
@section('content')
<div>
    <div id="map_div" class="ui segment">
      <div id="map_loader" class="ui active dimmer">
          <div class="ui text loader">Localisation in progress..</div>
      </div>
      <div id="map"></div>
    </div>

    <div class="ui horizontal icon divider">
      <i class="search icon"></i>
    </div>

    <div id="searchbar">
      <div id="searchbar_sub" class="ui item">
        <div class="ui fluid action input">
          {{ Form::model(null, array('route' => array('location.search'), 'id' => 'search_form')) }}

          <div class="ui fluid left icon input">
            {{ Form::text('city', null, array('placeholder'=>'City...', 'id' => 'city_field')) }}
            <i class="globe icon"></i>
          </div>
          <br/>
          <div class="ui fluid left icon input">
            {{ Form::text('ambience', null, array('placeholder'=>'Ambience...', 'id' => 'ambience_field')) }}
            <i class="glass icon"></i>
          </div>
          <br/>
          {{Form::button('Go!', array('type' => 'submit', 'class' => 'ui fluid button'))}}
          {{ Form::close() }}
        </div>
      </div>
    </div>
    <div id="results">
    </div>
  </div>
  <script></script>
@stop
