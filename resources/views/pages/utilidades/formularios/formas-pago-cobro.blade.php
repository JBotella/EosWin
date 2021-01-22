<div class="col-12 mt-3">
	<div class="bloqueFormulario">
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', trans($parametros->textos.'.campos.codigo'))
				@slot('valor')
					<input type="text" class="form-control" name="FORMCODIGO" @if($datos) value="{{$datos->FORMCODIGO}}" readonly @endif />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', trans($parametros->textos.'.campos.descripcion'))
				@slot('valor')
					<input type="text" class="form-control" name="FORMDESCRI" @if($datos) value="{{$datos->FORMDESCRI}}" @endif />
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
