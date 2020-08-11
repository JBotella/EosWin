<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
	$vActual = Request::route()->getName();
	if(in_array($vActual,['login','register','verify','password.confirm','password.email','password.update','password.reset','password.request'])){
		$rutasLogin = 'si';
	}else{
		$rutasLogin = 'no';
	}
@endphp
<head>
	@include('includes.head')
</head>
<body class="sb-nav-fixed @if(Session::get('menuPlegado') == 'si') sb-sidenav-toggled @endif">
	<div id="app">
		@if($rutasLogin == 'no')
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
	<!-- Scripts -->@if($rutasLogin == 'no')
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="{{ asset('theme/dist/js/scripts.js') }}"></script>
		<script src="{{ asset('theme/dist/js/scriptsFin.js') }}"></script>
		<script src="{{ asset('theme/dist/js/scriptsListas.js') }}"></script>
		<!-- Font Awesome -->
		<script src="{{ asset('theme/fontawesome/js/all.min.js') }}" crossorigin="anonymous"></script>
	@endif
</body>
</html>
