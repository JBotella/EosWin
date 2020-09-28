<div class="col-12 mt-3">
	<div class="bloqueFormulario">
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', 'Código')
				@slot('valor')
					<input type="text" class="form-control" name="CODOPERACION" @if($datos) value="{{$datos->CODOPERACION}}" readonly @endif />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', 'Descripción')
				@slot('valor')
					<input type="text" class="form-control" name="DESOPERACION" value="@if($datos){{$datos->DESOPERACION}}@endif" />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', 'Tipo')
				@slot('valor')
					<select class="form-control custom-select" name="INGRESOGASTO">
						@foreach($constantes->selector('ingreso-gasto') as $valor => $nombre)
							<option value="{{$valor}}" @if($datos) @if($datos->INGRESOGASTO == $valor) selected @endif @endif>{{$nombre}}</option>
						@endforeach
					</select>
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', 'Columna en el libro de registro')
				@slot('valor')
					<select class="form-control custom-select" name="COLUMNAREGISTRO">
						@foreach($constantes->selector('columna-libro-registro') as $valor => $nombre)
							<option value="{{$valor}}" @if($datos) @if($datos->COLUMNAREGISTRO == $valor) selected @endif @endif>{{$valor.' - '.$nombre}}</option>
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
