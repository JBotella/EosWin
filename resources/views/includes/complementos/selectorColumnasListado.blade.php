<div class="dropdown selectorColumnas">
	<div class="dropdown-toggle" id="columnasTabla" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-columns mr-1"></i>@lang('texto.columnas')</div>
	<div class="dropdown-menu dropdown-menu-right listaSelectorColumnas" aria-labelledby="columnasTabla">
		@foreach($columnas as $idColumna => $columna)
			<div class="dropdown-item itemColumna" data-id-columna="{{$idColumna}}">
				<input class="checkColumna" id="checkColumna_{{$idColumna}}" type="checkbox" @if(in_array($idColumna,$visibles)) checked @endif />
				<label for="checkColumna_{{$idColumna}}">{{$columna}}</label>
			</div>
		@endforeach
	</div>
</div>
<script>
$('.itemColumna').click(function(e){
	var idColumna = $(this).data('id-columna');
	if ($('#checkColumna_'+idColumna).is(":checked")){
		visibilidadColumna(idColumna,1);
	}else{
		visibilidadColumna(idColumna,0);
	}
	e.stopPropagation();
});
</script>
