<div class="lineaNuevoTelefono d-none" id="0">
@component('components.itemFormulario')
	@slot('class', 'col-12')
	{{--@slot('nombre','')--}}
	@slot('valor')
	<div class="row rowNuevoTelefono" id="0">
		<div class="col-4">
			<select class="form-control custom-select selectNuevoTelefono" name="">
				<option value="00" selected disabled>...</option>
				@foreach($tiposTelefono as $idTipo => $tipo)
					<option value="{{$idTipo}}">{{$tipo}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-8 d-flex align-items-center">
			<input type="text" class="form-control inputNuevoTelefono" name="" value="" />
			<i class="fas fa-minus ml-3 botonItemFormulario btnBorrar borraNuevoTelefono" onclick="borraNuevoTelefono(this)"></i>
		</div>
	</div>
	@endslot
@endcomponent
</div>
