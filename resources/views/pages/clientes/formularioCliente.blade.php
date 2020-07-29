@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion" id="cabeceraSeccionFormulario">
			@include('includes.cabeceras.clientes.cabeceraVerCliente')
		</div>
		@component('components.seccionFormulario')
			<div class="contenedorFormulario">
				<div class="contenedorFormularioInt">
					
					<div class="accionesFicha">
						<a class="btnAccionFicha btnAccion" href="{{route('clientes')}}">
							<i class="fas fa-arrow-circle-left btnAtras mr-2" title="@lang('texto.volver')"></i>
							<span>@lang('texto.volver')</span>
						</a>
					</div>
					
					<div class="contenidoFormulario">
					
						<div class="row">
							<div class="col-12 col-md-6">
								{{-- Datos identificativos --}}
								<div class="categoriaBloque">@lang('texto.datos_identificativos.datos_identificativos')</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-6')
										@slot('nombre', trans('texto.datos_identificativos.codigo'))
										@slot('valor')
											<input type="text" class="form-control" name="" value="{{$datos->CliCodigo}}" />
										@endslot
									@endcomponent
									
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-6')
										@slot('nombre', trans('texto.datos_identificativos.nombre'))
										@slot('valor')
											<input type="text" class="form-control" name="" value="{{$datos->CliNombre}}" />
										@endslot
									@endcomponent
									
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-6')
										@slot('nombre', trans('texto.datos_identificativos.apellido_1'))
										@slot('valor')
											<input type="text" class="form-control" name="" value="{{$datos->CliApellido1}}" />
										@endslot
									@endcomponent
									
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-6')
										@slot('nombre', trans('texto.datos_identificativos.apellido_2'))
										@slot('valor')
											<input type="text" class="form-control" name="" value="{{$datos->CliApellido2}}" />
										@endslot
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.datos_identificativos.organizacion'))
										@slot('valor', '')
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.datos_identificativos.tipo_identificador'))
										@slot('valor', '')
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.datos_identificativos.nif'))
										@slot('valor', $datos->CliCif)
									@endcomponent
								</div>
							</div>
							<div class="col-12 col-md-6">
								{{-- Números de teléfono --}}
								<div class="categoriaBloque">@lang('texto.numeros_telefono.numeros_telefono')</div>
								<div class="row">
									@foreach($telefonos as $telefono)
										@component('components.itemFormulario')
											@slot('class', 'col-12 col-md-12')
											@slot('nombre', '')
											@slot('valor', $telefono->TELETELEFONO)
										@endcomponent
									@endforeach
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-12 col-md-6">
								{{-- Parametrización Contable --}}
								<div class="categoriaBloque">@lang('texto.parametrizacion_contable.parametrizacion_contable')</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.parametrizacion_contable.tipo_operacion'))
										@slot('valor', '')
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.parametrizacion_contable.tipo_iva_igic'))
										@slot('valor', '')
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.parametrizacion_contable.tipo_irpf'))
										@slot('valor', '')
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.parametrizacion_contable.operacion_habitual'))
										@slot('valor', '')
									@endcomponent
								</div>
							</div>
							<div class="col-12 col-md-6">
								{{-- Opciones adicionales --}}
								<div class="categoriaBloque">@lang('texto.opciones_adicionales.opciones_adicionales')</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.opciones_adicionales.correo_electronico'))
										@slot('valor', $datos->CliEMail)
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.opciones_adicionales.bic_swift'))
										@slot('valor', '')
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.opciones_adicionales.fecha_orden_sepa'))
										@slot('valor', '')
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.opciones_adicionales.iban'))
										@slot('valor', '')
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.opciones_adicionales.mensaje_aviso'))
										@slot('valor', '')
									@endcomponent
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-12 col-md-6">
								{{-- Domicilio Fiscal --}}
								<div class="categoriaBloque">@lang('texto.domicilio_fiscal.domicilio_fiscal')</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@php
											$direccionCompleta = $datos->CliDireccion;
											if($direccionCompleta){
												if($datos->CliTipoVia){
													$direccionCompleta = '<span>'.$datos->CliTipoVia.'/</span> '.$direccionCompleta;
												}
												if($datos->CliDireccionNumero){
													$direccionCompleta .= ', '.$datos->CliDireccionNumero;
												}
												if($datos->CliDireccionPiso){
													$direccionCompleta .= ' - <span>'.trans('texto.domicilio_fiscal.domicilio.piso').'</span> '.$datos->CliDireccionPiso;
												}
												if($datos->CliDireccionPuerta){
													$direccionCompleta .= ' - <span>'.trans('texto.domicilio_fiscal.domicilio.puerta').'</span> '.$datos->CliDireccionPuerta;
												}
											}
										@endphp
										@slot('nombre', trans('texto.domicilio_fiscal.domicilio.domicilio'))
										@slot('valor', $direccionCompleta)
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6')
										@slot('nombre', trans('texto.domicilio_fiscal.codigo_postal'))
										@slot('valor', $datos->CliCodPostal)
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6')
										@slot('nombre', trans('texto.domicilio_fiscal.localidad'))
										@slot('valor', $datos->CliCodPostalLocali)
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6')
										@slot('nombre', trans('texto.domicilio_fiscal.provincia'))
										@slot('valor', $datos->CliCodPostalProvin)
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6')
										@slot('nombre', trans('texto.domicilio_fiscal.pais'))
										@slot('valor', $datos->CliCodPostalPais)
									@endcomponent
								</div>
							</div>
							<div class="col-12 col-md-6">
								{{-- Notas --}}
								<div class="categoriaBloque">@lang('texto.notas.notas')</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', '')
										@slot('valor', '')
									@endcomponent
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		@endcomponent
	</div>
@endsection
