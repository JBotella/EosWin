@php
$tipo = $parametros->filtroFecha['tipo'];
@endphp
<div class="bloqueSelectorAcciones">
	<div class="selectorAcciones mr-2 @if(!strpos($tipo, 'desde')) d-none @endif">
		<input type="date" class="form-control itemFiltroFecha" id="fFecha_Desde" name="fFecha_Desde" placeholder="Desde" />
	</div>
	<div class="selectorAcciones mr-2 @if(!strpos($tipo, 'hasta')) d-none @endif">
		<input type="date" class="form-control itemFiltroFecha" id="fFecha_Hasta" name="fFecha_Hasta" placeholder="Hasta" />
	</div>
</div>
<script>
$(document).ready(function(){
	$('.itemFiltroFecha').change(function(){
		var id = $(this).prop('id');
		var val = $(this).val();
		event.stopImmediatePropagation();
		recargarListar(0);
	});
});
</script>
