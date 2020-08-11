<div class="dropdown selectorColumnas">
	<div class="dropdown-toggle" id="columnasTabla" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-columns mr-1"></i>@lang('texto.columnas')</div>
	<div class="dropdown-menu dropdown-menu-right listaSelectorColumnas" aria-labelledby="columnasTabla">
		{{--@foreach($columnas as $idColumna => $columna)
			<div class="dropdown-item itemColumna" data-id-columna="{{$idColumna}}">
				<input name="checkColumna" class="checkColumna" id="checkColumna_{{$idColumna}}" type="checkbox" @if(in_array($idColumna,$visibles)) checked @endif />
				<label for="checkColumna_{{$idColumna}}">{{$columna}}</label>
			</div>
		@endforeach--}}
		@foreach($columnas as $idColumna => $columna)
			<div class="dropdown-item itemColumna chkList @if(in_array($idColumna,$visibles)) chkSel @endif" id="itemColumna_{{$idColumna}}" data-id-columna="{{$idColumna}}">
				<div class="cuadroCheck">
					@if(in_array($idColumna,$visibles))
					{{--<i class="fas fa-check chkIcoSel"></i>--}}
						<i class="selColumnas"></i>
					@endif
				</div>
				{{$columna}}
				<input name="checkColumna" class="checkColumna d-none" id="checkColumna_{{$idColumna}}" type="checkbox" @if(in_array($idColumna,$visibles)) checked @endif />
			</div>
		@endforeach
	</div>
</div>

<script>
/* Imprime el icono del check dentro del cuadro selector */
$(document).ready(function(){
	imprimeSelector('selColumnas');
});
</script>
