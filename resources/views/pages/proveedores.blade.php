@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion" id="cabeceraSeccionTabla">
			@include('includes.cabeceras.proveedores.cabeceraProveedores')
		</div>
		<div class="barraOpcionesLista">
			<div class="row justify-content-end">
				
				<div class="lineaSelectorAcciones mr-auto order-2 order-sm-1 col">
					@include('includes.complementos.selectorAccionesListado',[$prefijoRuta = 'Proveedores', $checkLinea = 'checkProveedor', $acciones = ['extracto','exportar','borrar']])
				</div>
				
				<div class="lineaBuscador order-1 order-sm-2 col-12 col-sm-7 col-md-6 col-lg-6 col-xl-4">
					@include('includes.complementos.buscador',['nLista'=>0])
				</div>
				
				<div class="lineaSelectorColumna order-3 order-sm-3 col">
					@php
						// Declaración de identificadores de columna
						$columnas = array('2'=>trans('texto.tabla_proveedores.codigo'), 
						'3'=>trans('texto.tabla_proveedores.nombre'), 
						'4'=>trans('texto.tabla_proveedores.nif'), 
						'5'=>trans('texto.tabla_proveedores.telefono'), 
						'6'=>trans('texto.tabla_proveedores.email'), 
						'7'=>trans('texto.domicilio_fiscal.domicilio.domicilio'), 
						'8'=>trans('texto.domicilio_fiscal.codigo_postal'), 
						'9'=>trans('texto.domicilio_fiscal.localidad'), 
						'10'=>trans('texto.domicilio_fiscal.provincia'));
						if(Session::has("columnasProveedores")){
							// Desde ajustes
							$visibles = explode(',',session::get("columnasProveedores"));
						}else{
							// Default
							$visibles = array(2,3,4,5,6);
						}
						$rutaColumnas = route('columnas_visibles',['columnasProveedores',':columnas']);
					@endphp
					@include('includes.complementos.selectorColumnasListado',[$columnas,$visibles,$rutaColumnas])
				</div>
				
			</div>
		</div>
		<div class="contenidoSeccion">
			@component('components.accionesLista')
				@slot('checkData', 'checkProveedor')
				@slot('rutaBorrar', 'borraProveedores')
				@slot('rutaExportar', 'exportaProveedores')
				@slot('formatosExportar', ['pdf','csv','excel'])
			@endcomponent
			<div class="seccion-responsive">
				<div class="visorFicha ocultaContenedor d-none" id="visorFicha_0"></div>
				<div class="table-responsive" id="contenido_0">
					<form name="checkProveedor" method="POST" target="_blank">
						@csrf
						<input type="hidden" name="columnasActivas[]" value="" />
						<table class="table table-striped table-fixed" id="tabla">
							<thead id="cabeceraLista_0" class="thead-th-ocultos" data-columna="ProvCodigo" data-direccion="ASC" data-ruta="{{ route('listaProveedores', ':variables') }}" data-visibles="{{json_encode($visibles)}}">
								<tr>	
									<th scope="col" class="thBtnAcciones">
										<div class="cuadroCkeckSelTodos">
											<div class="cuadroCheck" id="checkProveedores" data-checked="" title="@lang('texto.seleccionar_todos')"></div>
										</div>
									</th>
									<th scope="col" data-columna="ProvCodigo">@lang('texto.tabla_proveedores.codigo')</th>
									<th scope="col" data-columna="ProvNombre">@lang('texto.tabla_proveedores.nombre')</th>
									<th scope="col" data-columna="ProvCif">@lang('texto.tabla_proveedores.nif')</th>
									<th scope="col" data-columna="ProvTelefono">@lang('texto.tabla_proveedores.telefono')</th>
									<th scope="col" data-columna="ProvEMail">@lang('texto.tabla_proveedores.email')</th>
									<th scope="col" data-columna="ProvDireccion">@lang('texto.domicilio_fiscal.domicilio.domicilio')</th>
									<th scope="col" data-columna="ProvCodPostal">@lang('texto.domicilio_fiscal.codigo_postal')</th>
									<th scope="col" data-columna="ProvLocalidad">@lang('texto.domicilio_fiscal.localidad')</th>
									<th scope="col" data-columna="ProvProvincia">@lang('texto.domicilio_fiscal.provincia')</th>
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
