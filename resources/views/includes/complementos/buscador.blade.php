<div class="input-group md-form form-sm form-2 pl-0 mt-1">
	<div class="input-group-append">
		<span class="input-group-text botonLimpiarBusqueda" onclick="limpiarBusqueda('{{$nLista}}')">
			<i class="fas fa-times"></i>
		</span>
	</div>
	<input class="form-control" type="text" placeholder="Buscar..." id="busqueda_{{$nLista}}">
	<div class="input-group-append">
		<span class="input-group-text botonBuscar" id="" onclick="buscarLista('{{$nLista}}')">
			<i class="fas fa-search"></i>
		</span>
	</div>
</div>
<div class="input-group md-form form-sm form-2 pl-0 pt-1 alertaBusqueda" id="alertaBusqueda_{{$nLista}}" data-min-busqueda="@lang('texto.min_busqueda',['num' => 3])"></div>
<script>
	function limpiarBusqueda(nLista){
		$("#busqueda_"+nLista).val('');
		listar(nLista);
		$('#alertaBusqueda_'+nLista).empty();
	}
</script>
