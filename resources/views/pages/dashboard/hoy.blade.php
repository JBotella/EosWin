<div class="tarjeta estilo-tarjeta estilo-tarjeta-lista">
	<div class="tarjeta-titulo">
		<i class="fas fa-calendar-day mr-1"></i>
		@lang('texto.dashboard.hoy')
	</div>
	<div class="tarjeta-body">
		<div class="contenidoEmAjuste">
			<ul>
				@php $items = array(1,2,3,4,5,6,7,8,9,10) @endphp
				@foreach($items as $item)
					<li>
						<b>{{$item}}</b> - Item de prueba {{$item}}
					</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
