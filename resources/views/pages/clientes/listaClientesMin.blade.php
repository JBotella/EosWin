<div class="mLE_ListaMin">
@foreach($listado as $item)
	<div class="mLE_ListaMinLinea" id="mLE_ListaMinLinea_{{$item->CliCodigo}}" onclick="abrirLinea('{{$item->CliCodigo}}','{{$rutaAbrir}}')">
		<div class="mLE_ListaMinColumna c1">{{$item->CliCodigo}}</div>
		<div class="mLE_ListaMinColumna c2">{{$item->CliNombre}}</div>
	</div>
@endforeach
</div>

<script>
var rutaBuscadorExtraBar = '{{ route("buscadorExtraBar") }}';
$(".menuLateral_extraCabInt").load(rutaBuscadorExtraBar,function(){
	$("#buscadorExtraBar").on("keyup", function () {
		var busqueda = $("#buscadorExtraBar").val();
		resaltaBusqueda(busqueda,'.mLE_ListaMin','.mLE_ListaMinLinea');
	});
});
</script>
