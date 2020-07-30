<div class="{{$class}}">
	<div class="itemFormulario">
		@if($nombre)<div class="nombreItemFormulario">{!!trim($nombre)!!}</div>@endif
		@if(isset($valor))<div class="valorItemFormulario">{!!trim($valor)!!}</div>@endif
	</div>
</div>
