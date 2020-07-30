<div class="mLE_ListaMin">
@foreach($listado as $item)
	<div class="mLE_ListaMinLinea" onclick="abrirLinea('{{$item->CliCodigo}}','{{$rutaAbrir}}')">
		<div class="mLE_ListaMinColumna c1"><b>{{$item->CliCodigo}}</b></div>
		<div class="mLE_ListaMinColumna c2">{{$item->CliNombre}}</div>
	</div>
@endforeach
</div>
