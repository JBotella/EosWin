<div class="d-none" id="listado_0" data-listado-cant="{{count($listado)}}"></div>
@foreach($listado as $item)
	<tr class="trClicable fila" id="{{$item}}" onclick="abrirLinea('{{$item}}','{{$rutaAbrir}}')">
		<td class="tdBtnAcciones chkList checkApuntesPeriodicos" id="checkApuntesPeriodicos_{{$item}}" onclick="clickChkList(this)" title="@lang('texto.seleccionar')">
			<div class="cuadroCheck"></div>
			<input type="checkbox" name="checkApuntePeriodico[]" class="checkApuntePeriodico d-none" value="{{$item}}" />
		</td>
		<td class="columnaConSwitch">
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" id="customSwitches_{{$item}}" checked>
				<label class="custom-control-label" for="customSwitches_{{$item}}"></label>
			</div>
		</td>
		<td>Descripción del apunte periódico...</td>
		<td>Cuenta de Ejemplo</td>
		<td class="text-center">Gasto</td>
		<td class="columnaConFecha">14/09/2020</td>
		<td class="columnaConFecha">01/10/2020</td>
	</tr>
@endforeach
