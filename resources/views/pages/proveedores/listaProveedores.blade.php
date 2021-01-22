<div class="d-none" id="listado_0" data-listado-cant="{{count($listado)}}"></div>
@foreach($listado as $item)
	@php
		$direccionCompleta = $item->ProvDireccion;
		if($direccionCompleta){
			if($item->ProvTipoVia){
				$direccionCompleta = '<span>'.$item->ProvTipoVia.'/</span> '.$direccionCompleta;
			}
			if($item->ProvDireccionNumero){
				$direccionCompleta .= ', '.$item->ProvDireccionNumero;
			}
			if($item->ProvDireccionPiso){
				$direccionCompleta .= ' - <span>'.trans('texto.domicilio_fiscal.domicilio.piso').'</span> '.$item->ProvDireccionPiso;
			}
			if($item->ProvDireccionPuerta){
				$direccionCompleta .= ' - <span>'.trans('texto.domicilio_fiscal.domicilio.puerta').'</span> '.$item->ProvDireccionPuerta;
			}
		}
	@endphp
	<tr class="trClicable fila" id="{{$item->ProvCodigo}}" onclick="abrirLinea('{{$item->ProvCodigo}}','{{$rutaAbrir}}')">
		<td class="tdBtnAcciones chkList checkProveedores" id="checkProveedores_{{$item->ProvCodigo}}" onclick="clickChkList(this)" title="@lang('texto.seleccionar')">
			<div class="cuadroCheck"></div>
			<input type="checkbox" name="checkProveedor[]" class="checkProveedor d-none" value="{{$item->ProvCodigo}}" />
		</td>
		<td>{{$item->ProvCodigo}}</td>
		<td>{{$item->ProvNombre}}</td>
		<td>{{$item->ProvCif}}</td>
		<td>{{$item->ProvTelefono}}</td>
		<td class="tdLink">{{$item->ProvEMail}}</td>
		<td>{!!$direccionCompleta!!}</td>
		<td>{{$item->ProvCodPostal}}</td>
		<td>{{$item->ProvLocalidad}}</td>
		<td>{{$item->ProvProvincia}}</td>
	</tr>
@endforeach
