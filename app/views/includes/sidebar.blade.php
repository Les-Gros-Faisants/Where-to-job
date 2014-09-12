<div class="ui very thin vertical demo sidebar menu sidebardesign">
  @if (!Auth::check())
  @include('includes.nonconnected')
  @else
  @include('includes.connected')
  @endif
  <a class="item" href="/">
    <div style="vertical-align: center;">
      <i class="home icon"></i>
    </div>
  </a>
  <a class="item" href="/contact">
    <div style="vertical-align: center;">
      <i class="mail icon"></i>
    </div>
  </a>
  <a class="item">
    <div style="vertical-align: center;">
      <i class="question icon"></i>
    </div>
  </a>
</div>