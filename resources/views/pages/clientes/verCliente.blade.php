<div class="contenedorFicha">
	<div class="contenedorFichaInt">
		<div class="accionFicha" onclick="visorFichaTabla(0)">
			<i class="fas fa-arrow-circle-left btnAtras btnAccion" title="@lang('texto.volver')"></i>
		</div>
		<div class="cabeceraFicha">
			@lang('texto.cliente'): {{$datos->CliCodigo}}
		</div>
		
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
				</div>
			</div>
			
			<div class="row">
				<div class="col-12 col-md-6">
					{{-- Parametrización Contable --}}
					<div class="categoriaItems">@lang('texto.parametrizacion_contable.parametrizacion_contable')</div>
					
				</div>
				<div class="col-12 col-md-6">
					{{-- Opciones adicionales --}}
					<div class="categoriaItems">@lang('texto.opciones_adicionales.opciones_adicionales')</div>
					
				</div>
			</div>
			
			<div class="row">
				<div class="col-12 col-md-6">
					{{-- Domicilio Fiscal --}}
					<div class="categoriaItems">@lang('texto.domicilio_fiscal.domicilio_fiscal')</div>
					
				</div>
				<div class="col-12 col-md-6">
					{{-- Notas --}}
					<div class="categoriaItems">@lang('texto.notas.notas')</div>
					
				</div>
			</div>
			
		</div>
	</div>
</div>
