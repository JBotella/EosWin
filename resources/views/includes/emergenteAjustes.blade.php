<div class="contenedorEmergenteAjustes ocultaEmergenteAjustes" id="contenedorEmergenteAjustes">
	<div class="cabeceraEmergenteAjustes">
		<div class="botonUsuario">
			<div class="circuloUsuario">
				<i class="fas fa-user-circle iconoUsuario"></i>
			</div>
			<div class="nombreUsuario">
				Microarea Next
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
					<i class="fas fa-sort-alpha-up btn-pq ordenEmpresas" title="@lang('texto.orden')" onclick="ordenaUlLi('.ajustesListaEmpresas',this,'alpha')"></i>
					<i class="fas fa-sort-numeric-up btn-pq ml-1 ordenEmpresas" title="@lang('texto.orden')" onclick="ordenaUlLi('.ajustesListaEmpresas',this,'numeric')"></i>
				</div>
			</div>
			<div class="buscadorCabecera">
				<input type="text" class="form-control form-control-sm" id="buscadorAjustesEmpresas" placeholder="Buscar..." />
			</div>
			<div class="contenidoEmAjuste alturaContEmAjusteConBuscador">
				<ul class="ajustesListaEmpresas">
					@php
						//$emps = array(1,2,3,4,5,6,7,8,9)
						$emps = Session::get("listadoEmpresas");
					@endphp
					@foreach($emps as $emp)
					<li class="radList checkEmpresa" id="checkEmpresa_{{$emp->EMPRESA}}" data-numeric="{{$emp->EMPRESA}}" data-alpha="{{$emp->MENOMBRE}}">
						<b>{{$emp->EMPRESA}}</b> - <span>{{$emp->MENOMBRE}}</span>
						<input type="radio" class="d-none" name="empresa" value="{{$emp->EMPRESA}}" />
					</li>
					@endforeach
					<li class="radList checkEmpresa" id="checkEmpresa_2" data-numeric="00002" data-alpha="A de prueba">
						<b>00002</b> - <span>A de prueba</span>
						<input type="radio" class="d-none" name="empresa" value="00002" />
					</li>
					<li class="radList checkEmpresa" id="checkEmpresa_3" data-numeric="00003" data-alpha="C de prueba">
						<b>00003</b> - <span>C de prueba</span>
						<input type="radio" class="d-none" name="empresa" value="00003" />
					</li>
					<li class="radList checkEmpresa" id="checkEmpresa_4" data-numeric="00004" data-alpha="B de prueba">
						<b>00004</b> - <span>B de prueba</span>
						<input type="radio" class="d-none" name="empresa" value="00004" />
					</li>
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
						<li class="radList checkEmpresaPrueba" id="checkEmpresaPrueba_{{$emp}}">
								<b>0000{{$emp}}</b> - <span>Empresa de prueba 0000{{$emp}}</span>
								<input type="radio" class="d-none" name="empresaPrueba" value="{{$emp}}" />
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
function ordenaUlLi(elemento,obj,tipo){
	$('.ordenEmpresas').removeClass('principal');
	var ordenClass = $(obj).attr('class');
	$(obj).addClass('principal');
	if(ordenClass.includes("up")){
		var sentido = "up";
		var opuesto = "down";
	}else if(ordenClass.includes("down")){
		var sentido = "down";
		var opuesto = "up";
	}
	$(obj).removeClass(ordenClass);
	var ordenClassOpuesta = ordenClass.replace(sentido,opuesto);
	$(obj).addClass(ordenClassOpuesta);
	$(elemento+" li").sort(ordenaLi).appendTo(elemento);
	function ordenaLi(a, b){
		if(opuesto == "up"){
			return ($(b).data(tipo)) < ($(a).data(tipo)) ? 1 : -1;
		}else if(opuesto == "down"){
			return ($(b).data(tipo)) > ($(a).data(tipo)) ? 1 : -1;
		}
	}
}
</script>
