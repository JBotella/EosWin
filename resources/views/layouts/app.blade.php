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
	
	<!--
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
	-->
	
</body>
</html>
