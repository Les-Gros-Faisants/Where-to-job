<!DOCTYPE html>
<html>
	<head>
		@include('includes.head')
		@yield('404')
	</head>
	<body>
		<div class="left_sidebar">
			@include('includes.sidebar')
		</div>
		@include('includes.loginmodal')
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
		</div>
	</body>
</html>
