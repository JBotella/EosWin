<div class="contenedorFicha">
	<div class="contenedorFichaInt">
		
		<div class="accionesFicha">
			<div class="btnAccionFicha btnAccion" onclick="visorFichaTabla(0)">
				<i class="fas fa-arrow-circle-left btnAtras mr-2" title="@lang('texto.volver')"></i>
				<span>@lang('texto.volver')</span>
			</div>
		</div>
		
		{{--<div class="cabeceraFicha">
			@lang('texto.cliente')
		</div>--}}
		
		<div class="contenidoFicha">
		
			<div class="row">
				<div class="col-12 col-md-6">
					{{-- Datos identificativos --}}
					<div class="categoriaItems">@lang('texto.datos_identificativos.datos_identificativos')</div>
					<div class="row">
						@component('components.itemFicha')
							@slot('class', 'col-12 col-md-12')
							@slot('nombre', trans('texto.datos_identificativos.codigo'))
							@slot('valor', $datos->CliCodigo)
						@endcomponent
					</div>
					<div class="row">
						@component('components.itemFicha')
							@slot('class', 'col-12 col-md-12')
							@slot('nombre', trans('texto.datos_identificativos.nombre_completo'))
							@slot('valor', $datos->CliNombre.' '.$datos->CliApellido1.' '.$datos->CliApellido2)
						@endcomponent
					</div>
					<div class="row">
						@component('components.itemFicha')
							@slot('class', 'col-12 col-md-12')
							@slot('nombre', trans('texto.datos_identificativos.organizacion'))
							@slot('valor', '')
						@endcomponent
					</div>
					<div class="row">
						@component('components.itemFicha')
							@slot('class', 'col-12 col-md-12')
							@slot('nombre', trans('texto.datos_identificativos.tipo_identificador'))
							@slot('valor', '')
						@endcomponent
					</div>
					<div class="row">
						@component('components.itemFicha')
							@slot('class', 'col-12 col-md-12')
							@slot('nombre', trans('texto.datos_identificativos.nif'))
							@slot('valor', $datos->CliCif)
						@endcomponent
					</div>
				</div>
				<div class="col-12 col-md-6">
					{{-- Números de teléfono --}}
					<div class="categoriaItems">@lang('texto.numeros_telefono.numeros_telefono')</div>
					<div class="row">
						@foreach($telefonos as $telefono)
							@component('components.itemFicha')
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
					<div class="categoriaItems">@lang('texto.parametrizacion_contable.parametrizacion_contable')</div>
					<div class="row">
						@component('components.itemFicha')
							@slot('class', 'col-12 col-md-12')
							@slot('nombre', trans('texto.parametrizacion_contable.tipo_operacion'))
							@slot('valor', '')
						@endcomponent
					</div>
					<div class="row">
						@component('components.itemFicha')
							@slot('class', 'col-12 col-md-12')
							@slot('nombre', trans('texto.parametrizacion_contable.tipo_iva_igic'))
							@slot('valor', '')
						@endcomponent
					</div>
					<div class="row">
						@component('components.itemFicha')
							@slot('class', 'col-12 col-md-12')
							@slot('nombre', trans('texto.parametrizacion_contable.tipo_irpf'))
							@slot('valor', '')
						@endcomponent
					</div>
					<div class="row">
						@component('components.itemFicha')
							@slot('class', 'col-12 col-md-12')
							@slot('nombre', trans('texto.parametrizacion_contable.operacion_habitual'))
							@slot('valor', '')
						@endcomponent
					</div>
				</div>
				<div class="col-12 col-md-6">
					{{-- Opciones adicionales --}}
					<div class="categoriaItems">@lang('texto.opciones_adicionales.opciones_adicionales')</div>
					<div class="row">
						@component('components.itemFicha')
							@slot('class', 'col-12 col-md-12')
							@slot('nombre', trans('texto.opciones_adicionales.correo_electronico'))
							@slot('valor', $datos->CliEMail)
						@endcomponent
					</div>
					<div class="row">
						@component('components.itemFicha')
							@slot('class', 'col-12 col-md-12')
							@slot('nombre', trans('texto.opciones_adicionales.bic_swift'))
							@slot('valor', '')
						@endcomponent
					</div>
					<div class="row">
						@component('components.itemFicha')
							@slot('class', 'col-12 col-md-12')
							@slot('nombre', trans('texto.opciones_adicionales.fecha_orden_sepa'))
							@slot('valor', '')
						@endcomponent
					</div>
					<div class="row">
						@component('components.itemFicha')
							@slot('class', 'col-12 col-md-12')
							@slot('nombre', trans('texto.opciones_adicionales.iban'))
							@slot('valor', '')
						@endcomponent
					</div>
					<div class="row">
						@component('components.itemFicha')
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
					<div class="categoriaItems">@lang('texto.domicilio_fiscal.domicilio_fiscal')</div>
					<div class="row">
						@component('components.itemFicha')
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
						@component('components.itemFicha')
							@slot('class', 'col-6 col-md-6')
							@slot('nombre', trans('texto.domicilio_fiscal.codigo_postal'))
							@slot('valor', $datos->CliCodPostal)
						@endcomponent
						@component('components.itemFicha')
							@slot('class', 'col-6 col-md-6')
							@slot('nombre', trans('texto.domicilio_fiscal.localidad'))
							@slot('valor', $datos->CliCodPostalLocali)
						@endcomponent
					</div>
					<div class="row">
						@component('components.itemFicha')
							@slot('class', 'col-6 col-md-6')
							@slot('nombre', trans('texto.domicilio_fiscal.provincia'))
							@slot('valor', $datos->CliCodPostalProvin)
						@endcomponent
						@component('components.itemFicha')
							@slot('class', 'col-6 col-md-6')
							@slot('nombre', trans('texto.domicilio_fiscal.pais'))
							@slot('valor', $datos->CliCodPostalPais)
						@endcomponent
					</div>
				</div>
				<div class="col-12 col-md-6">
					{{-- Notas --}}
					<div class="categoriaItems">@lang('texto.notas.notas')</div>
					<div class="row">
						@component('components.itemFicha')
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
