<div class="contenedorFicha">
	<div class="accionFicha" onclick="visorFichaTabla(0)">
		<i class="fas fa-arrow-circle-left btnAtras btnAccion" title="@lang('texto.volver')"></i>
	</div>
	<div class="contenedorFichaInt">
		<div class="cabeceraFicha">
			@lang('texto.cliente'): {{$datos->CliCodigo}}
		</div>
		<div class="contenidoFicha">
			<div class="categoriaItems">@lang('texto.datos_generales')</div>
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="itemFicha">
						<div class="nombreItemFicha">@lang('texto.nombre')</div>
						<div class="valorItemFicha">{{$datos->CliNombre}}</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="itemFicha">
						<div class="nombreItemFicha">@lang('texto.cif')</div>
						<div class="valorItemFicha">{{$datos->CliCif}}</div>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="itemFicha">
						<div class="nombreItemFicha">@lang('texto.email')</div>
						<div class="valorItemFicha">{{$datos->CliEMail}}</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="itemFicha">
						<div class="nombreItemFicha">@lang('texto.direccion')</div>
						<div class="valorItemFicha">{{$datos->CliDireccion}}</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6 col-md-3">
					<div class="itemFicha">
						<div class="nombreItemFicha">@lang('texto.localidad')</div>
						<div class="valorItemFicha">{{$datos->CliCodPostalLocali}}</div>
					</div>
				</div>
				<div class="col-6 col-md-3">
					<div class="itemFicha">
						<div class="nombreItemFicha">@lang('texto.cp')</div>
						<div class="valorItemFicha">{{$datos->CliCodPostal}}</div>
					</div>
				</div>
				<div class="col-6 col-md-3">
					<div class="itemFicha">
						<div class="nombreItemFicha">@lang('texto.provincia')</div>
						<div class="valorItemFicha">{{$datos->CliCodPostalProvin}}</div>
					</div>
				</div>
				<div class="col-6 col-md-3">
					<div class="itemFicha">
						<div class="nombreItemFicha">@lang('texto.pais')</div>
						<div class="valorItemFicha">{{$datos->CliCodPostalPais}}</div>
					</div>
				</div>
			</div>
			<div class="categoriaItems">@lang('texto.contabilidad')</div>
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="itemFicha">
						<div class="nombreItemFicha">@lang('texto.cuenta_contable')</div>
						<div class="valorItemFicha">{{intval($datos->CliPGC)}}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
