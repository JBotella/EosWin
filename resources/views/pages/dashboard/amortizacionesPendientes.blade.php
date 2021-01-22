<div class="tarjeta estilo-tarjeta estilo-tarjeta-lista">
	<div class="tarjeta-titulo">
		<i class="far fa-clock mr-1"></i>
		@lang('texto.dashboard.amortizaciones_pendientes')
	</div>
	<div class="tarjeta-body">
		<div class="contenidoEmAjuste">
			<ul>
				@php $items = array(1,2,3,4,5,6,7,8,9,10) @endphp
				@foreach($items as $item)
					<li class="chkList checkAmortizacion" id="checkAmortizacion_{{$item}}">
						<div class="cuadroCheck"></div>
						<b>{{$item}}</b> - Amortización pendiente de prueba {{$item}}
						<input type="checkbox" class="d-none" name="amortizacion" value="{{$item}}" />
					</li>
				@endforeach
			</ul>
		</div>
	</div>
	<div class="tarjeta-pie">
		<div class="cuadroCkeckSelTodos">
			<div class="cuadroCheck" id="checkAmortizacion" data-checked=""></div>
			<span>@lang('texto.dashboard.seleccionar_todas')<span>
		</div>
		<button class="btn boton-tarjeta-pie d-inline-block">@lang('texto.dashboard.contabilizar')</button>
	</div>
</div>
