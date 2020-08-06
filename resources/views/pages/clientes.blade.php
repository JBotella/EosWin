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
				<div class="table-responsive" id="contenido_0">
					<table class="table table-striped table-fixed" id="tabla">
						<thead id="cabeceraLista_0" class="thead-th-ocultos">
							<tr>
								<th scope="col" id="0">@lang('texto.tabla_clientes.codigo')</th>
								<th scope="col" id="1">@lang('texto.tabla_clientes.nombre')</th>
								<th scope="col" id="2">@lang('texto.tabla_clientes.nif')</th>
								<th scope="col" id="3">@lang('texto.tabla_clientes.telefono')</th>
								<th scope="col" id="4">@lang('texto.tabla_clientes.email')</th>
								<th scope="col" class="tdBtnAcciones"></th>
							</tr>
						</thead>
						<input type="hidden" id="ordenLista" value="CliCodigo_ORDEN_DESC">
						<tbody id="docuCont_0"></tbody>
					</table>
				</div>
				
			</div>
		</div>
	</div>
	<script>
		function cargaListado(){
			var ruta = '{{ route("listaClientes") }}';
			var orden = $('#ordenLista').val();
			var busqueda = $('#busqueda').val();
			loaderGrafico('#docuCont_0');
			$('#docuCont_0').load(ruta, function(){
				mostrarThCabecera(0);
				cargaBuscador();
			});
		}
		$(document).ready(function(){
			cargaListado();
		});
		/* Orden javascript */
		$('#tabla thead tr th').click(function(){
			sortTable('tabla',this.id);
		});
		/* Buscador javascript */
		function cargaBuscador(){
			$("#busqueda").on("keyup", function () {
				var busqueda = $("#busqueda").val();
				resaltaBusqueda(busqueda,'#tabla tbody','.fila');
			});
		}
	</script>
@endsection
