@foreach($listado as $item)
	<tr>
		<td>{{$item->CliCodigo}}</td>
		<td>{{$item->CliNombre}}</td>
		<td>{{$item->CliCif}}</td>
	</tr>
@endforeach