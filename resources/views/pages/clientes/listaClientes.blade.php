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
			<input type="checkbox" class="d-none" value="{{$item->CliCodigo}}" />
		</td>
		<td class="d-none">{{$item->CliCodigo}}</td>
		<td class="d-none">{{$item->CliNombre}}</td>
		<td class="d-none">{{$item->CliCif}}</td>
		<td class="d-none">{{$item->Telefono}}</td>
		<td class="tdLink d-none">{{$item->CliEMail}}</td>
		<td class="d-none">{!!$direccionCompleta!!}</td>
		<td class="d-none">{{$item->CliCodPostal}}</td>
		<td class="d-none">{{$item->CliCodPostalLocali}}</td>
		<td class="d-none">{{$item->CliCodPostalProvin}}</td>
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
