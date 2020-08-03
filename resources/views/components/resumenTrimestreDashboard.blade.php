<div class="tarjeta estilo-tarjeta estilo-tarjeta-trimestre">
	<div class="tarjeta-body body-trimestre">
		<div class="row no-gutters align-items-center h-100">
			<div class="col-logo num-trimestre">Tr.{{$trimestre}}</div>
			<div class="resumen-trimestre">
			
				<div class="linea-trimestre">
					<div class="barra-trimestre progress">
						<div class="progress-bar bgPrincipal" role="progressbar" style="width:{{$ingresos}}%;" aria-valuenow="{{$ingresos}}" aria-valuemin="0" aria-valuemax="100">{{$ingresos}}%</div>
					</div>
					<div class="indice-barra-trimestre principal">
						Ingresos
					</div>
				</div>
				
				<div class="linea-trimestre">
					<div class="barra-trimestre progress">
						<div class="progress-bar bgAzulAnalogo" role="progressbar" style="width:{{$gastos}}%;" aria-valuenow="{{$gastos}}" aria-valuemin="0" aria-valuemax="100">{{$gastos}}%</div>
					</div>
					<div class="indice-barra-trimestre azulAnalogo">
						Gastos
					</div>
				</div>
				
				<div class="linea-trimestre">
					<div class="barra-trimestre progress">
						<div class="progress-bar bgMoradoAnalogo" role="progressbar" style="width:{{$resultado}}%;" aria-valuenow="{{$resultado}}" aria-valuemin="0" aria-valuemax="100">{{$resultado}}%</div>
					</div>
					<div class="indice-barra-trimestre moradoAnalogo">
						Resultado
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
</div>
