<div class="mLE_ListaMin">
@foreach($listado as $item)
	<div class="mLE_ListaMinLinea" id="mLE_ListaMinLinea_{{$item->ZCOD}}" onclick="copiaDatosDelegacion(this)">
		<div class="mLE_ListaMinColumna c1" data-val="{{$item->ZCOD}}">{{$item->ZCOD}}</div>
		<div class="mLE_ListaMinColumna c2" data-val="{{$item->ZDEL}}">{{$item->ZDEL}}</div>
		<div class="mLE_ListaMinColumna c3 azulAnalogo" data-val="{{$item->ZADM}}">{{$item->ZADM}}</div>
	</div>
@endforeach
</div>
<script>
	iniciaBuscador();
	function copiaDatosDelegacion(obj){
		var cpAdministracion = $(obj).find(".c1").data('val');
		var delegacion = $(obj).find(".c2").data('val');
		var administracion = $(obj).find(".c3").data('val');
		var datosDelegacion = {cpAdministracion:cpAdministracion, delegacion:delegacion, administracion:administracion};
		cargaDatosDelegacion(datosDelegacion);
	}
</script>
