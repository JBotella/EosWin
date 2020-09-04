<div class="mLE_ListaMin">
@foreach($listado as $item)
	<div class="mLE_ListaMinLinea" id="mLE_ListaMinLinea_{{$item->ZCOD}}" onclick="">
		<div class="mLE_ListaMinColumna c1">{{$item->ZCOD}}</div>
		<div class="mLE_ListaMinColumna c2">{{$item->ZDEL}}</div>
		<div class="mLE_ListaMinColumna c2">{{$item->ZADM}}</div>
	</div>
@endforeach
</div>
<script>
iniciaBuscador();
</script>
