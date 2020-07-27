<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
	$vActual = Request::route()->getName();
@endphp
<head>
	@include('includes.head')
</head>
<body class="sb-nav-fixed @if(Session::get('menuPlegado')=='si') sb-sidenav-toggled @endif">
	<div id="app">
		@if(!in_array($vActual,['login','register','verify','password.confirm','password.email','password.update','password.reset','password.request']))
			@include('includes.header')
			<div id="layoutSidenav">
				@include('includes.sidebar')
				@include('includes.content')
				@if(isset($extrabar))
					@include('includes.extrabar')
				@endif
			</div>
		@else
			<div class="contCentLogin"></div>
			<div class="contLatLogin">
				<div class="exteriorLogin">
					@include('includes.content')
				</div>
			</div>
		@endif
	</div>
	<!-- Scripts -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="{{ asset('theme/dist/js/scripts.js') }}"></script>
	<script src="{{ asset('theme/dist/js/scriptsFin.js') }}"></script>
</body>
</html>
