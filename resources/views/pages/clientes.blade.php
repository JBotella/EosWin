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
						$columnas = ['2'=>'CliCodigo', '3'=>'CliNombre', '4'=>'CliCif', '5'=>'Telefono', '6'=>'CliEMail'];
						$visibles = [2,3];
					@endphp
					@include('includes.complementos.selectorColumnasListado',[$columnas,$visibles])
				</div>
				
				
			</div>
			
		</div>
		<div class="contenidoSeccion">
			<div class="seccion-responsive">
				<div class="visorFicha ocultaContenedor d-none" id="visorFicha_0"></div>
				<div class="table-responsive" id="contenido_0">
					<table class="table table-striped table-fixed" id="tabla">
						<thead id="cabeceraLista_0" class="thead-th-ocultos" data-orden="CliCodigo" data-direccion="ASC" data-ruta="{{ route('listaClientes', ':variables') }}" data-visibles="{{json_encode($visibles)}}">
							<tr>
								<th scope="col" class="thBtnAcciones">
									<div class="cuadroCkeckSelTodos">
										<div class="cuadroCheck" id="checkClientes" data-checked="" title="@lang('texto.seleccionar_todos')"></div>
									</div>
								</th>
								<th scope="col" class="@if(!in_array(2,$visibles)) d-none @endif" data-orden="CliCodigo">@lang('texto.tabla_clientes.codigo')</th>
								<th scope="col" class="@if(!in_array(3,$visibles)) d-none @endif" data-orden="CliNombre">@lang('texto.tabla_clientes.nombre')</th>
								<th scope="col" class="@if(!in_array(4,$visibles)) d-none @endif" data-orden="CliCif">@lang('texto.tabla_clientes.nif')</th>
								<th scope="col" class="@if(!in_array(5,$visibles)) d-none @endif" data-orden="Telefono">@lang('texto.tabla_clientes.telefono')</th>
								<th scope="col" class="@if(!in_array(6,$visibles)) d-none @endif" data-orden="CliEMail">@lang('texto.tabla_clientes.email')</th>
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
			var visibles = $('#cabeceraLista_'+idLista).data('visibles');
			var variables = { "orden": orden, "direccion": direccion, "busqueda": busqueda, "visibles": visibles }; 
			cargaListado(idLista,variables,desde);
		}
		$(document).ready(function(){
			listar(0,0);
		});
	</script>
@endsection
