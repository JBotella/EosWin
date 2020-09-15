@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion">
			<span><i class="fas fa-calendar-alt icoCab mr-2"></i></span>
			<span>@lang('texto.apuntes_periodicos')</span>
		</div>
		<div class="barraOpcionesLista">
			<div class="row justify-content-end">
			
				<div class="lineaSelectorAcciones mr-auto order-2 order-sm-1 col">
					@include('includes.complementos.selectorAccionesListado',[$prefijoRuta = 'ApuntesPeriodicos', $checkLinea = 'checkApuntePeriodico', $acciones = ['ejecutar','borrar']])
				</div>
				
				<div class="lineaBuscador order-1 order-sm-2 col-12 col-sm-7 col-md-6 col-lg-6 col-xl-4">
					@include('includes.complementos.buscador',['nLista'=>0])
				</div>
				
			</div>
		</div>
		<div class="contenidoSeccion">
			@component('components.accionesLista')
				@slot('checkData', 'checkApuntePeriodico')
				@slot('rutaBorrar', 'borraClientes')
				@slot('rutaExportar', 'exportaClientes')
				@slot('formatosExportar', ['pdf','csv','excel'])
			@endcomponent
			<div class="seccion-responsive">
				<div class="visorFicha ocultaContenedor d-none" id="visorFicha_0"></div>
				<div class="table-responsive" id="contenido_0">
					<form name="checkApuntePeriodico" method="POST" target="_blank">
						@csrf
						<input type="hidden" name="columnasActivas[]" value="" />
						<table class="table table-striped table-fixed" id="tabla">
							<thead id="cabeceraLista_0" class="thead-th-ocultos" data-columna="estado" data-direccion="ASC" data-ruta="{{ route('listaApuntesPeriodicos', ':variables') }}">
								<tr>
									<th scope="col" class="thBtnAcciones">
										<div class="cuadroCkeckSelTodos">
											<div class="cuadroCheck" id="checkApuntesPeriodicos" data-checked="" title="@lang('texto.seleccionar_todos')"></div>
										</div>
									</th>
									<th class="columnaConSwitch" scope="col" data-columna="estado">@lang('texto.tabla_apuntes_periodicos.estado')</th>
									<th scope="col" data-columna="descripcion">@lang('texto.tabla_apuntes_periodicos.descripcion')</th>
									<th scope="col" data-columna="cuenta">@lang('texto.tabla_apuntes_periodicos.cuenta')</th>
									<th class="text-center" scope="col" data-columna="tipo">@lang('texto.tabla_apuntes_periodicos.tipo')</th>
									<th class="columnaConFecha" scope="col" data-columna="ultima_ejecucion">@lang('texto.tabla_apuntes_periodicos.ultima_ejecucion')</th>
									<th class="columnaConFecha" scope="col" data-columna="proxima_ejecucion">@lang('texto.tabla_apuntes_periodicos.proxima_ejecucion')</th>
								</tr>
							</thead>
							<tbody class="contenedorLista" data-lista-id="0" data-lista-desde="0"></tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		function listar(idLista,desde){
			var busqueda = $('#busqueda_'+idLista).val().trim();
			var orden = $('#cabeceraLista_'+idLista).data('columna');
			var direccion = $('#cabeceraLista_'+idLista).data('direccion');
			var variables = { "orden": orden, "direccion": direccion, "busqueda": busqueda }; 
			cargaListado(idLista,variables,desde);
		}
		$(document).ready(function(){
			listar(0,0);
		});
	</script>
@endsection
