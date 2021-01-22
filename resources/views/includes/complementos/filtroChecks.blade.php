<div class="dropdown selectorAcciones ml-2">
	<div class="dropdown-toggle" id="filtroChecks" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-list-ul mr-1"></i>{{$parametros->filtroChecks['titulo']}}</div>
	<div class="dropdown-menu dropdown-menu-left listaSelectorAcciones" aria-labelledby="filtroChecks">
		@foreach($filtroChecks as $itemFiltro)
			{{-- chkSel --}}
			<div class="dropdown-item item{{$nombreChecks}} chkList checkFiltroChecks" id="checkFiltroChecks_{{$itemFiltro->id}}">
				<div class="cuadroCheck"></div>
				<b>{{$itemFiltro->id}}</b> - {{$itemFiltro->nombre}}
				<input type="checkbox" class="d-none" name="filtro{{$nombreChecks}}" value="{{$itemFiltro->id}}" />
			</div>
		@endforeach
	</div>
	<input class="valores{{$nombreChecks}} d-none" type="text" id="valores{{$nombreChecks}}" name="valores{{$nombreChecks}}" value="">
</div>
<script>
var prefijoChecks = '{{$nombreChecks}}';
$(document).ready(function(){
	$('.item'+prefijoChecks).click(function(){
		var filtros = document.getElementsByName('filtro'+prefijoChecks);
		var valFiltros = "";
		for (var i=0, n=filtros.length;i<n;i++){
			if(filtros[i].checked){
				valFiltros += ","+filtros[i].value;
			}
		}
		if(valFiltros){ valFiltros = valFiltros.substring(1); }
		$('.valores'+prefijoChecks).val(valFiltros);
		event.stopImmediatePropagation();
		recargarListar(0);
	});
});
</script>
