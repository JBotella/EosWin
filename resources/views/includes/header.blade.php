<nav class="sb-topnav navbar navbar-expand navbar-dark">
	<a class="navbar-brand" href="#">EosWin</a>
	<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#" onclick="clickSidebar()"><i class="fas fa-bars"></i></button>
	<!-- Navbar Search-->
	{{--<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
		<div class="input-group">
			<input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
			<div class="input-group-append">
				<button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
			</div>
		</div>
	</form>--}}
	<!-- Navbar-->
	<ul class="navbar-nav ml-auto ml-md-auto">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
				<a class="dropdown-item" href="#">Settings</a>
				<a class="dropdown-item" href="#">Activity Log</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="login.html">Logout</a>
			</div>
		</li>
	</ul>
</nav>
<script>
function clickSidebar(){
	if($('#layoutSidenav_nav').hasClass('side-oculta')){
		var plegado = 'no';
	}else{
		var plegado = 'si';
	}
	if($('body').hasClass('sb-sidenav-toggled')){
		$('#layoutSidenav_nav').removeClass('side-oculta');
	}else{
		$('#layoutSidenav_nav').addClass('side-oculta');
	}
	compruebaSidebar();
	procesaValorSidebar(plegado);
}
function procesaValorSidebar(plegado){
	var ruta = '{{ route("menu_plegado", ":plegado") }}';
	ruta = ruta.replace(':plegado', plegado);
	$.get(ruta);
}
function compruebaSidebar(){
	if($('#layoutSidenav_nav').hasClass('side-oculta')){
		var content = $(".side-oculta").css("display");
		if(content == 'none'){
			$('#layoutSidenav_nav').removeClass('side-oculta');
			$('body').removeClass('sb-sidenav-toggled');
			procesaValorSidebar('no');
		}
	}
}
$(document).ready(function(){
	compruebaSidebar();
});
</script>
