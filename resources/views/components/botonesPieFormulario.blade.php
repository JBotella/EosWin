@if(isset($rutaBorrar))
<button class="btn btn-form mt-1 btn-form btnFormBorrar mr-1" type="button">
	<i class="fas fa-trash-alt mr-1"></i>
	@lang('texto.borrar')
</button>
@endif
@if(isset($rutaCancelar))
<button class="btn btn-form mt-1 btn-form btnFormCancelar mr-1" type="button" onclick="location.href='{{route($rutaCancelar)}}'">
	<i class="fas fa-chevron-circle-left mr-1"></i>
	@lang('texto.cancelar')
</button>
@endif
<button class="btn btn-form mt-1 btn-form btnFormGuardar" type="submit">
	<i class="fas fa-save mr-1"></i>
	@lang('texto.guardar')
</button>
