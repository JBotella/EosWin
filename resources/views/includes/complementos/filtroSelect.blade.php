@php
	if(isset($parametros->filtroSelect[$idItemFiltroSelect]['selected'])){
		$selected = $parametros->filtroSelect[$idItemFiltroSelect]['selected'];
	}else{
		$selected = '';
	}
@endphp
<div class="selectorAcciones mr-2">
	<select class="form-control" id="fSelect_{{$nombreSelect}}" name="fSelect_{{$nombreSelect}}" onchange="cambiaFiltroSelect(this)" >
		<option @if($selected == 'todos') value="" selected @else disabled @endif>{{$tituloSelect}}</option>
		@foreach($filtroSelect[$idItemFiltroSelect] as $idItemSelect => $itemSelect)
			@if(isset($idFiltroSelect['constante']))
				<option value="{{$idItemSelect}}">{{$itemSelect}}</option>
			@else
				<option value="{{$itemSelect->id}}">{{$itemSelect->nombre}}</option>
			@endif
		@endforeach
	</select>
</div>
