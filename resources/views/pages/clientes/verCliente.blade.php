<div class="contenedorFicha">
	<div class="accionFicha" onclick="visorFichaTabla(0)">
		<i class="fas fa-arrow-circle-left btnAtras btnAccion" title="@lang('texto.volver')"></i>
	</div>
	<div class="contenedorFichaInt">
		<div class="cabeceraFicha">
			@lang('texto.cliente'): {{$datos->CliCodigo}}
		</div>
		<div class="contenidoFicha">
		
			<div class="row">
			
				<div class="col-12 col-md-8">
					{{-- Datos Generales --}}
					<div class="categoriaItems">@lang('texto.datos_generales.datos_generales')</div>
					<div class="row">
						<div class="col-12 col-md-12">
							<div class="itemFicha">
								<div class="nombreItemFicha">@lang('texto.datos_generales.nombre')</div>
								<div class="valorItemFicha">{{$datos->CliNombre}}</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-6 col-md-3">
							<div class="itemFicha">
								<div class="nombreItemFicha">@lang('texto.datos_generales.cif')</div>
								<div class="valorItemFicha">{{$datos->CliCif}}</div>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="itemFicha">
								<div class="nombreItemFicha">@lang('texto.datos_generales.email')</div>
								<div class="valorItemFicha">{{$datos->CliEMail}}</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="itemFicha">
								<div class="nombreItemFicha">@lang('texto.datos_generales.direccion.direccion')</div>
								<div class="valorItemFicha">
									@if($datos->CliTipoVia){{$datos->CliTipoVia}}/ @endif
									{{$datos->CliDireccion}}@if($datos->CliDireccionNumero), {{$datos->CliDireccionNumero}} @endif
									@if($datos->CliDireccionPiso) - @lang('texto.datos_generales.direccion.piso') {{$datos->CliDireccionPiso}} @endif
									@if($datos->CliDireccionPuerta) - @lang('texto.datos_generales.direccion.puerta') {{$datos->CliDireccionPuerta}} @endif
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-6 col-md-3">
							<div class="itemFicha">
								<div class="nombreItemFicha">@lang('texto.datos_generales.direccion.localidad')</div>
								<div class="valorItemFicha">{{$datos->CliCodPostalLocali}}</div>
							</div>
						</div>
						<div class="col-6 col-md-3">
							<div class="itemFicha">
								<div class="nombreItemFicha">@lang('texto.datos_generales.direccion.cp')</div>
								<div class="valorItemFicha">{{$datos->CliCodPostal}}</div>
							</div>
						</div>
						<div class="col-6 col-md-3">
							<div class="itemFicha">
								<div class="nombreItemFicha">@lang('texto.datos_generales.direccion.provincia')</div>
								<div class="valorItemFicha">{{$datos->CliCodPostalProvin}}</div>
							</div>
						</div>
						<div class="col-6 col-md-3">
							<div class="itemFicha">
								<div class="nombreItemFicha">@lang('texto.datos_generales.direccion.pais')</div>
								<div class="valorItemFicha">{{$datos->CliCodPostalPais}}</div>
							</div>
						</div>
					</div>
					{{-- Representante y Zonas --}}
					<div class="categoriaItems">@lang('texto.representante_y_zonas.representante_y_zonas')</div>
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="itemFicha">
								<div class="nombreItemFicha">@lang('texto.representante_y_zonas.representante')</div>
								<div class="valorItemFicha">{{$datos->RepresentanteCodigo}}</div>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="itemFicha">
								<div class="nombreItemFicha">@lang('texto.representante_y_zonas.descripcion')</div>
								<div class="valorItemFicha">{{$datos->RepresentanteDesc}}</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="itemFicha">
								<div class="nombreItemFicha">@lang('texto.representante_y_zonas.zona')</div>
								<div class="valorItemFicha">{{$datos->ZonaCodigo}}</div>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="itemFicha">
								<div class="nombreItemFicha">@lang('texto.representante_y_zonas.descripcion')</div>
								<div class="valorItemFicha">{{$datos->ZonaDesc}}</div>
							</div>
						</div>
					</div>
			
				</div>
			
				<div class="col-12 col-md-4">
					{{-- Contabilidad --}}
					<div class="categoriaItems">@lang('texto.contabilidad.contabilidad')</div>
					<div class="row">
						<div class="col-12 col-md-12">
							<div class="itemFicha">
								<div class="nombreItemFicha">@lang('texto.contabilidad.cuenta_contable')</div>
								<div class="valorItemFicha">{{intval($datos->CliPGC)}}</div>
							</div>
						</div>
					</div>
			
				</div>
				
			</div>
			
		</div>
	</div>
</div>
