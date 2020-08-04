@php
	$resultado = $ingresos - $gastos;
	$maxH = max($ingresos,$gastos,$resultado);
	$minH = min($ingresos,$gastos,$resultado);
	$percIngresos = 100 / $maxH * $ingresos;
	$percGastos = 100 / $maxH * $gastos;
	$percResultado = 100 / $maxH * $resultado;
	$marginNegativo = 0;
	if(0 > $percResultado){
		$marginNegativo = abs($percResultado);
		$percIngresos = $percIngresos - $marginNegativo;
		$percGastos = $percGastos - $marginNegativo;
	}
@endphp
<div class="tarjeta estilo-tarjeta estilo-tarjeta-trimestre">
	<div class="tarjeta-body body-trimestre">
		<div class="row no-gutters align-items-center h-100">
			<div class="col-logo num-trimestre" title="@lang('texto.dashboard.trimestre') {{$trimestre}}">
				<span>@lang('texto.dashboard.abrevia_trimestre'){{$trimestre}}</span>
				<span class="ejericio-trimestre">{{$ejercicio}}</span>
			</div>
			<div class="resumen-trimestre">
			
				<div class="linea-trimestre">
					<div class="barra-trimestre progress">
						<div class="progress-bar bgAzulAnalogo" role="progressbar" style="width:{{$percIngresos}}%; margin-left:{{$marginNegativo}}%;" aria-valuenow="{{$ingresos}}" aria-valuemin="{{$minH}}" aria-valuemax="{{$maxH}}">
							<span>
								{{@number_format($ingresos,2,',','.')}}
							</span>
						</div>
					</div>
					<div class="indice-barra-trimestre azulAnalogo">
						@lang('texto.dashboard.ingresos')
					</div>
				</div>
				
				<div class="linea-trimestre">
					<div class="barra-trimestre progress">
						<div class="progress-bar bgRojoOpuesto" role="progressbar" style="width:{{$percGastos}}%; margin-left:{{$marginNegativo}}%;" aria-valuenow="{{$gastos}}" aria-valuemin="{{$minH}}" aria-valuemax="{{$maxH}}">
							<span>
								{{@number_format($gastos,2,',','.')}}
							</span>
						</div>
					</div>
					<div class="indice-barra-trimestre rojoOpuesto">
						@lang('texto.dashboard.gastos')
					</div>
				</div>
				
				<div class="linea-trimestre">
					<div class="barra-trimestre progress">
						<div class="progress-bar bgPrincipal" role="progressbar" style="width:{{abs($percResultado)}}%;" aria-valuenow="{{$resultado}}" aria-valuemin="{{$minH}}" aria-valuemax="{{$maxH}}">
							<span>
								{{@number_format($resultado,2,',','.')}}
							</span>
						</div>
					</div>
					<div class="indice-barra-trimestre principal">
						@lang('texto.dashboard.resultado')
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
</div>
