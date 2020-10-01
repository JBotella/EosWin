@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion">
			@include('includes.cabeceras.utilidades.cabeceraUtilidades')
		</div>
		
		<div class="barraOpcionesLista">
		
			<div class="accionesLista">
				@include('includes.complementos.botonLinkVolver', ['ruta' => route('utilidades')])
			</div>
		
			<div class="row justify-content-end">
			
				{{--<div class="lineaSelectorAcciones mr-auto order-2 order-sm-1 col d-flex">--}}
				<div class="lineaSelectorAcciones mr-auto order-2 order-sm-1 col">
				
					@include('includes.complementos.selectorAccionesListado',[$prefijoRuta = 'Utilidades', $checkLinea = 'checkUtilidad', $acciones = ['ejecutar','borrar']])
					
					{{--
					@if(isset($parametros->filtroChecks))
						@include('includes.complementos.filtroChecks',['nombreChecks' => $parametros->filtroChecks['check']])
					@endif
					--}}
					
					@if(isset($parametros->filtroSelect))
						@foreach($parametros->filtroSelect as $idFiltroSelect)
							@include('includes.complementos.filtroSelect',['nombreSelect' => $idFiltroSelect['select']])
						@endforeach
					@endif
					
				</div>
				
				<div class="lineaBuscador order-1 order-sm-2 col-12 col-sm-7 col-md-6 col-lg-6 col-xl-4">
					@include('includes.complementos.buscador',['nLista'=>0])
				</div>
				
			</div>
		</div>
		
		<div class="visorFormAsinc ocultaContenedor d-none @if(isset($parametros->cssForm)) {{$parametros->cssForm}} @endif" id="visorFormAsinc_0"></div>
		
		<div class="contenidoSeccion">
			@component('components.accionesLista')
				@slot('checkData', 'checkUtilidad')
				@slot('formatosExportar', ['pdf','csv','excel'])
			@endcomponent
			<div class="seccion-responsive">
				<div class="table-responsive" id="contenido_0">
					<form name="checkUtilidad" method="POST" target="_blank">
						@csrf
						<input type="hidden" name="columnasActivas[]" value="" />
						<table class="table table-striped table-fixed" id="tabla">
							<thead id="cabeceraLista_0" class="thead-th-ocultos" data-columna="{{$parametros->orden}}" data-direccion="{{$parametros->direccionOrden}}" data-ruta="{{ route('listaUtilidad', [$id, ':variables']) }}">
								<tr>
									<th scope="col" class="thBtnAcciones">
										<div class="cuadroCkeckSelTodos">
											<div class="cuadroCheck" id="checkUtilidades" data-checked="" title="@lang('texto.seleccionar_todo')"></div>
										</div>
									</th>
									@foreach($parametros->columnas as $nombre => $columna)
										<th scope="col" data-columna="{{$columna}}">@lang($parametros->textos.'.campos.'.$nombre)</th>
									@endforeach
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
		/*
		@if(isset($parametros->filtroChecks))
			var checks = "{{$parametros->filtroChecks['check']}}";
		@else
			var checks = '';
		@endif
		*/
		var checks = '';
		function listar(idLista,desde){
			var busqueda = $('#busqueda_'+idLista).val().trim();
			var orden = $('#cabeceraLista_'+idLista).data('columna');
			var direccion = $('#cabeceraLista_'+idLista).data('direccion');
			/*if(checks){
				var filtroChecks = $('#valores'+checks).val().trim();
			}else{
				var filtroChecks = '';
			}*/
			
			/* 00 - Recuperar Filtros Select */
			var prefijoSelectores = 'fSelect_';
			var filtrosSelectores = $("[id*='"+prefijoSelectores+"']");
			var filtroSelect = [];
			filtrosSelectores.each(function(index,value){
				var select = value.name.split('_')[1];
				var idSelect = value.id;
				var valor = $('#'+value.id).val();
				filtroSelect.push({
					selector:select, 
					valor:valor
				});
			});
			//var str = JSON.stringify(filtroSelect);
			/* 00 - ... */
			
			var variables = { "orden": orden, "direccion": direccion, "busqueda": busqueda, /*"filtroChecks": filtroChecks,*/ "filtroSelect": filtroSelect }; 
			cargaListado(idLista,variables,desde);
		}
		$(document).ready(function(){
			listar(0,0);
			contDraggable("#visorFormAsinc_0",'.tituloVisorFormAsinc');
		});
	</script>
@endsection
