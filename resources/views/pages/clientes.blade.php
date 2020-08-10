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
			
				<div class="lineaSelectorAcciones mr-auto order-2 order-sm-1 col">
					@include('includes.complementos.selectorAccionesListado')
				</div>
				
				<div class="lineaBuscador order-1 order-sm-2 col-12 col-sm-7 col-md-6 col-lg-6 col-xl-4">
					@include('includes.complementos.buscador',['nLista'=>0])
				</div>
				
				<div class="lineaSelectorColumna order-3 order-sm-3 col">
					@php
						$columnas;
					@endphp
					@include('includes.complementos.selectorColumnasListado',['columnas'=>0])
				</div>
				
				
			</div>
			
		</div>
		<div class="contenidoSeccion">
			<div class="seccion-responsive">
				<div class="visorFicha ocultaContenedor d-none" id="visorFicha_0"></div>
				<div class="table-responsive" id="contenido_0">
					<table class="table table-striped table-fixed" id="tabla">
						<thead id="cabeceraLista_0" class="thead-th-ocultos" data-orden="CliCodigo" data-direccion="ASC" data-ruta="{{ route('listaClientes', ':variables') }}">
							<tr>
								<th scope="col" class="thBtnAcciones">
									<div class="cuadroCkeckSelTodos">
										<div class="cuadroCheck" id="checkClientes" data-checked="" title="@lang('texto.seleccionar_todos')"></div>
									</div>
								</th>
								<th scope="col" data-columna="CliCodigo" data-orden="CliCodigo">@lang('texto.tabla_clientes.codigo')</th>
								<th scope="col" data-columna="CliNombre" data-orden="CliNombre">@lang('texto.tabla_clientes.nombre')</th>
								<th scope="col" data-columna="CliCif" data-orden="CliCif">@lang('texto.tabla_clientes.nif')</th>
								<th scope="col" data-columna="Telefono" data-orden="Telefono">@lang('texto.tabla_clientes.telefono')</th>
								<th scope="col" data-columna="CliEMail" data-orden="CliEMail">@lang('texto.tabla_clientes.email')</th>
							</tr>
						</thead>
						<tbody class="contenedorLista" data-lista-id="0" data-lista-desde="0"></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script>
		function listar(idLista,desde){
			var busqueda = $('#busqueda_'+idLista).val().trim();
			var orden = $('#cabeceraLista_'+idLista).data('orden');
			var direccion = $('#cabeceraLista_'+idLista).data('direccion');
			var variables = { "orden": orden, "direccion": direccion, "busqueda": busqueda }; 
			cargaListado(idLista,variables,desde);
		}
		$(document).ready(function(){
			listar(0,0);
		});
	</script>
@endsection
