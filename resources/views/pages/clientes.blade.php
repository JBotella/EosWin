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
						// Declaración de identificadores de columna
						$columnas = array('2'=>trans('texto.tabla_clientes.codigo'), 
						'3'=>trans('texto.tabla_clientes.nombre'), 
						'4'=>trans('texto.tabla_clientes.nif'), 
						'5'=>trans('texto.tabla_clientes.telefono'), 
						'6'=>trans('texto.tabla_clientes.email'), 
						'7'=>trans('texto.domicilio_fiscal.domicilio.domicilio'), 
						'8'=>trans('texto.domicilio_fiscal.codigo_postal'), 
						'9'=>trans('texto.domicilio_fiscal.localidad'), 
						'10'=>trans('texto.domicilio_fiscal.provincia'));
						if(Session::has("columnasClientes")){
							// Desde ajustes
							$visibles = explode(',',session::get("columnasClientes"));
						}else{
							// Default
							$visibles = array(2,3,4,5,6);
						}
						$rutaColumnas = route('columnas_visibles',['columnasClientes',':columnas']);
					@endphp
					@include('includes.complementos.selectorColumnasListado',[$columnas,$visibles,$rutaColumnas])
				</div>
				
				
			</div>
			
		</div>
		<div class="contenidoSeccion">
			@csrf
			<div class="notificacionAccion notificacion-estilo-alerta" data-lista-id="0" data-accion="borrar" data-ruta="{{route('borraClientes')}}">
				<div class="avisoAccion">¿Confirma borrar las lineas seleccionadas?</div>
				<div class="opcionesAccion">
					<div class="opcionAccion" onclick="notificacionAccion('borrar')">Cancelar</div>
					<div class="opcionAccion" onclick="accionLineas('borrar','checkCliente')">Confirmar</div>
				</div>
			</div>
			
			<div class="notificacionAccion notificacion-estilo-alerta" data-accion="borrar2" data-ruta="rutaDeBorrado2">
				<div class="avisoAccion">¿Confirma borrar las lineas seleccionadas 2?</div>
				<div class="opcionesAccion">
					<div class="opcionAccion" onclick="notificacionAccion('borrar2')">Cancelar</div>
					<div class="opcionAccion" onclick="accionLineas('borrar2','checkCliente2')">Confirmar</div>
				</div>
			</div>
		
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
								<th scope="col" data-orden="CliCodigo">@lang('texto.tabla_clientes.codigo')</th>
								<th scope="col" data-orden="CliNombre">@lang('texto.tabla_clientes.nombre')</th>
								<th scope="col" data-orden="CliCif">@lang('texto.tabla_clientes.nif')</th>
								<th scope="col" data-orden="Telefono">@lang('texto.tabla_clientes.telefono')</th>
								<th scope="col" data-orden="CliEMail">@lang('texto.tabla_clientes.email')</th>
								<th scope="col" data-orden="CliDireccion">@lang('texto.domicilio_fiscal.domicilio.domicilio')</th>
								<th scope="col" data-orden="CliCodPostal">@lang('texto.domicilio_fiscal.codigo_postal')</th>
								<th scope="col" data-orden="CliCodPostalLocali">@lang('texto.domicilio_fiscal.localidad')</th>
								<th scope="col" data-orden="CliCodPostalProvin">@lang('texto.domicilio_fiscal.provincia')</th>
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
