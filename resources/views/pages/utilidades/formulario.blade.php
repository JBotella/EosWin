@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion" id="cabeceraSeccionFormulario">
			<span><i class="fas fa-cog icoCab mr-2"></i></span>
			<span>@lang($parametros->textos.'.nombre')</span>
		</div>
		@component('components.seccionFormulario')
			<div class="accionesFicha">
				@include('includes.complementos.botonLinkVolver', ['ruta' => route('utilidades')])
			</div>
			<div class="contenidoFormulario">
				<form class="form" method="POST" action="#">
					@csrf
					<div class="row">
						@include('pages.utilidades.formularios.'.$id.'')
					</div>
				</form>
			</div>
		@endcomponent
	</div>
@endsection
