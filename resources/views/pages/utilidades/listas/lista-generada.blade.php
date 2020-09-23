<div class="d-none" id="listado_0" data-listado-cant="{{count($listado)}}"></div>
@php
	$ident = $parametros->ident;
@endphp
@foreach($listado as $item)
	<tr class="trClicable fila" id="{{$item->$ident}}" onclick="abreForm('{{route("utilidadFormAsinc",[$id,$item->$ident])}}')">
		<td class="tdBtnAcciones chkList checkUtilidades" id="checkUtilidades_{{$item->$ident}}" onclick="clickChkList(this)" title="@lang('texto.seleccionar')">
			<div class="cuadroCheck"></div>
			<input type="checkbox" name="checkUtilidad[]" class="checkUtilidad d-none" value="{{$item->$ident}}" />
		</td>
		@foreach($parametros->columnas as $nombre => $columna)
			<td>{{$item->$columna}}</td>
		@endforeach
	</tr>
@endforeach
