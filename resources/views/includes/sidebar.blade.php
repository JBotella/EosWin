@php
	$vActual=Request::route()->getName();
@endphp
<div id="layoutSidenav_nav" class="@if(Session::get('menuPlegado')=='si') side-oculta @endif">
	<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav mt-3">
				<a class="nav-link @if(in_array($vActual,['dashboard'])) nav-link-selected @endif" href="{!!route('dashboard')!!}">
					<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
					@lang('texto.dashboard')
				</a>
				<div class="sb-sidenav-menu-heading">
					<div class="lineaBloqueMenu"></div>
				</div>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
					@lang('texto.clientes')
				</a>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-dolly"></i></div>
					@lang('texto.proveedores')
				</a>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
					@lang('texto.bancos')
				</a>
				<div class="sb-sidenav-menu-heading">
					<div class="lineaBloqueMenu"></div>
				</div>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-pencil-alt"></i></div>
					@lang('texto.apuntes')
				</a>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
					@lang('texto.apuntes_periodicos')
				</a>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>
					@lang('texto.cobros') / @lang('texto.pagos')
				</a>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
					@lang('texto.extractos')
				</a>
				<div class="sb-sidenav-menu-heading">
					<div class="lineaBloqueMenu"></div>
				</div>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
					@lang('texto.bienes_inversion')
				</a>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-hand-holding-usd"></i></div>
					@lang('texto.amortizaciones')
				</a>
				<div class="sb-sidenav-menu-heading">
					<div class="lineaBloqueMenu"></div>
				</div>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
					@lang('texto.libros_oficiales')
				</a>
				<div class="sb-sidenav-menu-heading">
					<div class="lineaBloqueMenu"></div>
				</div>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-percent"></i></div>
					@lang('texto.impuestos')
				</a>
			</div>
		</div>
		<div class="sb-sidenav-footer bg-dark">
			<div class="botonUsuario" onclick="bloqueOpcionesPie()">
				<div class="circuloUsuario">
					<i class="fas fa-user-circle iconoUsuario"></i>
				</div>
				<div class="nombreUsuario">
					Nombre Empresa
				</div>
			</div>
		</div>
	</nav>
</div>
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
/* Bloque Ajustes */
function bloqueOpcionesPie(){
	if($('#contenedorEmergenteAjustes').hasClass('ocultaEmergenteAjustes')){
		$('#contenedorEmergenteAjustes').removeClass('ocultaEmergenteAjustes');
	}else{
		$('#contenedorEmergenteAjustes').addClass('ocultaEmergenteAjustes');
	}
}
$(document).on('click',function(e){
	// Control del contenedor emergente de ajustes
	if(!$('#contenedorEmergenteAjustes').hasClass('ocultaEmergenteAjustes')){
		var fP = 0; // Click fuera del botón ajustes en el pié
		var fC = 0; // Click fuera del contenedor emergente de ajustes
		if($(e.target).closest(".sb-sidenav-footer").length === 0){ fP++; }
		if($(e.target).closest("#contenedorEmergenteAjustes").length === 0){ fC++; }
		if(fP && fC){
			bloqueOpcionesPie();
		}
	}
});
</script>
