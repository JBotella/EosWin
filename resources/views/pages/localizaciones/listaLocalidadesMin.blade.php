<div class="mLE_ListaMin">
@foreach($listado as $item)
	<div class="mLE_ListaMinLinea" id="mLE_ListaMinLinea_{{$item->CODIGO}}" onclick="copiaDatosLocalidad(this)">
		<div class="mLE_ListaMinColumna c1" data-val="{{$item->CODIGO}}">{{$item->CODIGO}}</div>
		<div class="mLE_ListaMinColumna c2" data-val="{{$item->MUNICIPIO}}">{{$item->MUNICIPIO}}</div>
		<div class="mLE_ListaMinColumna c3 azulAnalogo" data-val="{{$item->Descripcion}}">{{$item->Descripcion}}</div>
	</div>
@endforeach
</div>
<script>
	iniciaBuscadorExtra();
	function copiaDatosLocalidad(obj){
		var cp = $(obj).find(".c1").data('val');
		var localidad = $(obj).find(".c2").data('val');
		var provincia = $(obj).find(".c3").data('val');
		var datosLocalidad = {cp:cp, localidad:localidad, provincia:provincia};
		cargaDatosLocalidad(datosLocalidad);
	}
</script>
