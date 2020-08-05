@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion">
			<span><i class="fas fa-percent icoCab mr-2" onclick="extraBar()"></i></span>
			<span>@lang('texto.impuestos.impuestos')</span>
		</div>
		<div class="contenidoSeccion">
			<div class="seccion-responsive">
			
				<div class="row">
				
					<div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-3" id="declaraciones_trimestrales">
						<div class="row m-0">
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 111')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_111'))
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 115')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_115'))
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 123')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_123'))
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 130')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_130'))
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 131')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_131'))
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 303')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_303'))
							@endcomponent
						</div>
					</div>
						
					<div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-3" id="declaraciones_informativas">
						<div class="row m-0">
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 180')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_180'))
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 190')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_190'))
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 340')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_340'))
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 347')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_347'))
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 349')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_349'))
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 390')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_390'))
							@endcomponent
						</div>
					</div>
					
					<div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-3" id="suministro_inmediato_informacion">
						<div class="row m-0">
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-moradoAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.registro_inmediato_facturas_recibidas'))
								@slot('resumen',trans('texto.impuestos.registro_inmediato_facturas_recibidas_resumen'))
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-moradoAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.registro_inmediato_facturas_expedidas'))
								@slot('resumen',trans('texto.impuestos.registro_inmediato_facturas_expedidas_resumen'))
							@endcomponent
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
	</div>
	<script>
	</script>
@endsection
