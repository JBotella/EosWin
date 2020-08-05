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
				
					<div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-0" id="declaraciones_trimestrales">
						<div class="tituloColumna">
							<span>@lang('texto.impuestos.declaraciones_trimestrales')</span>
						</div>
						<div class="row m-0">
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 111')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_111'))
								@slot('link','modelo_111')
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 115')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_115'))
								@slot('link','modelo_115')
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 123')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_123'))
								@slot('link','modelo_123')
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 130')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_130'))
								@slot('link','modelo_130')
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 131')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_131'))
								@slot('link','modelo_131')
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 303')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_303'))
								@slot('link','modelo_303')
							@endcomponent
						</div>
					</div>
						
					<div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-0" id="declaraciones_informativas">
						<div class="tituloColumna">
							<span>@lang('texto.impuestos.declaraciones_informativas')</span>
						</div>
						<div class="row m-0">
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 180')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_180'))
								@slot('link','modelo_180')
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 190')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_190'))
								@slot('link','modelo_190')
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 340')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_340'))
								@slot('link','modelo_340')
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 347')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_347'))
								@slot('link','modelo_347')
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 349')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_349'))
								@slot('link','modelo_349')
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 390')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_390'))
								{{--@slot('link','modelo_390')--}}
							@endcomponent
						</div>
					</div>
					
					<div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-0" id="suministro_inmediato_informacion">
						<div class="tituloColumna">
							<span>@lang('texto.impuestos.s_i_i') - @lang('texto.impuestos.suministro_inmediato_informacion')</span>
						</div>
						<div class="row m-0">
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-moradoAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.registro_inmediato_facturas_recibidas'))
								@slot('resumen',trans('texto.impuestos.registro_inmediato_facturas_recibidas_resumen'))
								@slot('link','modelo_regifr')
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-moradoAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.registro_inmediato_facturas_expedidas'))
								@slot('resumen',trans('texto.impuestos.registro_inmediato_facturas_expedidas_resumen'))
								{{--@slot('link','modelo_regife')--}}
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
