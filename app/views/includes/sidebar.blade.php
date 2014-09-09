<!-- sidebar nav -->
<div class="ui very thin vertical demo sidebar menu sidebardesign">
  <div>
    <img class="sidebarimage" src="assets/images/logo.png">
  </div>
  <a id="lol" class="item">
    <div style="vertical-align: center;">
      <i class="big sign in icon"></i>
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
      <i class="big home icon"></i>
    </div>
  </a>
<!--   <div class="item">
    <b>More</b>
    <div class="menu">
      <a class="item">About</a>
      <a class="item">Contact Us</a>
    </div>
  </div> -->
</div>

<script>
  $( "#lol" ).click(function() {
    $("#lolbis").show();
  });
</script>
