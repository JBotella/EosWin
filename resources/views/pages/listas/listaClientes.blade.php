@foreach($listado as $item)
	<tr class="trClicable">
		<th scope="row">{{$item->CliCodigo}}</th>
		<td>{{$item->CliNombre}}</td>
		<td>{{$item->CliCif}}</td>
		<td>{{$item->Telefono}}</td>
		<td>{{$item->CliEMail}}</td>
		<td class="tdBtnAcciones">
			<i class="fas fa-edit tdBtnAccion btnEditar" title="@lang('texto.editar')"></i>
			<i class="fas fa-trash tdBtnAccion btnBorrar" title="@lang('texto.borrar')"></i>
		</td>
	</tr>
@endforeach
