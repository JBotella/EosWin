<div class="d-none" id="listado_0" data-listado-cant="{{count($listado)}}"></div>
@foreach($listado as $item)
	@php
		$direccionCompleta = $item->CliDireccion;
		if($direccionCompleta){
			if($item->CliTipoVia){
				$direccionCompleta = '<span>'.$item->CliTipoVia.'/</span> '.$direccionCompleta;
			}
			if($item->CliDireccionNumero){
				$direccionCompleta .= ', '.$item->CliDireccionNumero;
			}
			if($item->CliDireccionPiso){
				$direccionCompleta .= ' - <span>'.trans('texto.domicilio_fiscal.domicilio.piso').'</span> '.$item->CliDireccionPiso;
			}
			if($item->CliDireccionPuerta){
				$direccionCompleta .= ' - <span>'.trans('texto.domicilio_fiscal.domicilio.puerta').'</span> '.$item->CliDireccionPuerta;
			}
		}
	@endphp
	<tr class="trClicable fila" id="{{$item->CliCodigo}}" onclick="abrirLinea('{{$item->CliCodigo}}','{{$rutaAbrir}}')">
		<td class="tdBtnAcciones chkList checkClientes" id="checkClientes_{{$item->CliCodigo}}" onclick="clickChkList(this)" title="@lang('texto.seleccionar')">
			<div class="cuadroCheck"></div>
			<input type="checkbox" class="checkCliente d-none" value="{{$item->CliCodigo}}" />
		</td>
		<td>{{$item->CliCodigo}}</td>
		<td>{{$item->CliNombre}}</td>
		<td>{{$item->CliCif}}</td>
		<td>{{$item->Telefono}}</td>
		<td class="tdLink ">{{$item->CliEMail}}</td>
		<td>{!!$direccionCompleta!!}</td>
		<td>{{$item->CliCodPostal}}</td>
		<td>{{$item->CliCodPostalLocali}}</td>
		<td>{{$item->CliCodPostalProvin}}</td>
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
