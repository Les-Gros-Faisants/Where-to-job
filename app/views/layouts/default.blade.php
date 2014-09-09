<!doctype html>
<html>
<head>
	@include('includes.head')
</head>
<body>
	<div class="left_sidebar">
		@include('includes.sidebar')
	</div>
<div class="container">

	<header class="row">
		@include('includes.header')
	</header>

	<div id="main" class="row">

			@yield('content')

	</div>

	<footer class="row">
		@include('includes.footer')
	</footer>

	<button onclick="lol();">LOL</button>
</div>
</body>
<script>
function lol()
{
 $('.demo.sidebar').sidebar('toggle');
}
</script>
</html>