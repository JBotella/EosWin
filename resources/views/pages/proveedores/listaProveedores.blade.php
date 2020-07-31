@foreach($listado as $item)
	<tr class="trClicable fila" id="{{$item->ProvCodigo}}" onclick="abrirLinea('{{$item->ProvCodigo}}','{{$rutaAbrir}}')">
		<td>{{$item->ProvCodigo}}</td>
		<td>{{$item->ProvNombre}}</td>
		<td>{{$item->ProvCif}}</td>
		<td>{{$item->ProvTelefono}}</td>
		<td>{{$item->ProvEMail}}</td>
		<td class="tdBtnAcciones">
			<i class="fas fa-trash tdBtnAccion btnBorrar btnAccion" title="@lang('texto.borrar')"></i>
		</td>
	</tr>
@endforeach
