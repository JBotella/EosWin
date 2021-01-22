@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
		$rutaLink = 'libroOficial';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion">
			<span><i class="fas fa-book icoCab mr-2"></i></span>
			<span>@lang('libros_oficiales.libros_oficiales')</span>
		</div>
		<div class="contenidoSeccion">
			<div class="seccion-responsive">
				
				<div class="row"  id="contenidoTarjetasLinks">
				
					<div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-0" id="declaraciones_trimestrales">
						<div class="tituloColumna">
							<span><i class="fas fa-shopping-cart mr-2 principal"></i></span>
							<span>@lang('libros_oficiales.compras.compras')</span>
						</div>
						<div class="row m-0">
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('libros_oficiales.compras.libro_oficial_compras.nombre'))
								@slot('resumen',trans('libros_oficiales.compras.libro_oficial_compras.resumen'))
								@slot('link',['ruta' => $rutaLink, 'id' => 'libro-registro-compras-gastos'])
							@endcomponent
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('libros_oficiales.compras.libro_oficial_gastos.nombre'))
								@slot('resumen',trans('libros_oficiales.compras.libro_oficial_gastos.resumen'))
								@slot('link',['ruta' => $rutaLink, 'id' => 'libro-gastos'])
							@endcomponent
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('libros_oficiales.compras.resumen_iva_soportado.nombre'))
								@slot('resumen',trans('libros_oficiales.compras.resumen_iva_soportado.resumen'))
								@slot('link',['ruta' => $rutaLink, 'id' => 'resumen-iva-soportado'])
							@endcomponent
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-principal')
								@slot('icono','')
								@slot('nombre',trans('libros_oficiales.compras.libro_facturas_recibidas.nombre'))
								@slot('resumen',trans('libros_oficiales.compras.libro_facturas_recibidas.resumen'))
								@slot('link',['ruta' => $rutaLink, 'id' => 'libro-facturas-recibidas'])
							@endcomponent
						</div>
					</div>
						
					<div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-0" id="declaraciones_informativas">
						<div class="tituloColumna">
							<span><i class="fas fa-chart-line mr-2 azulAnalogo"></i></span>
							<span>@lang('libros_oficiales.ventas.ventas')</span>
						</div>
						<div class="row m-0">
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('libros_oficiales.ventas.libro_oficial_ventas.nombre'))
								@slot('resumen',trans('libros_oficiales.ventas.libro_oficial_ventas.resumen'))
								@slot('link','libro_oficial_ventas')
							@endcomponent
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('libros_oficiales.ventas.resumen_iva_repercutido.nombre'))
								@slot('resumen',trans('libros_oficiales.ventas.resumen_iva_repercutido.resumen'))
								@slot('link','resumen_iva_repercutido')
							@endcomponent
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-azulAnalogo')
								@slot('icono','')
								@slot('nombre',trans('libros_oficiales.ventas.libro_facturas_expedidas.nombre'))
								@slot('resumen',trans('libros_oficiales.ventas.libro_facturas_expedidas.resumen'))
								@slot('link','libro_facturas_expedidas')
							@endcomponent
						</div>
					</div>
					
					<div class="col-12 col-md-6 col-lg-4 col-xl-4 mt-0" id="suministro_inmediato_informacion">
						<div class="tituloColumna">
							<span><i class="fas fa-ellipsis-h mr-2 moradoAnalogo"></i></span>
							<span>@lang('libros_oficiales.otros.otros')</span>
						</div>
						<div class="row m-0">
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-moradoAnalogo')
								@slot('icono','')
								@slot('nombre',trans('libros_oficiales.otros.libro_oficial_suplidos.nombre'))
								@slot('resumen',trans('libros_oficiales.otros.libro_oficial_suplidos.resumen'))
								@slot('link','libro_oficial_suplidos')
							@endcomponent
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-moradoAnalogo')
								@slot('icono','')
								@slot('nombre',trans('libros_oficiales.otros.libro_oficial_provision_fondos.nombre'))
								@slot('resumen',trans('libros_oficiales.otros.libro_oficial_provision_fondos.resumen'))
								@slot('link','libro_oficial_provision_fondos')
							@endcomponent
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-moradoAnalogo')
								@slot('icono','')
								@slot('nombre',trans('libros_oficiales.otros.libro_bienes_inversion.nombre'))
								@slot('resumen',trans('libros_oficiales.otros.libro_bienes_inversion.resumen'))
								@slot('link','libro_bienes_inversion')
							@endcomponent
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-moradoAnalogo')
								@slot('icono','')
								@slot('nombre',trans('libros_oficiales.otros.cuenta_resultado.nombre'))
								@slot('resumen',trans('libros_oficiales.otros.cuenta_resultado.resumen'))
								@slot('link','cuenta_resultado')
							@endcomponent
							@component('components.tarjetaLibrosOficiales')
								@slot('class','estilo-tarjeta-moradoAnalogo')
								@slot('icono','')
								@slot('nombre',trans('libros_oficiales.otros.exportar_libros_formato_excel.nombre'))
								@slot('resumen',trans('libros_oficiales.otros.exportar_libros_formato_excel.resumen'))
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
