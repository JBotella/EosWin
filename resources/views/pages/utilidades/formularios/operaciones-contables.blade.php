<div class="col-12 mt-3">
	<div class="bloqueFormulario">
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', trans($parametros->textos.'.campos.codigo'))
				@slot('valor')
					<input type="text" class="form-control" name="CODOPERACION" @if($datos) value="{{$datos->CODOPERACION}}" readonly @endif />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', trans($parametros->textos.'.campos.descripcion'))
				@slot('valor')
					<input type="text" class="form-control" name="DESOPERACION" @if($datos) value="{{$datos->DESOPERACION}}" @endif />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', trans($parametros->textos.'.campos.ingresoGasto'))
				@slot('valor')
					<select class="form-control custom-select" name="INGRESOGASTO" id="INGRESOGASTO" onchange="columnasIngresoGasto()">
						@foreach($constantes->listaConstantes('ingreso-gasto') as $valor => $nombre)
							<option value="{{$valor}}" @if($datos) @if($datos->INGRESOGASTO == $valor) selected @endif @endif>{{$nombre}}</option>
						@endforeach
					</select>
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', trans($parametros->textos.'.campos.columnaLibroRegistro'))
				@slot('valor')
					<select class="form-control custom-select" name="COLUMNAREGISTRO" id="COLUMNAREGISTRO">
						@foreach($parametros->ExtraUtilidad['columnasLibroRegistro']->get() as $parametro)
							<option value="{{$parametro->CODIGO}}" @if($datos) @if($datos->COLUMNAREGISTRO == $parametro->CODIGO) selected @endif @endif data-ingreso-gasto="{{$parametro->TIPO}}">{{$parametro->CODIGO.' - '.$parametro->DESCRIPCION}}</option>
						@endforeach
					</select>
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', trans($parametros->textos.'.campos.opcionesCalculoImpuestos'))
				@slot('valor')
					<div class="lineaElementosClicables">
						<div class="itemCheckbox custom-control custom-checkbox p-0 pl-3 col-6">
							<input type="checkbox" class="form-control custom-control-input" id="mod340" name="mod340" @if($datos and ($datos->CONFIGURACIONIMPUESTOS == 4 or $datos->CONFIGURACIONIMPUESTOS == 12)) checked @endif />
							<label class="custom-control-label" for="mod340">@lang($parametros->textos.'.campos.incluirEnModelo340')</label>
						</div>
						<div class="itemCheckbox custom-control custom-checkbox p-0 pl-3 col-6">
							<input type="checkbox" class="form-control custom-control-input" id="mod347" name="mod347" @if($datos and ($datos->CONFIGURACIONIMPUESTOS == 8 or $datos->CONFIGURACIONIMPUESTOS == 12)) checked @endif />
							<label class="custom-control-label" for="mod347">@lang($parametros->textos.'.campos.incluirEnModelo347')</label>
						</div>
					</div>
				@endslot
			@endcomponent
		</div>
	</div>
</div>

<div class="col-12 col-md-12 mt-3" id="columnaPie">
	<div class="bloqueFormulario mb-0">
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12 text-center')
				@slot('valor')
					@component('components.botonesPieFormulario')
						@slot('funcionGuardar', '')
						@slot('funcionCancelar', 'visorFormCerrar(0)')
						@slot('funcionBorrar', '')
					@endcomponent
				@endslot
			@endcomponent
		</div>
	</div>
</div>
<script>
function columnasIngresoGasto(){
	var val = $('#INGRESOGASTO').val();
	$('#COLUMNAREGISTRO option').addClass('d-none');
	$('#COLUMNAREGISTRO option[data-ingreso-gasto="'+val+'"]').removeClass('d-none');
	// El tipo T siempre visible
	$('#COLUMNAREGISTRO option[data-ingreso-gasto="T"]').removeClass('d-none');
}
columnasIngresoGasto();
</script>
