<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			@yield('content')
		</div>
		@if($rutasLogin == 'no')
			@include('includes.emergenteAjustes')
		@endif
	</main>
</div>
