@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion" id="cabeceraSeccionFormulario">
			@php
				if(isset($datos)){
					$nombreCompleto = $datos->CliNombre.' '.$datos->CliApellido1.' '.$datos->CliApellido2;
					$nombreCompleto = trim(preg_replace('/\s+/', ' ', $nombreCompleto));
				}else{
					$nombreCompleto = '';
				}
			@endphp
			@include('includes.cabeceras.clientes.cabeceraFormularioCliente', [$nombreCompleto])
		</div>
		@component('components.seccionFormulario')
					
			<div class="accionesFicha">
				@include('includes.complementos.botonLinkVolver', ['ruta' => route('clientes')])
			</div>
			
			<div class="contenidoFormulario">
				<form class="form" method="POST" @if(isset($datos)) action="{!!route('guardaCliente', $datos->CliCodigo)!!}" @else action="{!!route('guardaCliente')!!}" @endif>
					@csrf
					<div class="row">
					
						<div class="col-12 col-md-6" id="columnaIzquierda">
					
							{{-- Datos identificativos --}}
							<div class="categoriaBloqueFormulario">@lang('texto.datos_identificativos.datos_identificativos')</div>
							<div class="bloqueFormulario">
								<div class="row">
									@if(isset($datos))
										@component('components.itemFormulario')
											@slot('class', 'col-6 col-md-12 col-lg-6 col-xl-6')
											@slot('nombre', trans('texto.datos_identificativos.codigo'))
											@slot('valor')
												<input type="text" class="form-control" name="codigo" value="{{$datos->CliCodigo}}" readonly />
											@endslot
										@endcomponent
									@endif
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
										@slot('nombre', trans('texto.datos_identificativos.nombre'))
										@slot('valor')
											<input type="text" class="form-control" name="nombre" @if(isset($datos)) value="{{$datos->CliNombre}}" @endif />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
										@slot('nombre', trans('texto.datos_identificativos.apellido_1'))
										@slot('valor')
											<input type="text" class="form-control" name="apellido1" @if(isset($datos)) value="{{$datos->CliApellido1}}" @endif />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
										@slot('nombre', trans('texto.datos_identificativos.apellido_2'))
										@slot('valor')
											<input type="text" class="form-control" name="apellido2" @if(isset($datos)) value="{{$datos->CliApellido2}}" @endif />
										@endslot
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.datos_identificativos.organizacion'))
										@slot('valor')
											<input type="text" class="form-control" name="organizacion" @if(isset($datos)) value="{{$datos->CliNomComercial}}" @endif />
										@endslot
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.datos_identificativos.tipo_identificador'))
										@slot('valor')
											<select class="form-control custom-select" name="tipoIdentificador">
												<option value="0">Elige un tipo</option>
											</select>
										@endslot
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-12 col-lg-6 col-xl-6')
										@slot('nombre', trans('texto.datos_identificativos.nif'))
										@slot('valor')
											<input type="text" class="form-control" name="nif" @if(isset($datos)) value="{{$datos->CliCif}}" @endif />
										@endslot
									@endcomponent
								</div>
							</div>
							
							{{-- Contacto --}}
							<div class="categoriaBloqueFormulario">@lang('texto.contacto.contacto')</div>
							<div class="bloqueFormulario">
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.contacto.correo_electronico'))
										@slot('valor')
											<input type="text" class="form-control" name="email" @if(isset($datos)) value="{{$datos->CliEMail}}" @endif />
										@endslot
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.contacto.numeros_telefono'))
									@endcomponent
								</div>
								<div class="row">
									@if(isset($telefonos))
										@foreach($telefonos as $telefono)
											@component('components.itemFormulario')
												@slot('class', 'col-12')
												@slot('nombre','')
												@slot('valor')
													<div class="row">
														<div class="col-4">
															<select class="form-control custom-select" name="tipoTelefono_">
														<option value="0">Móvil</option>
													</select>
														</div>
														<div class="col-8">
															<input type="text" class="form-control" name="telefono_" value="{{$telefono->TELETELEFONO}}" />
														</div>
													</div>
												@endslot
											@endcomponent
										@endforeach
									@endif
								</div>
							</div>
						
							{{-- Domicilio Fiscal --}}
							<div class="categoriaBloqueFormulario">@lang('texto.domicilio_fiscal.domicilio_fiscal')</div>
							<div class="bloqueFormulario">
								<div class="row">
									@if(isset($datos))
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
									@endif
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.domicilio_fiscal.domicilio.domicilio'))
										@slot('valor')
											<div class="row">
												<div class="col-4">
													<select class="form-control custom-select" name="tipoVia">
														<option value="0">Calle</option>
													</select>
												</div>
												<div class="col-8">
													<input type="text" class="form-control" name="direccion" @if(isset($datos)) value="{{$datos->CliDireccion}}" @endif placeholder="@lang('texto.domicilio_fiscal.domicilio.direccion')" />
												</div>
											</div>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-4 col-md-4')
										@slot('nombre', trans('texto.domicilio_fiscal.domicilio.numero'))
										@slot('valor')
											<input type="text" class="form-control" name="numero" @if(isset($datos)) value="{{$datos->CliDireccionNumero}}" @endif placeholder="@lang('texto.domicilio_fiscal.domicilio.numero')" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-4 col-md-4')
										@slot('nombre', trans('texto.domicilio_fiscal.domicilio.piso'))
										@slot('valor')
											<input type="text" class="form-control" name="piso" @if(isset($datos)) value="{{$datos->CliDireccionPiso}}" @endif placeholder="@lang('texto.domicilio_fiscal.domicilio.piso')" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-4 col-md-4')
										@slot('nombre', trans('texto.domicilio_fiscal.domicilio.puerta'))
										@slot('valor')
											<input type="text" class="form-control" name="puerta" @if(isset($datos)) value="{{$datos->CliDireccionPuerta}}" @endif placeholder="@lang('texto.domicilio_fiscal.domicilio.puerta')" />
										@endslot
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6')
										@slot('nombre', trans('texto.domicilio_fiscal.codigo_postal'))
										@slot('valor')
											<input type="text" class="form-control" name="cp" @if(isset($datos)) value="{{$datos->CliCodPostal}}" @endif />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6')
										@slot('nombre', trans('texto.domicilio_fiscal.localidad'))
										@slot('valor')
											<input type="text" class="form-control" name="localidad" @if(isset($datos)) value="{{$datos->CliCodPostalLocali}}" @endif />
										@endslot
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6')
										@slot('nombre', trans('texto.domicilio_fiscal.provincia'))
										@slot('valor')
											<input type="text" class="form-control" name="provincia" @if(isset($datos)) value="{{$datos->CliCodPostalProvin}}" @endif />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6')
										@slot('nombre', trans('texto.domicilio_fiscal.pais'))
										@slot('valor')
											<input type="text" class="form-control" name="pais" @if(isset($datos)) value="{{$datos->CliCodPostalPais}}" @endif />
										@endslot
									@endcomponent
								</div>
							</div>
						
						</div>
						
						<div class="col-12 col-md-6" id="columnaDerecha">
						
							{{-- Parametrización Contable --}}
							<div class="categoriaBloqueFormulario">@lang('texto.parametrizacion_contable.parametrizacion_contable')</div>
							<div class="bloqueFormulario">
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
										@slot('nombre', trans('texto.parametrizacion_contable.tipo_operacion'))
										@slot('valor')
											<select class="form-control custom-select" name="tipoOperacion">
												<option value="0">...</option>
											</select>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
										@slot('nombre', trans('texto.parametrizacion_contable.tipo_iva_igic'))
										@slot('valor')
											<select class="form-control custom-select" name="tipoIvaIgic">
												<option value="0">...</option>
											</select>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
										@slot('nombre', trans('texto.parametrizacion_contable.tipo_irpf'))
										@slot('valor')
											<select class="form-control custom-select" name="tipoIrpf">
												<option value="0">...</option>
											</select>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
										@slot('nombre', trans('texto.parametrizacion_contable.operacion_habitual'))
										@slot('valor')
											<select class="form-control custom-select" name="operacionHabitual">
												<option value="0">...</option>
											</select>
										@endslot
									@endcomponent
								</div>
							</div>
						
							{{-- Banco --}}
							<div class="categoriaBloqueFormulario">@lang('texto.banco.banco')</div>
							<div class="bloqueFormulario">
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
										@slot('nombre', trans('texto.banco.bic_swift'))
										@slot('valor')
											<input type="text" class="form-control" name="bicSwift" value="" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
										@slot('nombre', trans('texto.banco.fecha_orden_sepa'))
										@slot('valor')
											<input type="date" class="form-control" name="fechaOrdenSepa" value="" />
										@endslot
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.banco.iban'))
										@slot('valor')
											<input type="text" class="form-control" name="iban" value="" />
										@endslot
									@endcomponent
								</div>
							</div>
					
							{{-- Avisos y Notas --}}
							<div class="categoriaBloqueFormulario">@lang('texto.avisos_notas.avisos_notas')</div>
							<div class="bloqueFormulario">
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.avisos_notas.mensaje_aviso'))
										@slot('valor')
											<input type="text" class="form-control" name="mensajeAviso" value="" />
										@endslot
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.avisos_notas.notas'))
										@slot('valor')
											<textarea class="form-control textareaDefecto" name="notas" placeholder="..."></textarea>
										@endslot
									@endcomponent
								</div>
							</div>
						
						</div>
						
						<div class="col-12 col-md-12 mt-3" id="columnaPie">
							<div class="bloqueFormulario">
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12 text-center')
										@slot('valor')
											<button class="btn btn-form mt-1 btn-form" type="submit">
												<i class="fas fa-save mr-1"></i>
												@lang('texto.guardar')
											</button>
										@endslot
									@endcomponent
								</div>
							</div>
						</div>
						
					</div>
				</form>
			</div>
				
		@endcomponent
	</div>
@endsection
