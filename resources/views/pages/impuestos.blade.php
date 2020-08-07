@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
		$rutaLink = 'impuestosFormulario';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion">
			<span><i class="fas fa-percent icoCab mr-2"></i></span>
			<span>@lang('texto.impuestos.impuestos')</span>
		</div>
		<div class="contenidoSeccion">
			<div class="seccion-responsive">
				
				<div class="row" id="contenidoTarjetasLinks">
				
					<div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-0" id="declaraciones_trimestrales">
						<div class="tituloColumna">
							<span><i class="fas fa-calendar-week mr-2 principal"></i></span>
							<span>@lang('texto.impuestos.declaraciones_trimestrales')</span>
						</div>
						<div class="row m-0">
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 111')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_111'))
								@slot('link',['ruta' => $rutaLink, 'id' => 'modelo-111'])
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 115')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_115'))
								@slot('link',['ruta' => $rutaLink, 'id' => 'modelo-115'])
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 123')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_123'))
								{{--@slot('link',['ruta' => $rutaLink, 'id' => 'modelo-123'])--}}
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 130')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_130'))
								{{--@slot('link',['ruta' => $rutaLink, 'id' => 'modelo-130'])--}}
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 131')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_131'))
								{{--@slot('link',['ruta' => $rutaLink, 'id' => 'modelo-131'])--}}
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 303')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_303'))
								{{--@slot('link',['ruta' => $rutaLink, 'id' => 'modelo-303'])--}}
							@endcomponent
						</div>
					</div>
						
					<div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-0" id="declaraciones_informativas">
						<div class="tituloColumna">
							<span><i class="far fa-calendar mr-2 azulAnalogo"></i></span>
							<span>@lang('texto.impuestos.declaraciones_informativas')</span>
						</div>
						<div class="row m-0">
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 180')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_180'))
								{{--@slot('link',['ruta' => $rutaLink, 'id' => 'modelo-180'])--}}
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 190')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_190'))
								{{--@slot('link',['ruta' => $rutaLink, 'id' => 'modelo-190'])--}}
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 340')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_340'))
								{{--@slot('link',['ruta' => $rutaLink, 'id' => 'modelo-340'])--}}
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 347')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_347'))
								{{--@slot('link',['ruta' => $rutaLink, 'id' => 'modelo-347'])--}}
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 349')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_349'))
								{{--@slot('link',['ruta' => $rutaLink, 'id' => 'modelo-349'])--}}
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.modelos.modelo').' 390')
								@slot('resumen',trans('texto.impuestos.modelos.resumen_390'))
								{{--@slot('link',['ruta' => $rutaLink, 'id' => 'modelo-390'])--}}
							@endcomponent
						</div>
					</div>
					
					<div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-0" id="suministro_inmediato_informacion">
						<div class="tituloColumna">
							<span><i class="fas fa-file-invoice-dollar mr-2 moradoAnalogo"></i></span>
							<span>@lang('texto.impuestos.s_i_i') - @lang('texto.impuestos.suministro_inmediato_informacion')</span>
						</div>
						<div class="row m-0">
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-moradoAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.registro_inmediato_facturas_recibidas.nombre'))
								@slot('resumen',trans('texto.impuestos.registro_inmediato_facturas_recibidas.resumen'))
								{{--@slot('link',['ruta' => $rutaLink, 'id' => 'modelo-regifr'])--}}
							@endcomponent
							@component('components.tarjetaImpuestos')
								@slot('class','estilo-tarjeta-moradoAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.impuestos.registro_inmediato_facturas_expedidas.nombre'))
								@slot('resumen',trans('texto.impuestos.registro_inmediato_facturas_expedidas.resumen'))
								{{--@slot('link',['ruta' => $rutaLink, 'id' => 'modelo-regife'])--}}
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
