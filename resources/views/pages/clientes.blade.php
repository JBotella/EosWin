@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion" id="cabeceraSeccionTabla">
			@include('includes.cabeceras.clientes.cabeceraClientes')
		</div>
		<div class="cabeceraSeccion ocultaContenedor colapsaContenedor" id="cabeceraSeccionVer">
			@include('includes.cabeceras.clientes.cabeceraVerCliente')
		</div>
		<div class="barraOpcionesLista">
			<div class="row justify-content-end">
				<div class="lineaBuscador order-1 order-sm-1 order-md-2 order-lg-2 order-xl-2 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5">
					@include('includes.complementos.buscador')
				</div>
			</div>
		</div>
		<div class="contenidoSeccion">
			<div class="seccion-responsive">
				<div class="visorFicha ocultaContenedor d-none" id="visorFicha_0"></div>
				<div class="table-responsive" id="tabla_0">
					<table class="table table-striped table-fixed">
						<thead id="cabeceraLista_0" class="thead-th-ocultos">
							<tr>
								<th scope="col">@lang('texto.tabla_clientes.codigo')</th>
								<th scope="col">@lang('texto.tabla_clientes.nombre')</th>
								<th scope="col">@lang('texto.tabla_clientes.nif')</th>
								<th scope="col">@lang('texto.tabla_clientes.telefono')</th>
								<th scope="col">@lang('texto.tabla_clientes.email')</th>
								<th scope="col" class="tdBtnAcciones"></th>
							</tr>
						</thead>
						<tbody id="docuCont_0"></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script>
		function cargaListado(){
			var ruta = '{{ route("listaClientes") }}';
			$('#docuCont_0').load(ruta, function(){
				mostrarThCabecera(0);
			});
		}
		$(document).ready(function(){
			cargaListado();
		});
	</script>
@endsection
