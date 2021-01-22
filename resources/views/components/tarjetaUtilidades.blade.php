<div class="tarjeta estilo-tarjeta {{$class}} tarjeta-link @if(!isset($link) or empty($link)) estilo-tarjeta-desactivada @endif mb-3 p-0" @if(isset($link['ruta']) or !empty($link['ruta'])) onclick="abrirLinea('{{$link['id']}}','{{route(''.$link['ruta'].'',$link['id'])}}')" @endif>
	<div class="tarjeta-body py-2">
		<div class="row no-gutters align-items-center h-100">
			<div class="col">
				<div class="tarjeta-nombre">{{$nombre}}</div>
				<div class="tarjeta-resumen">{{$resumen}}</div>
			</div>
		</div>
	</div>
</div>
