<div class="input-group md-form form-sm form-2 pl-0 mt-1">
	<div class="input-group-append">
		<span class="input-group-text botonLimpiarBusqueda"  title="@lang('texto.limpiar_busqueda')" onclick="limpiarBusqueda('{{$nLista}}')">
			<i class="fas fa-times"></i>
		</span>
	</div>
	<input class="form-control" type="text" placeholder="@lang('texto.buscar')..." id="busqueda_{{$nLista}}">
	<div class="input-group-append">
		<span class="input-group-text botonBuscar" id="" title="@lang('texto.buscar')" onclick="buscarLista('{{$nLista}}')">
			<i class="fas fa-search"></i>
		</span>
	</div>
</div>
<div class="input-group md-form form-sm form-2 pl-0 pt-1 alertaBusqueda" id="alertaBusqueda_{{$nLista}}" data-min-busqueda="@lang('texto.min_busqueda',['num' => 3])"></div>
<script>
var nLista = '{{$nLista}}'
$('#busqueda_'+nLista).keypress(function(event){
	if(event.keyCode == 13){ // Tecla Enter
		buscarLista(nLista);
	}
});
$('#busqueda_'+nLista).keyup(function(event) {  
	if(event.keyCode== 27) { // Tecla Esc
		limpiarBusqueda(nLista);
	} 
});
</script>
