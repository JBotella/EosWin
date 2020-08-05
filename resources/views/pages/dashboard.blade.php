@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion">
			<span><i class="fas fa-tachometer-alt icoCab mr-2"></i></span>
			<span>@lang('texto.dashboard.dashboard')</span>
			<span class="guionEnCabecera">-</span>
			<span class="nombreEnCabecera">Microarea Next</span>
		</div>
		<div class="contenidoSeccion">
			<div id="contenidoDashboard" class="seccion-responsive">
			
				<div class="row mt-3" id="dashboard-listas">
					
					<div id="lista-hoy" class="col-12 col-md-6 col-xl-6 mb-4">
						<div class="tarjeta estilo-tarjeta estilo-tarjeta-lista">
							<div class="tarjeta-titulo">
								<i class="fas fa-calendar-day mr-1"></i>
								@lang('texto.dashboard.hoy')
							</div>
							<div class="tarjeta-body">
								<div class="contenidoEmAjuste">
									<ul>
										@php $items = array(1,2,3,4,5,6,7,8,9,10) @endphp
										@foreach($items as $item)
											<li>
												<b>{{$item}}</b> - Item de prueba {{$item}}
											</li>
										@endforeach
									</ul>
								</div>
							
							</div>
						</div>
					</div>
					
					<div id="lista-amortizaciones" class="col-12 col-md-6 col-xl-6 mb-4">
						<div class="tarjeta estilo-tarjeta estilo-tarjeta-lista">
							<div class="tarjeta-titulo">
								<i class="far fa-clock mr-1"></i>
								@lang('texto.dashboard.amortizaciones_pendientes')
							</div>
							<div class="tarjeta-body">
								<div class="contenidoEmAjuste">
									<ul>
										@php $items = array(1,2,3,4,5,6,7,8,9,10) @endphp
										@foreach($items as $item)
											<li class="chkList checkAmortizacion" id="checkAmortizacion_{{$item}}">
												<div class="cuadroCheck"></div>
												<b>{{$item}}</b> - Amortización pendiente de prueba {{$item}}
												<input type="checkbox" class="d-none" name="amortizacion" value="{{$item}}" />
											</li>
										@endforeach
									</ul>
								</div>
							
							</div>
							<div class="tarjeta-pie">
								<div class="cuadroCkeckSelTodos">
									<div class="cuadroCheck" id="checkAmortizacion" data-checked=""></div>
									<span>@lang('texto.dashboard.seleccionar_todas')<span>
								</div>
								<button class="btn boton-tarjeta-pie d-inline-block">@lang('texto.dashboard.contabilizar')</button>
							</div>
						</div>
					</div>
					
				</div>
				
				<div class="row mt-2" id="dashboard-tarjetas-resumen">
					@php
						$b = 30520.5;
						$g = 22198.15;
						$p = 2198.15;
					@endphp
					<div class="col-md-6 col-xl-3 mb-4">
						@component('components.tarjetaDashboard')
							@slot('class','estilo-tarjeta-azulAnalogo')
							@slot('titulo',trans('texto.dashboard.ingresos'))
							@slot('valor',number_format($b,2,',','.').'€')
							@slot('nota','Ejercicio 2019')
							@slot('icono','fas fa-euro-sign')
							@slot('link','')
						@endcomponent
					</div>
					
					<div class="col-md-6 col-xl-3 mb-4">
						@component('components.tarjetaDashboard')
							@slot('class','estilo-tarjeta-rojoOpuesto')
							@slot('titulo',trans('texto.dashboard.gastos'))
							@slot('valor',number_format($g,2,',','.').'€')
							@slot('nota',trans('texto.ejercicio').' 2019')
							@slot('icono','fas fa-shopping-bag')
							@slot('link','')
						@endcomponent
					</div>
					
					<div class="col-md-6 col-xl-3 mb-4">
						@component('components.tarjetaDashboard')
							@slot('class','estilo-tarjeta-principal')
							@slot('titulo',trans('texto.dashboard.beneficios'))
							@slot('valor',number_format(($b-$g),2,',','.').'€')
							@slot('nota',trans('texto.ejercicio').' 2019')
							@slot('icono','fas fa-award')
							@slot('link','')
						@endcomponent
					</div>
					
					<div class="col-md-6 col-xl-3 mb-4">
						@component('components.tarjetaDashboard')
							@slot('class','estilo-tarjeta-moradoAnalogo')
							@slot('titulo',trans('texto.dashboard.pendiente_cobros_pagos'))
							@slot('valor',number_format((-$p),2,',','.').'€')
							@slot('nota',trans('texto.ejercicio').' 2019')
							@slot('icono','fas fa-tags')
							@slot('link','')
						@endcomponent
					</div>
				</div>
				
				<div class="row mt-2">
				
					<div id="diagrama-operaciones" class="col-12 col-lg-6 mb-3">
						<div class="tarjeta estilo-tarjeta estilo-tarjeta-diagrama mb-3">
							<div class="tarjeta-titulo">
								<i class="fas fa-chart-pie mr-1"></i>
								@lang('texto.dashboard.distribucion_operaciones')
							</div>
							<div class="tarjeta-body pt-4">
								<canvas class="canvasSectores" id="myPieChart"></canvas>
							</div>
						</div>
					</div>
					
					<div id="graficos-trimestre" class="col-12 col-lg-6 mb-3">
						@component('components.resumenTrimestreDashboard')
							@slot('ejercicio',2019)
							@slot('trimestre',1)
							@slot('ingresos',6325.3)
							@slot('gastos',3960.5)
						@endcomponent
						@component('components.resumenTrimestreDashboard')
							@slot('ejercicio',2019)
							@slot('trimestre',2)
							@slot('ingresos',4213.65)
							@slot('gastos',5921.35)
						@endcomponent
						@component('components.resumenTrimestreDashboard')
							@slot('ejercicio',2019)
							@slot('trimestre',3)
							@slot('ingresos',3512.21)
							@slot('gastos',2496.85)
						@endcomponent
						@component('components.resumenTrimestreDashboard')
							@slot('ejercicio',2019)
							@slot('trimestre',4)
							@slot('ingresos',2955.12)
							@slot('gastos',2630.67)
						@endcomponent
					</div>
					
				</div>
				
				<div class="row" id="dashboard-diagrama-barras-anual">
					<div id="diagrama-barras-anual" class="col-12">
						<div class="tarjeta estilo-tarjeta estilo-tarjeta-diagrama estilo-tarjeta-diagrama-barras mb-4">
							<div class="tarjeta-titulo">
								<i class="fas fa-chart-bar mr-1"></i>
								@lang('texto.dashboard.grafica_anual')
							</div>
							<div class="tarjeta-body pt-4">
								<canvas class="canvasBarras" id="myBarChart"></canvas>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
	@php
		/* Datos provisionales */
		// Diagrama Sectores
		$arrayCifrasDiagrama = array(30520.5,22198.15,8322.35,2198.15);
			$cifrasDiagrama = implode(",",$arrayCifrasDiagrama);
		// Diagrama Barras
		$arrayAnualIngresos = array(1000,3000,500,2000,2200,1200,950,1200,6250,650,980,3500);
			$anualIngresos = implode(",",$arrayAnualIngresos);
		$arrayAnualGastos = array(800,2500,600,1800,1000,1000,1300,1000,5000,1100,800,3000);
			$anualGastos = implode(",",$arrayAnualGastos);
		for($m=0;$m<12;$m++){
			$arrayAnualResultado[$m] = $arrayAnualIngresos[$m] - $arrayAnualGastos[$m];
		}
			$anualResultado = implode(", ", $arrayAnualResultado);
	@endphp
	
	<script src="{{ asset('theme/dist/assets/graficas/Chart.min.js') }}" crossorigin="anonymous"></script>
	{{-- Llamada al diagrama de sectores --}}
	<script id="diagramaOperaciones" src="{{ asset('theme/dist/assets/graficas/chart-pie-dashboard.js') }}" 
	data-label="@lang('texto.dashboard.ingresos'), @lang('texto.dashboard.gastos'), @lang('texto.dashboard.beneficios'), @lang('texto.dashboard.pendiente_cobros_pagos')"  
	data-colores="#628faf,#b05751,#62af82,#8262af" 
	data-cifras="{{$cifrasDiagrama}}"
	></script>
	{{-- Llamada al diagrama de barras --}}
	<script id="graficaAnual" src="{{ asset('theme/dist/assets/graficas/chart-bar-dashboard.js') }}" 
	data-labels="@lang('texto.mes.enero'), @lang('texto.mes.febrero'), @lang('texto.mes.marzo'), @lang('texto.mes.abril'), @lang('texto.mes.mayo'), @lang('texto.mes.junio'), @lang('texto.mes.julio'), @lang('texto.mes.agosto'), @lang('texto.mes.septiembre'), @lang('texto.mes.octubre'), @lang('texto.mes.noviembre'), @lang('texto.mes.diciembre')" 
	data-label="@lang('texto.dashboard.ingresos'), @lang('texto.dashboard.gastos'), @lang('texto.dashboard.resultado')" 
	data-colores="#628faf,#b05751,#62af82" 
	data-ingresos="{{$anualIngresos}}" 
	data-gastos="{{$anualGastos}}" 
	data-resultados="{{$anualResultado}}" 
	></script>
	
@endsection
