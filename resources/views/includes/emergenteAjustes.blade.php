<div class="contenedorEmergenteAjustes ocultaEmergenteAjustes" id="contenedorEmergenteAjustes">
	<div class="cabeceraEmergenteAjustes">
	</div>
	<div class="intEmergenteAjustes" id="intEmergenteAjustes">
		<div class="bloqueEmAjuste blh-55 blBgColor">
			<div class="cabeceraEmAjuste">
				Empresas
				<div class="botonesCabeceraEmAjuste">
					<i class="fas fa-sort-alpha-down botonCabeceraEmAjuste"></i>
					<i class="fas fa-sort-numeric-down botonCabeceraEmAjuste"></i>
				</div>
			</div>
			<div class="buscadorCabecera">
				<input type="text" class="form-control form-control-sm" placeholder="Buscar..." />
			</div>
			<div class="contenidoEmAjuste alturaContEmAjusteConBucador">
				<ul>
					@php $emps = array(1,2,3,4,5,6,7,8,9,10) @endphp
					@foreach($emps as $emp)
						<li><b>{{$emp}}</b> - Empresa de prueba {{$emp}}</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="bloqueEmAjuste blh-45 blBgColor">
			<div class="cabeceraEmAjuste">
				Empresas recientes
				<div class="botonesCabeceraEmAjuste">
					<i class="fas fa-trash-alt botonCabeceraEmAjuste"></i>
				</div>
			</div>
			<div class="contenidoEmAjuste">
				<ul>
					@php $emps = array(1,2,3,4,5,6,7,8,9,10) @endphp
					@foreach($emps as $emp)
						<li><b>{{$emp}}</b> - Empresa de prueba {{$emp}}</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="bloqueEmAjuste blh-fijo blBgColor">
			<div class="cabeceraEmAjuste">Ejercicios</div>
			<div class="contenidoEmAjuste">
				<ul class="text-center listaCuadrados">
					@for($anyo = (date('Y')+5); $anyo > (date('Y')-16); $anyo--)
						<li>{{$anyo}}</li>
					@endfor
				</ul>
			</div>
		</div>
	</div>
	<div class="pieEmergenteAjustes">
	</div>
</div>
