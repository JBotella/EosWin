<div class="contenedorEmergenteAjustes ocultaEmergenteAjustes" id="contenedorEmergenteAjustes">
	<div class="cabeceraEmergenteAjustes">
		<div class="botonUsuario">
			<div class="circuloUsuario">
				<i class="fas fa-user-circle iconoUsuario"></i>
			</div>
			<div class="nombreUsuario">
				{{Session::get('datosEmpresa')->MENOMBRE}}
			</div>
			<a class="h-auto" href="{!!route('configuracionEmpresa')!!}">
				<i class="fas fa-cog btn-pq" title="@lang('configuraciones.configuracion_empresa.titulo_configuracion')"></i>
			</a>
			<a class="h-auto" href="{!!route('nuevaEmpresa')!!}">
				<i class="fas fa-plus-circle btn-pq ml-1" title="@lang('configuraciones.configuracion_empresa.titulo_nueva')"></i>
			</a>
		</div>
	</div>
	<div class="intEmergenteAjustes" id="intEmergenteAjustes">
		<div class="bloqueEmAjuste blh-55 blBgColor">
			<div class="cabeceraEmAjuste">
				@lang('texto.empresas')
				<div class="botonesCabeceraEmAjuste">
					<i class="fas fa-sort-alpha-down btn-pq ordenEmpresas" title="@lang('texto.orden')" onclick="ordenaUlLi('.ajustesListaEmpresas',this,'alpha')"></i>
					<i class="fas fa-sort-numeric-down btn-pq ml-1 ordenEmpresas" title="@lang('texto.orden')" onclick="ordenaUlLi('.ajustesListaEmpresas',this,'numeric')"></i>
				</div>
			</div>
			<div class="buscadorCabecera">
				<input type="text" class="form-control form-control-sm" id="buscadorAjustesEmpresas" placeholder="@lang('texto.buscar')..." />
			</div>
			<div class="contenidoEmAjuste alturaContEmAjusteConBuscador">
				<ul class="ajustesListaEmpresas">
					@php
						$empsTest = array(1=>'b',2=>'f',3=>'h',4=>'g',5=>'d',6=>'e',7=>'d',8=>'c');
						$emps = Session::get("listadoEmpresas");
					@endphp
					@foreach($emps as $emp)
						<li class="radList checkEmpresa" id="checkEmpresa_{{$emp->EMPRESA}}" data-numeric="{{$emp->EMPRESA}}" data-alpha="{{(mb_strtolower($emp->MENOMBRE))}}">
							<b>{{$emp->EMPRESA}}</b> - <span>{{$emp->MENOMBRE}}</span>
							<input type="radio" class="d-none" name="empresa" value="{{$emp->EMPRESA}}" />
						</li>
					@endforeach
					{{-- Más ejemplos --}}
					@foreach($empsTest as $emp => $name)
						<li class="radList checkEmpresa" id="checkEmpresa_{{$emp}}" data-numeric="{{$emp}}" data-alpha="{{$name}}">
							<b>{{$emp}}</b> - <span>{{$name}}</span>
							<input type="radio" class="d-none" name="empresa" value="{{$emp}}" />
						</li>
					@endforeach
					{{-- ... --}}
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
				<ul class="ajustesListaEmpresasRecientes">
					@php $emps = array(1,2,3,4,5,6,7,8,9) @endphp
					@foreach($emps as $emp)
						<li class="radList checkEmpresaReciente" id="checkEmpresaReciente_{{$emp}}">
							<b>0000{{$emp}}</b> - <span>Empresa de prueba 0000{{$emp}}</span>
							<input type="radio" class="d-none" name="empresaReciente" value="{{$emp}}" />
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="bloqueEmAjuste blh-fijo blBgColor">
			<div class="cabeceraEmAjuste">@lang('texto.ejercicios')</div>
			<div class="contenidoEmAjuste">
				<ul class="text-center listaCuadrados">
					@for($anyo = (date('Y')+5); $anyo > (date('Y')-16); $anyo--)
						<li class="radList checkEjercicio @if($anyo == Session::get('ultimoEjercicio')) radSel @endif" id="checkEjercicio_{{$anyo}}">
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
		<button class="btn btn-form mt-1 btn-form">
			@lang('texto.aplicar')
		</button>
	</div>
</div>
<script>
$("#buscadorAjustesEmpresas").on("keyup", function () {
	var busqueda = $("#buscadorAjustesEmpresas").val().trim();
	resaltaBusqueda(busqueda,'.ajustesListaEmpresas','.checkEmpresa');
});
</script>
