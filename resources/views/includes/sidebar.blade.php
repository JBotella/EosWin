<div id="layoutSidenav_nav" class="@if(Session::get('menuPlegado')=='si') side-oculta @endif">
	<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav mt-3">
				<a class="nav-link @if(in_array($vActual,['dashboard'])) nav-link-selected @endif" href="{!!route('dashboard')!!}">
					<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
					@lang('texto.sidebar_nav.dashboard')
				</a>
				<div class="sb-sidenav-menu-heading">
					<div class="lineaBloqueMenu"></div>
				</div>
				<a class="nav-link @if(in_array($vActual,['clientes','cliente'])) nav-link-selected @endif" href="{!!route('clientes')!!}">
					<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
					@lang('texto.sidebar_nav.clientes')
				</a>
				<a class="nav-link @if(in_array($vActual,['proveedores','proveedor'])) nav-link-selected @endif" href="{!!route('proveedores')!!}">
					<div class="sb-nav-link-icon"><i class="fas fa-dolly"></i></div>
					@lang('texto.sidebar_nav.proveedores')
				</a>
				<div class="sb-sidenav-menu-heading">
					<div class="lineaBloqueMenu"></div>
				</div>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-pencil-alt"></i></div>
					@lang('texto.sidebar_nav.apuntes')
				</a>
				<a class="nav-link @if(in_array($vActual,['apuntesPeriodicos'])) nav-link-selected @endif" href="{!!route('apuntesPeriodicos')!!}">
					<div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
					@lang('texto.sidebar_nav.apuntes_periodicos')
				</a>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
					@lang('texto.sidebar_nav.extractos')
				</a>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>
					@lang('texto.sidebar_nav.cobros_pagos')
				</a>
				<div class="sb-sidenav-menu-heading">
					<div class="lineaBloqueMenu"></div>
				</div>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
					@lang('texto.sidebar_nav.bienes_inversion')
				</a>
				<a class="nav-link" href="">
					<div class="sb-nav-link-icon"><i class="fas fa-hand-holding-usd"></i></div>
					@lang('texto.sidebar_nav.amortizaciones')
				</a>
				<div class="sb-sidenav-menu-heading">
					<div class="lineaBloqueMenu"></div>
				</div>
				<a class="nav-link @if(in_array($vActual,['librosOficiales'])) nav-link-selected @endif" href="{!!route('librosOficiales')!!}">
					<div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
					@lang('texto.sidebar_nav.libros_oficiales')
				</a>
				<a class="nav-link @if(in_array($vActual,['impuestos'])) nav-link-selected @endif" href="{!!route('impuestos')!!}">
					<div class="sb-nav-link-icon"><i class="fas fa-percent"></i></div>
					@lang('texto.sidebar_nav.impuestos')
				</a>
				<div class="sb-sidenav-menu-heading">
					<div class="lineaBloqueMenu"></div>
				</div>
				<a class="nav-link @if(in_array($vActual,['utilidades'])) nav-link-selected @endif" href="{!!route('utilidades')!!}">
					<div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
					@lang('texto.sidebar_nav.utilidades')
				</a>
			</div>
		</div>
		<div class="sb-sidenav-footer bg-dark">
			<div class="botonUsuario" onclick="bloqueOpcionesPie()">
				<div class="circuloUsuario">
					<i class="fas fa-user-circle iconoUsuario"></i>
				</div>
				<div class="nombreUsuario">
					{{Session::get('datosEmpresa')->MENOMBRE}}
				</div>
			</div>
		</div>
	</nav>
</div>
