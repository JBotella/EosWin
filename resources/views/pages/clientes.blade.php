@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion">
			<span><i class="fas fa-users icoCab mr-2"></i></span>
			<span>@lang('texto.clientes')</span>
			<div class="cabSeccBtnAcciones">
				<i class="fas fa-sync cabSeccBtnAccion btnActualizar btnAccion" title="@lang('texto.actualizar')" onclick="cargaListado()"></i>
				<i class="fas fa-plus-circle cabSeccBtnAccion btnCrear btnAccion" title="@lang('texto.crear')"></i>
			</div>
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
								<th scope="col">@lang('texto.codigo')</th>
								<th scope="col">@lang('texto.nombre')</th>
								<th scope="col">@lang('texto.cif')</th>
								<th scope="col">@lang('texto.telefono')</th>
								<th scope="col">@lang('texto.email')</th>
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
		function verLinea(id){
			var ruta = '{{ route("verCliente", [":id"]) }}';
			ruta = ruta.replace(':id', id);
			$('#visorFicha_0').load(ruta, function(){
				visorFichaTabla(0);
			});
		}
	</script>
@endsection
