@extends('layouts.default')
@section('content')
<div>
  <div class="ui segment">
    <div id='map' class="ui item"></div>
  </div>
  <div class="ui horizontal icon divider">
    <i class="search icon"></i>
  </div>

  <div id="searchbar" class="ui item">
    <div class="ui fluid action input">
      {{ Form::model(null, array('route' => array('location.search'))) }}


      {{ Form::text('search', null, array('placeholder'=>'Search')) }}
      <br/><br/>
      {{ Form::submit('Search', ['class' => 'btn btn-large btn-primary openbutton']) }}

      {{ Form::close() }}
      <div id="searchsettings" class="button">
        <i class="settings icon"></i>
        <div class="menu">
          <div class="item"><i class="edit icon"></i>Edit</div>
          <div class="item"><i class="delete icon"></i>Remove</div>
          <div class="item"><i class="hide icon"></i>Hide</div>
        </div>
      </div>
    </div>
  </div>
</div>
  @if (isset($search))
  C4EST DE LA BONNE NEGRO <br/><br/>
  {{ var_dump($search) }}
 @endif
<script>
  $('#searchsettings').dropdown();
</script>

@stop
