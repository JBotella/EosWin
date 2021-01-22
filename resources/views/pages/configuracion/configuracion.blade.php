@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion" id="cabeceraSeccionFormulario">
			<span><i class="fas fa-cog icoCab mr-2"></i></span>
			<span>@lang('configuraciones.configuracion_general.titulo_configuracion')</span>
		</div>
		@component('components.seccionFormulario')
			<div class="contenidoFormulario">
				<form class="form" method="POST">
				
				</form>
			</div>
		@endcomponent
	</div>
@endsection
