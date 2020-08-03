@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion">
			<span><i class="fas fa-tachometer-alt icoCab mr-2" onclick="extraBar()"></i></span>
			<span>@lang('texto.dashboard')</span>
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
								Hoy
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
								Amortizaciones pendientes
							</div>
							<div class="tarjeta-body">
								<div class="contenidoEmAjuste">
									<ul>
										@php $items = array(1,2,3,4,5,6,7,8,9,10) @endphp
										@foreach($items as $item)
											<li>
												<b>{{$item}}</b> - Amortización pendiente de prueba {{$item}}
											</li>
										@endforeach
									</ul>
								</div>
							
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
							@slot('class','estilo-tarjeta-principal')
							@slot('titulo','Ingresos')
							@slot('valor',number_format($b,2,',','.').'€')
							@slot('nota','Ejercicio 2019')
							@slot('icono','fas fa-euro-sign')
						@endcomponent
					</div>
					
					<div class="col-md-6 col-xl-3 mb-4">
						@component('components.tarjetaDashboard')
							@slot('class','estilo-tarjeta-azulAnalogo')
							@slot('titulo','Gastos')
							@slot('valor',number_format($g,2,',','.').'€')
							@slot('nota','Ejercicio 2019')
							@slot('icono','fas fa-shopping-bag')
						@endcomponent
					</div>
					
					<div class="col-md-6 col-xl-3 mb-4">
						@component('components.tarjetaDashboard')
							@slot('class','estilo-tarjeta-moradoAnalogo')
							@slot('titulo','Beneficios')
							@slot('valor',number_format(($b-$g),2,',','.').'€')
							@slot('nota','Ejercicio 2019')
							@slot('icono','fas fa-award')
						@endcomponent
					</div>
					
					<div class="col-md-6 col-xl-3 mb-4">
						@component('components.tarjetaDashboard')
							@slot('class','estilo-tarjeta-rojoOpuesto')
							@slot('titulo','Pendiente Cobros / Pagos')
							@slot('valor',number_format((-$p),2,',','.').'€')
							@slot('nota','Ejercicio 2019')
							@slot('icono','fas fa-tags')
						@endcomponent
					</div>
				</div>
				
				<div class="row mt-2">
				
					<div id="diagrama-operaciones" class="col-12 col-md-6 col-xl-6 mb-3">
						<div class="tarjeta estilo-tarjeta estilo-tarjeta-diagrama mb-3">
							<div class="tarjeta-titulo">
								<i class="fas fa-chart-pie mr-1"></i>
								Distribución de operaciones
							</div>
							<div class="tarjeta-body pt-4">
								<canvas class="canvasPie" id="myPieChart"></canvas>
							</div>
							{{--<div class="tarjeta-pie small text-muted">...</div>--}}
						</div>
					</div>
					
					<div id="graficos-trimestre" class="col-12 col-md-6 col-xl-6 mb-3">
						@component('components.resumenTrimestreDashboard')
							@slot('ejercicio',2019)
							@slot('trimestre',1)
							@slot('ingresos',6000)
							@slot('gastos',4000)
						@endcomponent
						@component('components.resumenTrimestreDashboard')
							@slot('ejercicio',2019)
							@slot('trimestre',2)
							@slot('ingresos',4200)
							@slot('gastos',4900)
						@endcomponent
						@component('components.resumenTrimestreDashboard')
							@slot('ejercicio',2019)
							@slot('trimestre',3)
							@slot('ingresos',3500)
							@slot('gastos',2500)
						@endcomponent
						@component('components.resumenTrimestreDashboard')
							@slot('ejercicio',2019)
							@slot('trimestre',4)
							@slot('ingresos',2950)
							@slot('gastos',2610)
						@endcomponent
					</div>
					
				</div>
				
				<div class="row" id="dashboard-diagrama-barras-anual">
					<div id="diagrama-barras-anual" class="col-12">
						<div class="tarjeta estilo-tarjeta estilo-tarjeta-diagrama estilo-tarjeta-diagrama-barras mb-4">
							<div class="tarjeta-titulo">
								<i class="fas fa-chart-bar mr-1"></i>
								Gráfica anual
							</div>
							<div class="tarjeta-body pt-4">
								<canvas class="canvasPie" id="myBarChart"></canvas>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
	{{-- Llamada al diagrama de sectores --}}
	<script id="diagramaOperaciones" src="{{ asset('theme/dist/assets/graficas/chart-pie-dashboard.js') }}" 
	data-label="Ingresos, Gastos, Beneficios, Pendiente Cobros / Pagos" 
	data-cifras="30520.5, 22198.15, 8322.35, 2198.15"
	></script>
	{{-- Llamada al diagrama de barras --}}
	<script id="graficaAnual" src="{{ asset('theme/dist/assets/graficas/chart-bar-dashboard.js') }}" 
	data-labels="Enero, Febrero, Marzo, Abril, Mayo, Junio, Julio, Agosto, Septiembre, Octubre, Noviembre, Diciembre" 
	data-label="Ingresos, Gastos, Resultados" 
	data-ingresos="1000, 3000, 500, 2000, 2200, 1200, 950, 1200, 6250, 650, 980, 3500" 
	data-gastos="800, 2500, 600, 1800, 2000, 1000, 1300, 1000, 5000, 1100, 800, 3000" 
	data-resultados="200, 500, -100, 200, 200, 200, -350, 200, 1250, -450, 180, 500" 
	></script>
	
@endsection
