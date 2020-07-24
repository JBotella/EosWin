@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'visible';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion">
			<span><i class="fas fa-tachometer-alt icoCab mr-2" onclick="extraBar()"></i></span>
			<span>@lang('texto.dashboard')</span>
		</div>
		<div class="contenidoSeccion">
			<div class="seccion-responsive">
				@include('includes.ejemplos.formulario')
				@include('includes.ejemplos.tabla')
				@include('includes.ejemplos.tablaEditable')
			</div>
		</div>
	</div>
@endsection
