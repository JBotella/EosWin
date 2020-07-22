@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'visible';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion">
			<span><i class="fas fa-tachometer-alt mr-2" onclick="extraBar()"></i></span>
			<span>@lang('texto.dashboard')</span>
		</div>
		<div class="contenidoSeccion">
			@include('includes.ejemplos.formulario')
			@include('includes.ejemplos.tabla')
			@include('includes.ejemplos.tablaEditable')
		</div>
	</div>
@endsection
