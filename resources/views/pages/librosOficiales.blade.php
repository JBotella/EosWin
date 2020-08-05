@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion">
			<span><i class="fas fa-book icoCab mr-2" onclick="extraBar()"></i></span>
			<span>@lang('texto.libros_oficiales.libros_oficiales')</span>
		</div>
		<div class="contenidoSeccion">
			<div class="seccion-responsive">
				
				<div class="visorFicha ocultaContenedor d-none" id="visorFicha_0"></div>
				
				<div class="row" id="contenido_0">
				
					<div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-0" id="declaraciones_trimestrales">
						<div class="tituloColumna">
							<span>@lang('texto.libros_oficiales.compras.compras')</span>
						</div>
						<div class="row m-0">
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.libros_oficiales.compras.libro_oficial_compras'))
								@slot('resumen','')
								@slot('link','libro_oficial_compras')
							@endcomponent
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.libros_oficiales.compras.libro_oficial_gastos'))
								@slot('resumen','')
								@slot('link','libro_oficial_gastos')
							@endcomponent
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.libros_oficiales.compras.resumen_iva_soportado'))
								@slot('resumen','')
								@slot('link','resumen_iva_soportado')
							@endcomponent
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('texto.libros_oficiales.compras.libro_facturas_recibidas'))
								@slot('resumen','')
								@slot('link','libro_facturas_recibidas')
							@endcomponent
						</div>
					</div>
						
					<div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-0" id="declaraciones_informativas">
						<div class="tituloColumna">
							<span>@lang('texto.libros_oficiales.ventas.ventas')</span>
						</div>
						<div class="row m-0">
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.libros_oficiales.ventas.libro_oficial_ventas'))
								@slot('resumen','')
								@slot('link','libro_oficial_ventas')
							@endcomponent
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.libros_oficiales.ventas.resumen_iva_repercutido'))
								@slot('resumen','')
								@slot('link','resumen_iva_repercutido')
							@endcomponent
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.libros_oficiales.ventas.libro_facturas_expedidas'))
								@slot('resumen','')
								@slot('link','libro_facturas_expedidas')
							@endcomponent
						</div>
					</div>
					
					<div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-0" id="suministro_inmediato_informacion">
						<div class="tituloColumna">
							<span>@lang('texto.libros_oficiales.otros.otros')</span>
						</div>
						<div class="row m-0">
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-moradoAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.libros_oficiales.otros.libro_oficial_suplidos'))
								@slot('resumen','')
								@slot('link','libro_oficial_suplidos')
							@endcomponent
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-moradoAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.libros_oficiales.otros.libro_oficial_provision_fondos'))
								@slot('resumen','')
								@slot('link','libro_oficial_provision_fondos')
							@endcomponent
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-moradoAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.libros_oficiales.otros.libro_bienes_inversion'))
								@slot('resumen','')
								@slot('link','libro_bienes_inversion')
							@endcomponent
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-moradoAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.libros_oficiales.otros.cuenta_resultado'))
								@slot('resumen','')
								@slot('link','cuenta_resultado')
							@endcomponent
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-moradoAnalogo')
								@slot('icono','')
								@slot('nombre',trans('texto.libros_oficiales.otros.exportar_libros_formato_excel'))
								@slot('resumen','')
								@slot('link','exportar_libros_formato_excel')
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
