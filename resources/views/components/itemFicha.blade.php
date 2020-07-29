<div class="{{$class}} @if(!$valor) d-none @endif">
	<div class="itemFicha">
		<div class="nombreItemFicha @if(!$nombre) d-none @endif">{!!trim($nombre)!!}</div>
		<div class="valorItemFicha">{!!trim($valor)!!}</div>
	</div>
</div>
