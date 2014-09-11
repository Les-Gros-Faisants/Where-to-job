@extends('layouts.default')
@section('content')
  <div>
    <div id="map_div" class="ui segment">
      <div id='map' class="ui item"></div>
    </div>

    <div id="searchbar" class="ui item">
      <div class="ui fluid action input">
        {{ Form::model(null, array('route' => array('location.search'))) }}

        <div class="ui fluid left icon input">
          {{ Form::text('city', null, array('placeholder'=>'City...')) }}
        </div>
        <br/>
        <div class="ui fluid left icon input">
          {{ Form::text('ambience', null, array('placeholder'=>'Ambience...')) }}
          <i class="glass icon"></i>
        </div>
        <br/>
        {{Form::button('<i class="search icon"></i>', array('type' => 'submit', 'class' => 'ui fluid icon button'))}}
        {{ Form::close() }}
      </div>
    </div>
  </div>

  @if (isset($locations))
    C4EST DE LA BONNE NEGRO <br/><br/>
    {{ var_dump($locations) }}
  @endif

@stop
