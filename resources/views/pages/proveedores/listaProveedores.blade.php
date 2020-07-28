@foreach($listado as $item)
	<tr class="trClicable" onclick="verLinea('{{$item->ProvCodigo}}','{{$rutaVer}}')">
		<th scope="row">{{$item->ProvCodigo}}</th>
		<td>{{$item->ProvNombre}}</td>
		<td>{{$item->ProvCif}}</td>
		<td>{{$item->ProvTelefono}}</td>
		<td>{{$item->ProvEMail}}</td>
		<td class="tdBtnAcciones">
			<i class="fas fa-edit tdBtnAccion btnEditar btnAccion" title="@lang('texto.editar')"></i>
			<i class="fas fa-trash tdBtnAccion btnBorrar btnAccion" title="@lang('texto.borrar')"></i>
		</td>
	</tr>
@endforeach
