<div class="col-12 mt-3">
	<div class="bloqueFormulario">
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', trans($parametros->textos.'.campos.descripcion'))
				@slot('valor')
					<input type="text" class="form-control" name="DESCRIPCION" @if($datos) value="{{$datos->DESCRIPCION}}" @endif />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', trans($parametros->textos.'.campos.epigrafe'))
				@slot('valor')
					<input type="text" class="form-control" name="EPIGRAFE" @if($datos) value="{{$datos->EPIGRAFE}}" @endif />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', trans($parametros->textos.'.campos.tipoActividad'))
				@slot('valor')
					<input type="hidden" class="form-control" name="CLAVE" @if($datos) value="{{$datos->CLAVE}}" @endif />
					<select class="form-control custom-select" name="CLAVE">
						@foreach($parametros->ExtraUtilidad['tipoActividad']->get() as $parametro)
							<option value="{{$parametro->CLAVE}}" @if($datos) @if($datos->CLAVE == $parametro->CLAVE) selected @endif @endif>{{$parametro->CLAVE.' - '.$parametro->DESCRIPCION}}</option>
						@endforeach
					</select>
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
