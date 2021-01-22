<div class="row" id="{{$idTelefono}}">
	<div class="col-4">
		<select class="form-control custom-select" name="tipoTelefono[{{$idTelefono}}]">
			<option value="00" selected disabled>...</option>
			@foreach($tiposTelefono as $idTipo => $tipo)
				<option value="{{$idTipo}}" @if(strpos($tipoTelefono,$idTipo) !== false) selected @endif>{{$tipo}}</option>
			@endforeach
		</select>
	</div>
	<div class="col-8 d-flex align-items-center">
		<input type="text" class="form-control" name="telefono[{{$idTelefono}}]" value="{{$telefono}}" />
		<i class="fas fa-trash-alt ml-3 botonItemFormulario btnBorrar" onclick="preguntaAccionItemForm('borrar','{{$idTelefono}}')"></i>
	</div>
</div>
<div class="accionItemForm d-none itemFormMarcado" id="borrar_{{$idTelefono}}">
	<span class="rojoOpuesto">@lang('texto.confirma_borrar')</span>
	<i class="fas fa-trash-alt ml-3 botonItemFormulario btnBorrar" onclick="accionTelefono('{{$id}}','{{$rutaAccionTelefono}}','borrar','{{$idTelefono}}')" title="@lang('texto.confirmar')"></i>
	<i class="fas fa-times-circle ml-2 botonItemFormulario btnCancelar" onclick="preguntaAccionItemForm('borrar','{{$idTelefono}}')" title="@lang('texto.cancelar')"></i>
</div>
