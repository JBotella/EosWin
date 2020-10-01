<div class="selectorAcciones mr-2">
	<select class="form-control" id="fSelect_{{$nombreSelect}}" name="fSelect_{{$nombreSelect}}" onchange="cambiaFiltroSelect(this)" >
		<option value="" disabled>{{$nombreSelect}}</option>
		@foreach($filtroSelect[$idItemFiltroSelect] as $idItemSelect => $itemSelect)
			@if(isset($idFiltroSelect['constante']))
				<option value="{{$idItemSelect}}">{{$itemSelect}}</option>
			@else
				<option value="{{$itemSelect->id}}">{{$itemSelect->nombre}}</option>
			@endif
		@endforeach
	</select>
</div>
