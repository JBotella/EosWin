@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
		$rutaLinkList = 'utilidadListado';
		$rutaLinkForm = 'utilidadFormulario';
		$rutaLinkFormAsinc = 'utilidadFormAsinc';
	@endphp
	
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion">
			<span><i class="fas fa-cogs icoCab mr-2"></i></span>
			<span>@lang('utilidades.utilidades')</span>
		</div>
		<div class="contenidoSeccion">
			<div class="seccion-responsive">
				
				<div class="visorFormAsinc ocultaContenedor d-none" id="visorFormAsinc_0"></div>
				
				<div class="row contenidoTarjetasLinks" id="contenido_0">
				
					<div class="col-12 col-md-6 col-lg-8 col-xl-8 mt-0" id="declaraciones_trimestrales">
						<div class="tituloColumna">
							<span><i class="fas fa-desktop mr-2 principal"></i></span>
							<span>@lang('utilidades.sistema.sistema')</span>
						</div>
						<div class="row">
						
						<div class="col-12 col-md-12 col-lg-6 col-xl-6">
							<div class="row m-0">
						
							@component('components.tarjetaUtilidades')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('utilidades.sistema.actividades_empresariales.nombre'))
								@slot('resumen',trans('utilidades.sistema.actividades_empresariales.resumen'))
								@slot('link',['ruta' => $rutaLinkList, 'id' => 'actividades-empresariales'])
							@endcomponent
							@component('components.tarjetaUtilidades')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('utilidades.sistema.modulos_tributacion.nombre'))
								@slot('resumen',trans('utilidades.sistema.modulos_tributacion.resumen'))
								@slot('link',['ruta' => $rutaLinkList, 'id' => 'modulos-tributacion'])
							@endcomponent
							@component('components.tarjetaUtilidades')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('utilidades.sistema.indices_porcentajes_calculo.nombre'))
								@slot('resumen',trans('utilidades.sistema.indices_porcentajes_calculo.resumen'))
								@slot('link',['ruta' => $rutaLinkForm, 'id' => 'indices-porcentajes-calculo'])
							@endcomponent
							@component('components.tarjetaUtilidades')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('utilidades.sistema.tipos_iva_igic.nombre'))
								@slot('resumen',trans('utilidades.sistema.tipos_iva_igic.resumen'))
								@slot('link',['ruta' => $rutaLinkList, 'id' => 'tipos-iva-igic'])
							@endcomponent
							@component('components.tarjetaUtilidades')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('utilidades.sistema.tipos_irpf.nombre'))
								@slot('resumen',trans('utilidades.sistema.tipos_irpf.resumen'))
								@slot('link',['ruta' => $rutaLinkList, 'id' => 'tipos-irpf'])
							@endcomponent
							
							</div>
						</div>
						<div class="col-12 col-md-12 col-lg-6 col-xl-6">
							<div class="row m-0">
							@component('components.tarjetaUtilidades')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('utilidades.sistema.operaciones_contables.nombre'))
								@slot('resumen',trans('utilidades.sistema.operaciones_contables.resumen'))
								@slot('link',['ruta' => $rutaLinkList, 'id' => 'operaciones-contables'])
							@endcomponent
							@component('components.tarjetaUtilidades')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('utilidades.sistema.conceptos_contables.nombre'))
								@slot('resumen',trans('utilidades.sistema.conceptos_contables.resumen'))
								@slot('link',['ruta' => $rutaLinkList, 'id' => 'conceptos-contables'])
							@endcomponent
							@component('components.tarjetaUtilidades')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('utilidades.sistema.formas_pago_cobro.nombre'))
								@slot('resumen',trans('utilidades.sistema.formas_pago_cobro.resumen'))
								@slot('link',['ruta' => $rutaLinkList, 'id' => 'formas-pago-cobro'])
							@endcomponent
							</div>
						</div>
						
						</div>
					</div>
						
					<div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-0" id="declaraciones_informativas">
						<div class="tituloColumna">
							<span><i class="fas fa-tools mr-2 azulAnalogo"></i></span>
							<span>@lang('utilidades.herramientas.herramientas')</span>
						</div>
						<div class="row m-0">
							@component('components.tarjetaUtilidades')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('utilidades.herramientas.remuneracion_asientos.nombre'))
								@slot('resumen',trans('utilidades.herramientas.remuneracion_asientos.resumen'))
								{{--@slot('link',['ruta' => $rutaLinkForm, 'id' => 'remuneracion-asientos'])--}}
							@endcomponent
							@component('components.tarjetaUtilidades')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('utilidades.herramientas.importacion_asientos_excel.nombre'))
								@slot('resumen',trans('utilidades.herramientas.importacion_asientos_excel.resumen'))
								{{--@slot('link',['ruta' => $rutaLinkForm, 'id' => 'importacion-asientos-excel'])--}}
							@endcomponent
							@component('components.tarjetaUtilidades')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('utilidades.herramientas.asistente_copia_seguridad.nombre'))
								@slot('resumen',trans('utilidades.herramientas.asistente_copia_seguridad.resumen'))
								{{--@slot('link',['ruta' => $rutaLinkForm, 'id' => 'asistente-copia-seguridad'])--}}
							@endcomponent
							@component('components.tarjetaUtilidades')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('utilidades.herramientas.comprobacion_nif_terceros.nombre'))
								@slot('resumen',trans('utilidades.herramientas.comprobacion_nif_terceros.resumen'))
								{{--@slot('link',['ruta' => $rutaLinkForm, 'id' => 'comprobacion-nif-terceros'])--}}
							@endcomponent
							@component('components.tarjetaUtilidades')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('utilidades.herramientas.seguimiento_lopd.nombre'))
								@slot('resumen',trans('utilidades.herramientas.seguimiento_lopd.resumen'))
								@slot('link',['ruta' => $rutaLinkList, 'id' => 'seguimiento-lopd'])
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
