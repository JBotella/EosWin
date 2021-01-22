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
			<span class="nombreEnCabecera">{{Session::get('datosEmpresa')->MENOMBRE}}</span>
		</div>
		<div class="contenidoSeccion">
			<div id="contenidoDashboard" class="seccion-responsive">
			
				<div class="row mt-3" id="dashboard-listas">
					
					<div id="lista-hoy" class="col-12 col-md-6 col-xl-6 mb-4">
						@include('pages.dashboard.hoy')
					</div>
					
					<div id="lista-amortizaciones" class="col-12 col-md-6 col-xl-6 mb-4">
						@include('pages.dashboard.amortizacionesPendientes')
					</div>
					
				</div>
				
				<div class="row mt-2" id="dashboard-tarjetas-resumen">
					@include('pages.dashboard.resumenEjercicio')
				</div>
				
				<div class="row mt-2">
				
					<div id="diagrama-operaciones" class="col-12 col-md-12 col-lg-12 col-xl-6 mb-3">
						@include('pages.dashboard.distribucionOperaciones')
					</div>
					
					<div id="graficos-trimestre" class="col-12 col-md-12 col-lg-12 col-xl-6 mb-3">
						@include('pages.dashboard.trimestres')
					</div>
					
				</div>
				
				<div class="row" id="dashboard-diagrama-barras-anual">
					<div id="diagrama-barras-anual" class="col-12">
						@include('pages.dashboard.graficaAnual')
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
