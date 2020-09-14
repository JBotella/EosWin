<div class="notificacionAccion notificacion-estilo-alerta" data-lista-id="0" data-accion="borrar" data-linea-check="{{$checkData}}">
	<div class="avisoAccion">@lang('texto.confirma_borrar_lineas')</div>
	<div class="opcionesAccion">
		<div class="opcionAccion" onclick="notificacionAccion('borrar')">@lang('texto.cancelar')</div>
		<div class="opcionAccion" data-ruta="{{route($rutaBorrar)}}" onclick="accionLineas(this,'borrar','{{$checkData}}','asinc')">@lang('texto.confirmar')</div>
	</div>
</div>
<div class="notificacionAccion notificacion-estilo-seleccion" data-lista-id="0" data-accion="exportar" data-linea-check="{{$checkData}}">
	<div class="avisoAccion">@lang('texto.seleccion_formato_exportar')</div>
	<div class="opcionesAccion">
		@foreach($formatosExportar as $formato)
			@switch($formato)
				@case('pdf')
					@php
						$nombreFormato = 'Pdf';
						$icoFormato = 'fas fa-file-pdf';
					@endphp
				@break
				@case('csv')
					@php
						$nombreFormato = 'Csv';
						$icoFormato = 'fas fa-file-csv';
					@endphp
				@break
				@case('excel')
					@php
						$nombreFormato = 'Excel';
						$icoFormato = 'fas fa-file-excel';
					@endphp
				@break
			@endswitch
			<div class="opcionAccionIco" data-ruta="{{route($rutaExportar,$formato)}}" onclick="accionLineas(this,'exportar','{{$checkData}}','form')">
				<i class="{{$icoFormato}}"></i>
				<span>{{$nombreFormato}}</span>
			</div>
		@endforeach
	</div>
	<div class="opcionesAccion">
		<div class="opcionAccion" onclick="notificacionAccion('exportar')">@lang('texto.cancelar')</div>
	</div>
</div>
