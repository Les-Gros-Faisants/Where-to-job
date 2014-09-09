<!-- sidebar nav -->
<div class="ui very thin vertical demo sidebar menu sidebardesign">
  <a id="lol" class="item">
    <div style="vertical-align: center;">
      <i class="sign in icon"></i>
    </div>
  </a>
  <a id="lolbis" class="item" style="display: none;">
    <div style="max-width: 100%;">
    <input type="text" name="lname">
    <input type="text" name="lname">
    </div>
  </a>
  <a class="item">
    <div style="vertical-align: center;">
      <i class="home icon"></i>
    </div>
  </a>
</div>

<script>
  $( "#lol" ).click(function() {
  //   $("#lolbis").show();
  $('.ui').sidebar('hide');

  });
;
</script>
