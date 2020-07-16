<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.head')
<body class="sb-nav-fixed">
	<div id="app">
		@include('includes.header')
		<div id="layoutSidenav">
			@include('includes.sidebar')
			@include('includes.content')
		</div>
	</div>
	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="{{ asset('theme/dist/js/scripts.js') }}"></script>
</body>
</html>
