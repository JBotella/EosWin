<div class="dropdown selectorAcciones ml-2">
	<div class="dropdown-toggle" id="filtroSelector" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-list-ul mr-1"></i>Periodo</div>
	<div class="dropdown-menu dropdown-menu-left listaSelectorAcciones" aria-labelledby="filtroSelector">
		@foreach($filtroSelector as $itemFiltro)
			<div class="dropdown-item itemFiltroSelector">
				{{$itemFiltro->id}} - {{$itemFiltro->nombre}}
			</div>
		@endforeach
	</div>
</div>
<script>
$('.itemFiltroSelector').click(function(){
	event.stopImmediatePropagation();
});
</script>
