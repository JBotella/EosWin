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
							<div class="tarjeta-titulo">Hoy</div>
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
							<div class="tarjeta-titulo">Amortizaciones pendientes</div>
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
				
					<div id="diagrama_operaciones" class="col-12 col-md-6 col-xl-6 mb-4">
						<div class="tarjeta estilo-tarjeta estilo-tarjeta-diagrama mb-4">
							<div class="tarjeta-titulo">
								<i class="fas fa-chart-pie mr-1"></i>
								Distribución de operaciones
							</div>
							<div class="tarjeta-body pt-3">
								<canvas class="canvasPie" id="myPieChart"></canvas>
							</div>
							{{--<div class="tarjeta-pie small text-muted">...</div>--}}
						</div>
					</div>
					
					<div id="graficos-trimestre" class="col-12 col-md-6 col-xl-6 mb-4">
						
						@component('components.resumenTrimestreDashboard')
							@slot('trimestre',1)
							@slot('ingresos',75)
							@slot('gastos',25)
							@slot('resultado',25)
						@endcomponent
						
						@component('components.resumenTrimestreDashboard')
							@slot('trimestre',2)
							@slot('ingresos',55)
							@slot('gastos',45)
							@slot('resultado',10)
						@endcomponent
						
						@component('components.resumenTrimestreDashboard')
							@slot('trimestre',3)
							@slot('ingresos',50)
							@slot('gastos',50)
							@slot('resultado',0)
						@endcomponent
						
						@component('components.resumenTrimestreDashboard')
							@slot('trimestre',4)
							@slot('ingresos',60)
							@slot('gastos',40)
							@slot('resultado',20)
						@endcomponent
						
					</div>
					
				</div>
				
			</div>
		</div>
	</div>
	
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
	<script src="{{ asset('theme/dist/assets/graficas/chart-pie-dashboard.js') }}"></script>
	
@endsection
