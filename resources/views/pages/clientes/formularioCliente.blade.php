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
												@slot('class', 'col-12 lineaTelefonoClonable')
												{{--@slot('nombre','')--}}
												@slot('valor')
													@include('pages.clientes.telefonoCliente', ['id' => $datos->CliCodigo, 'idTelefono' => $telefono->ID, 'telefono' => $telefono->TELETELEFONO, 'tipoTelefono' => $telefono->TELEFAX, 'tiposTelefono' => $constantes->listaConstantes('tipo-telefono'), 'rutaAccionTelefono' => route('telefonoCliente') ])
												@endslot
											@endcomponent
										@endforeach
									@endif
									<div class="w-100" id="nuevosTelefonos">
										@include('pages.clientes.lineaVaciaTelefonoCliente',['tiposTelefono' => $constantes->listaConstantes('tipo-telefono')])
									</div>
									<div class="col-12 mt-1">
										<div class="nuevoItemFormulario" id="nuevo">
											<span class="principal">@lang('texto.nuevo')</span>
											{{--
											'{{$id}}','{{$rutaAccionTelefono}}','borrar','{{$idTelefono}}'
											--}}
											<i class="fas fa-plus-circle ml-2 botonItemFormulario btnCrear" onclick="accionTelefono('','','nuevo','')" title="@lang('texto.nuevo')"></i>
										</div>
									</div>
									
								</div>
							</div>
						
							{{-- Domicilio Fiscal --}}
							<div class="categoriaBloqueFormulario">
								@lang('texto.domicilio_fiscal.domicilio_fiscal')
								<i type="button" class="btnAccion fas fa-map-marker-alt float-right azulAnalogo" onclick="linkDireccionMaps()"></i>
							</div>
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
														<option selected disabled>Tipo de Vía</option>
														@foreach($tiposVia as $via)
															<option value="{{$via->Codigo}}" @if($datos->CliTipoVia == $via->Codigo) selected @endif>{{$via->Descripcion}}</option>
														@endforeach
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
											<input type="text" class="form-control" name="cp" @if(isset($datos)) value="{{$datos->CliCodPostal}}" @endif data-href="{{ route('listaLocalidadesMin') }}" onclick="listaExtra(this)" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6')
										@slot('nombre', trans('texto.domicilio_fiscal.localidad'))
										@slot('valor')
											<input type="text" class="form-control" name="localidad" @if(isset($datos)) value="{{$datos->CliCodPostalLocali}}" @endif data-href="{{ route('listaLocalidadesMin') }}" onclick="listaExtra(this)" />
										@endslot
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6')
										@slot('nombre', trans('texto.domicilio_fiscal.provincia'))
										@slot('valor')
											<input type="text" class="form-control" name="provincia" @if(isset($datos)) value="{{$datos->CliCodPostalProvin}}" @endif data-href="{{ route('listaLocalidadesMin') }}" onclick="listaExtra(this)" />
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
											@component('components.botonesPieFormulario')
												@slot('rutaCancelar', 'clientes')
												@slot('rutaBorrar', '')
											@endcomponent
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
	<script>
		function cargaDatosLocalidad(datosLocalidad){
			$('input[name="cp"]').val(datosLocalidad.cp);
			$('input[name="localidad"]').val(datosLocalidad.localidad);
			$('input[name="provincia"]').val(datosLocalidad.provincia);
			extraBar();
		}
		function linkDireccionMaps(){
			var direccion = $('input[name="direccion"]').val();
			var numero = $('input[name="numero"]').val();
			var localidad = $('input[name="localidad"]').val();
			var datos = encodeURI(direccion+' '+numero+' '+localidad);
			var rutaMaps = 'https://www.google.com/maps/place/'+datos;
			window.open(rutaMaps,"_blank");
		}
		function preguntaAccionItemForm(accion,idTelefono){
			if($('#'+accion+'_'+idTelefono).hasClass('d-none')){
				$('.accionItemForm').addClass('d-none');
				$('#'+accion+'_'+idTelefono).removeClass('d-none');
				$(".valorItemFormulario").find('input').removeClass('itemFormMarcado');
				$('#'+idTelefono).parent(".valorItemFormulario").find('input').addClass('itemFormMarcado');
			}else{
				$('.accionItemForm').addClass('d-none');
				$(".valorItemFormulario").find('input').removeClass('itemFormMarcado');
			}
		}
		function accionTelefono(id,rutaAccion,accion,idTelefono){
			if(accion == 'borrar'){
				var _token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				var URLdomain = window.location.origin;
				$.ajax({
					type:'POST',
					url:rutaAccion,
					data:{_token:_token, id:id, accion:accion, idTelefono:idTelefono},
					headers:{'Access-Control-Allow-Origin':URLdomain},
					success:function(datos){
						$('#'+idTelefono).parent(".valorItemFormulario").addClass('d-none');
					}
				});
			}
			if(accion == 'nuevo'){
				if($("#nuevosTelefonos").hasClass('d-none')){
					//$("#nuevosTelefonos").removeClass('d-none');
				}else{
					//$(".lineaVaciaTelefono:last").clone().appendTo("#nuevosTelefonos");
					//var $div = $('div[id^="klon"]:last');
					
				}
				//$(".lineaVaciaTelefono:last").clone().appendTo("#nuevosTelefonos");
				//$(".lineaVaciaTelefono:last").removeClass('d-none');
				// Nuevo Planteamiento
				$(".lineaTelefonoClonable:last").clone().appendTo("#nuevosTelefonos");
			}
		}
	</script>
@endsection
