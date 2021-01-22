@if(isset($rutaBorrar) or isset($funcionBorrar))
	<button class="btn btn-form mt-1 btn-form btnFormBorrar mr-1" type="button">
		<i class="fas fa-trash-alt mr-1"></i>
		@lang('texto.borrar')
	</button>
@endif
@if(isset($rutaCancelar) or isset($funcionCancelar))
	<button class="btn btn-form mt-1 btn-form btnFormCancelar mr-1" type="button" @if(isset($rutaCancelar)) onclick="location.href='{{route($rutaCancelar)}}'" @elseif(isset($funcionCancelar)) onclick="{{$funcionCancelar}}" @endif>
		<i class="fas fa-chevron-circle-left mr-1"></i>
		@lang('texto.cancelar')
	</button>
@endif
<button class="btn btn-form mt-1 btn-form btnFormGuardar" @if(!isset($funcionGuardar)) type="submit" @else type="button" @endif>
	<i class="fas fa-save mr-1"></i>
	@lang('texto.guardar')
</button>
