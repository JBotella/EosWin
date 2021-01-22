@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion" id="cabeceraSeccionFormulario">
			<span><i class="fas fa-percent icoCab mr-2"></i></span>
			<span id="nombreCabecera"></span>
			<div class="cabSeccBtnAcciones">
			</div>
		</div>
		@component('components.seccionFormulario')
			<div class="accionesFicha">
				<a class="btnAccionFicha btnAccion" href="{{route('impuestos')}}">
					<i class="fas fa-arrow-circle-left btnAtras mr-2" title="@lang('texto.volver')"></i>
					<span>@lang('texto.volver')</span>
				</a>
			</div>
			<div class="contenidoFormulario">
				<form class="form">
					<div class="row">
						@include('pages.impuestos.formularios.'.$id.'')
					</div>
				</form>
			</div>
		@endcomponent
	</div>
	<script>
		$(document).ready(function(){
			var nombreFormulario = $('#nombreFormulario').data('formulario');
			$('#nombreCabecera').html(nombreFormulario);
		});
	</script>
@endsection
