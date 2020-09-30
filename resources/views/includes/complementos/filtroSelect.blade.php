<div class="selectorAcciones ml-2 w-auto">
	<select class="form-control" id="fSelect_{{$nombreSelect}}" name="fSelect_{{$nombreSelect}}" onchange="cambiaFiltroSelect(this)">
		<option value="" disabled>{{$nombreSelect}}</option>
		@foreach($filtroSelect as $itemSelect)
			<option value="{{$itemSelect->id}}">{{$itemSelect->nombre}}</option>
		@endforeach
	</select>
</div>
<script>
function cambiaFiltroSelect(obj){
	var val = $('#fSelect_'+obj.id).val();
	event.stopImmediatePropagation();
	recargarListar(0);
}
</script>
