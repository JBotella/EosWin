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
				<div class="lineaBuscador order-1 order-sm-1 order-md-2 order-lg-2 order-xl-2 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5">
					@include('includes.complementos.buscador',['nLista'=>0])
				</div>
			</div>
		</div>
		<div class="contenidoSeccion">
			<div class="seccion-responsive">
				<div class="visorFicha ocultaContenedor d-none" id="visorFicha_0"></div>
				<div class="table-responsive" id="contenido_0">
					<table class="table table-striped table-fixed" id="tabla">
						<thead id="cabeceraLista_0" class="thead-th-ocultos" data-orden="ProvCodigo" data-direccion="ASC" data-ruta="{{ route('listaProveedores', ':variables') }}">
							<tr>	
								<th scope="col" class="thBtnAcciones">
									<div class="cuadroCkeckSelTodos">
										<div class="cuadroCheck" id="checkProveedores" data-checked="" title="@lang('texto.seleccionar_todos')"></div>
									</div>
								</th>
								<th scope="col" data-columna="ProvCodigo" data-orden="ProvCodigo">@lang('texto.tabla_proveedores.codigo')</th>
								<th scope="col" data-columna="ProvNombre" data-orden="ProvNombre">@lang('texto.tabla_proveedores.nombre')</th>
								<th scope="col" data-columna="ProvCif" data-orden="ProvCif">@lang('texto.tabla_proveedores.nif')</th>
								<th scope="col" data-columna="ProvTelefono" data-orden="ProvTelefono">@lang('texto.tabla_proveedores.telefono')</th>
								<th scope="col" data-columna="ProvEMail" data-orden="ProvEMail">@lang('texto.tabla_proveedores.email')</th>
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
