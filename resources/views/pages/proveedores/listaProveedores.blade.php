<div class="d-none" id="listado_0" data-listado-cant="{{count($listado)}}"></div>
@foreach($listado as $item)
	<tr class="trClicable fila" id="{{$item->ProvCodigo}}" onclick="abrirLinea('{{$item->ProvCodigo}}','{{$rutaAbrir}}')">
		<td class="tdBtnAcciones chkList checkProveedores" id="checkProveedores_{{$item->ProvCodigo}}" onclick="clickChkList(this)" title="@lang('texto.seleccionar')">
			<div class="cuadroCheck"></div>
			<input type="checkbox" class="d-none" value="{{$item->ProvCodigo}}" />
		</td>
		<td>{{$item->ProvCodigo}}</td>
		<td>{{$item->ProvNombre}}</td>
		<td>{{$item->ProvCif}}</td>
		<td>{{$item->ProvTelefono}}</td>
		<td class="tdLink">{{$item->ProvEMail}}</td>
	</tr>
@endforeach
