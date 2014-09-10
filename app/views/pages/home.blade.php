@extends('layouts.default')
@section('content')
<div>
  <div class="ui segment">
    <div id='map' class="ui item"></div>
    <div id="mapLoader" class="ui active dimmer">
      <div class="ui loader"></div>
    </div>
  </div>
  <div class="ui horizontal icon divider">
    <i class="search icon"></i>
  </div>

  <div id="searchbar" class="ui item">
    <div class="ui fluid action input">
      <input placeholder="Search..." type="text">
      <div id="searchsettings" class="ui left pointing dropdown icon button">
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
<script>
$('#searchsettings').dropdown();
</script>

@stop
