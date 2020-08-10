<div class="d-none" id="listado_0" data-listado-cant="{{count($listado)}}"></div>
@foreach($listado as $item)
	<tr class="trClicable fila" id="{{$item->CliCodigo}}" onclick="abrirLinea('{{$item->CliCodigo}}','{{$rutaAbrir}}')">
		<td class="tdBtnAcciones chkList checkClientes" id="checkClientes_{{$item->CliCodigo}}" onclick="clickChkList(this)" title="@lang('texto.seleccionar')">
			<div class="cuadroCheck"></div>
			<input type="checkbox" class="d-none" value="{{$item->CliCodigo}}" />
		</td>
		<td>{{$item->CliCodigo}}</td>
		<td>{{$item->CliNombre}}</td>
		<td>{{$item->CliCif}}</td>
		<td>{{$item->Telefono}}</td>
		<td class="tdLink">{{$item->CliEMail}}</td>
		{{--<td class="tdBtnAcciones">
			<i class="fas fa-trash tdBtnAccion btnBorrar btnAccion tdBorrar" id="tdBorrar_{{$item->CliCodigo}}" onclick="preguntaBorrarLinea('{{$item->CliCodigo}}')" title="@lang('texto.borrar')"></i>
			<div class="tdConfirmaAccion d-none" id="tdConfirmarBorrar_{{$item->CliCodigo}}">
				<div class="tdConfirmaAccionPregunta"><b>@lang('texto.borrar')</b></div>
				<i class="fas fa-trash tdBtnAccion btnBorrar btnAccion mr-1" title="@lang('texto.borrar')"></i>
				<i class="fas fa-times-circle tdBtnAccion btnCancelar btnAccion" onclick="preguntaBorrarLinea('{{$item->CliCodigo}}')"></i>
			</div>
		</td>--}}
	</tr>
@endforeach
