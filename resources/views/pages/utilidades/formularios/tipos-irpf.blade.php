<div class="col-12 mt-3">
	<div class="bloqueFormulario">
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', trans($parametros->textos.'.campos.nombre'))
				@slot('valor')
					<input type="text" class="form-control" name="DescIVA" @if($datos) value="{{$datos->DescIVA}}" readonly @endif />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-4')
				@slot('nombre', trans($parametros->textos.'.campos.porcentajeIrpf'))
				@slot('valor')
					<input type="number" class="form-control" name="TipoIVA" @if($datos) value="{{number_format($datos->TipoIVA)}}" @endif />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-4')
				@slot('nombre', trans($parametros->textos.'.campos.adonIva'))
				@slot('valor')
					<input type="text" class="form-control" name="AdonIVA" @if($datos) value="{{$datos->AdonIVA}}" @endif />
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
