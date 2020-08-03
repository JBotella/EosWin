@php
	$resultado = $ingresos - $gastos;
	$maxH = max($ingresos,$gastos,$resultado);
	$minH = min($ingresos,$gastos,$resultado);
	$percIngresos = 100 / $maxH * $ingresos;
	$percGastos = 100 / $maxH * $gastos;
	$percResultado = 100 / $maxH * $resultado;
	
@endphp
<div class="tarjeta estilo-tarjeta estilo-tarjeta-trimestre">
	<div class="tarjeta-body body-trimestre">
		<div class="row no-gutters align-items-center h-100">
			<div class="col-logo num-trimestre">
				<span>Tr.{{$trimestre}}</span>
				<span class="ejericio-trimestre">{{$ejercicio}}</span>
			</div>
			<div class="resumen-trimestre">
			
				<div class="linea-trimestre">
					<div class="barra-trimestre progress">
						<div class="progress-bar bgPrincipal" role="progressbar" style="width:{{$percIngresos}}%;" aria-valuenow="{{$ingresos}}" aria-valuemin="{{$minH}}" aria-valuemax="{{$maxH}}">{{$ingresos}}</div>
					</div>
					<div class="indice-barra-trimestre principal">
						Ingresos
					</div>
				</div>
				
				<div class="linea-trimestre">
					<div class="barra-trimestre progress">
						<div class="progress-bar bgAzulAnalogo" role="progressbar" style="width:{{$percGastos}}%;" aria-valuenow="{{$gastos}}" aria-valuemin="{{$minH}}" aria-valuemax="{{$maxH}}">{{$gastos}}</div>
					</div>
					<div class="indice-barra-trimestre azulAnalogo">
						Gastos
					</div>
				</div>
				
				<div class="linea-trimestre">
					<div class="barra-trimestre progress">
						<div class="progress-bar bgMoradoAnalogo" role="progressbar" style="width:{{$percResultado}}%;" aria-valuenow="{{$resultado}}" aria-valuemin="{{$minH}}" aria-valuemax="{{$maxH}}">{{$resultado}}</div>
					</div>
					<div class="indice-barra-trimestre moradoAnalogo">
						Resultado
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
</div>
