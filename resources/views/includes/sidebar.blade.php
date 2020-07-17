@php
	$vActual=Request::route()->getName();
@endphp
<div id="layoutSidenav_nav" class="@if(Session::get('menuPlegado')=='si') side-oculta @endif">
	<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav mt-3">
				<a class="nav-link @if(in_array($vActual,['dashboard'])) nav-link-selected @endif" href="{!!route('dashboard')!!}">
					<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
					Dashboard
				</a>
				<div class="sb-sidenav-menu-heading">
					<div class="lineaBloqueMenu"></div>
				</div>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
					Clientes
				</a>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-dolly"></i></div>
					Proveedores
				</a>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
					Bancos
				</a>
				<div class="sb-sidenav-menu-heading">
					<div class="lineaBloqueMenu"></div>
				</div>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-pencil-alt"></i></div>
					Apuntes
				</a>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
					Apuntes periódicos
				</a>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>
					Cobros/Pagos
				</a>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
					Extractos
				</a>
				<div class="sb-sidenav-menu-heading">
					<div class="lineaBloqueMenu"></div>
				</div>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
					Bienes Inversión
				</a>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-hand-holding-usd"></i></div>
					Amortizaciones
				</a>
				<div class="sb-sidenav-menu-heading">
					<div class="lineaBloqueMenu"></div>
				</div>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
					Libros Oficiales
				</a>
				<div class="sb-sidenav-menu-heading">
					<div class="lineaBloqueMenu"></div>
				</div>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-percent"></i></div>
					Impuestos
				</a>
				{{--<div class="sb-sidenav-menu-heading">
					<div class="lineaBloqueMenu"></div>
				</div>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
					Configuración
				</a>--}}
			</div>
		</div>
		<div class="sb-sidenav-footer d-none">
			<div class="row">
				<div class="col-12 mb-1">
					<select class="custom-select form-control selectorSidebar">
						<option value="1">Empresa 1 de prueba</option>
						<option value="2">Empresa 2 de prueba</option>
						<option value="3">Empresa 3 de prueba</option>
						<option value="4">Empresa 4 de prueba</option>
					</select>
				</div>
				<div class="col-12">
					<select class="custom-select form-control selectorSidebar">
						<option value="2020">Ejercicio 2020</option>
						<option value="2019">Ejercicio 2019</option>
						<option value="2018">Ejercicio 2018</option>
						<option value="2017">Ejercicio 2017</option>
					</select>
				</div>
				<div class="col-12">
					<div class="selectorSidebarLink">
						<span>Configuración</span>
						<i class="fas fa-cog"></i>
					</div>
				</div>
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
function bloqueOpcionesPie(){
	if($('#contenedorEmergenteAjustes').hasClass('ocultaEmergenteAjustes')){
		$('#contenedorEmergenteAjustes').removeClass('ocultaEmergenteAjustes');
	}else{
		$('#contenedorEmergenteAjustes').addClass('ocultaEmergenteAjustes');
	}
}
</script>
