<div class="contenedorEmergenteAjustes ocultaEmergenteAjustes" id="contenedorEmergenteAjustes">
	<div class="cabeceraEmergenteAjustes">
		
		<div class="botonUsuario">
			<div class="circuloUsuario">
				<i class="fas fa-user-circle iconoUsuario"></i>
			</div>
			<div class="nombreUsuario">
				Nombre Empresa
			</div>
			<i class="fas fa-cog btn-pq" title="@lang('texto.configuracion')"></i>
			<i class="fas fa-plus-circle btn-pq ml-1" title="@lang('texto.nueva') @lang('texto.empresa')"></i>
		</div>
		
	</div>
	<div class="intEmergenteAjustes" id="intEmergenteAjustes">
		<div class="bloqueEmAjuste blh-55 blBgColor">
			<div class="cabeceraEmAjuste">
				@lang('texto.empresas')
				<div class="botonesCabeceraEmAjuste">
					<i class="fas fa-sort-alpha-down btn-pq" title="@lang('texto.orden')"></i>
					<i class="fas fa-sort-numeric-down btn-pq ml-1" title="@lang('texto.orden')"></i>
				</div>
			</div>
			<div class="buscadorCabecera">
				<input type="text" class="form-control form-control-sm" placeholder="Buscar..." />
			</div>
			<div class="contenidoEmAjuste alturaContEmAjusteConBuscador">
				<ul>
					@php $emps = array(1,2,3,4,5,6,7,8,9,10) @endphp
					@foreach($emps as $emp)
						<li class="radList checkEmpresa" id="checkEmpresa_{{$emp}}">
							<b>{{$emp}}</b> - Empresa de prueba {{$emp}}
							<input type="radio" class="d-none" name="empresa" value="{{$emp}}" />
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="bloqueEmAjuste blh-45 blBgColor">
			<div class="cabeceraEmAjuste">
				@lang('texto.empresas_recientes')
				<div class="botonesCabeceraEmAjuste">
					<i class="fas fa-trash-alt btn-pq" title="@lang('texto.borrar') @lang('texto.recientes')"></i>
				</div>
			</div>
			<div class="contenidoEmAjuste">
				<ul>
					@php $emps = array(1,2,3,4,5,6,7,8,9,10) @endphp
					@foreach($emps as $emp)
						<li class="radList checkEmpresaPrueba" id="checkEmpresaPrueba_{{$emp}}">
							<b>{{$emp}}</b> - Empresa de prueba {{$emp}}
							<input type="radio" class="d-none" name="empresaPrueba" value="{{$emp}}" />
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="bloqueEmAjuste blh-fijo blBgColor">
			<div class="cabeceraEmAjuste">Ejercicios</div>
			<div class="contenidoEmAjuste">
				<ul class="text-center listaCuadrados">
					@for($anyo = (date('Y')+5); $anyo > (date('Y')-16); $anyo--)
						<li class="radList checkEjercicio @if($anyo == '2020') radSel @endif" id="checkEjercicio_{{$anyo}}">
							{{$anyo}}
							<input type="radio" class="d-none" name="ejercicio" value="{{$anyo}}" />
						</li>
					@endfor
				</ul>
			</div>
		</div>
	</div>
	<div class="pieEmergenteAjustes">
		<i class="fas fa-chevron-circle-left btn-md principal mr-auto mt-1" onclick="bloqueOpcionesPie()"></i>
		<div class="bntCargaAjustes btn-link-sc blanco bgPrincipal mt-1">
			@lang('texto.aplicar')
		</div>
	</div>
</div>
<script>
$('.radList').click(function(){
	var valor = $('#'+this.id+' input').val();
	var prefijo = this.id.split('_',1)[0];
	$('.'+prefijo).removeClass('radSel');
	$(this).addClass('radSel');
});
</script>
