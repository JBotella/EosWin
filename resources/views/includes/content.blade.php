<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			@yield('content')
		</div>
		@include('includes.emergenteAjustes')
	</main>
</div>
<script>
function extraBar(){
	if(!$('.menuLateral_extra').hasClass('mLExtraVisible')){
		$('.contenedorSeccion').addClass('cSeccExtraVisible');
		$('.menuLateral_extra').addClass('mLExtraVisible');
	}else{
		$('.contenedorSeccion').removeClass('cSeccExtraVisible');
		$('.menuLateral_extra').removeClass('mLExtraVisible');
	}
}
</script>
