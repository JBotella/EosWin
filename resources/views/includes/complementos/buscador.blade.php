<div class="input-group md-form form-sm form-2 pl-0 mt-1">
	<div class="input-group-append">
		<span class="input-group-text botonLimpiarBusqueda" id="" onclick="">
			<i class="fas fa-times"></i>
		</span>
	</div>
	<input class="form-control" type="text" placeholder="Buscar..." id="busqueda">
	<div class="input-group-append d-none">
		<span class="input-group-text botonBuscar" id="" onclick="buscarLista()">
			<i class="fas fa-search"></i>
		</span>
	</div>
</div>
<div class="input-group md-form form-sm form-2 pl-0 pt-1 rojoOpuesto" id="alertaBusqueda"></div>
<script>
	$('.botonLimpiarBusqueda').click(function(){
		$("#busqueda").val('');
		$("#busqueda").keyup();
	});
</script>
