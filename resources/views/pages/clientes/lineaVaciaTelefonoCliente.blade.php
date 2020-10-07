<div class="lineaNuevoTelefono d-none">
@component('components.itemFormulario')
	@slot('class', 'col-12')
	{{--@slot('nombre','')--}}
	@slot('valor')
	<div class="row" id="">
		<div class="col-4">
			<select class="form-control custom-select" name="tipoTelefono[]">
				<option selected disabled>...</option>
				@foreach($tiposTelefono as $idTipo => $tipo)
					<option value="{{$idTipo}}">{{$tipo}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-8 d-flex align-items-center">
			<input type="text" class="form-control" name="telefono[]" value="" />
			<i class="fas fa-trash-alt ml-3 botonItemFormulario btnBorrar" onclick=""></i>
		</div>
	</div>
	@endslot
@endcomponent
</div>
