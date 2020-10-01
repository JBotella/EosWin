<div class="dropdown selectorAcciones mr-2">
	<div class="dropdown-toggle" id="accionesTabla" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-list-ul mr-1"></i>@lang('texto.acciones')</div>
	<div class="dropdown-menu dropdown-menu-left listaSelectorAcciones" aria-labelledby="accionesTabla">
		@if(in_array('ejecutar',$acciones))
			<div class="dropdown-item" onclick="notificacionAccion('ejecutar')"><i class="fas fa-play-circle mr-1"></i>@lang('texto.ejecutar')</div>
		@endif
		@if(in_array('extracto',$acciones))
			<div class="dropdown-item" data-ruta="{{route('extracto'.$prefijoRuta)}}" onclick="accionLineas(this,'extracto','{{$checkLinea}}','redir')"><i class="fas fa-list-alt mr-1"></i>@lang('texto.extracto')</div>
		@endif
		@if(in_array('exportar',$acciones))
			<div class="dropdown-item" onclick="notificacionAccion('exportar')"><i class="fas fa-file-export mr-1"></i>@lang('texto.exportar')</div>
		@endif
		@if(in_array('borrar',$acciones))
			<div class="dropdown-item" onclick="notificacionAccion('borrar')"><i class="fas fa-trash-alt mr-1"></i>@lang('texto.borrar')</div>
		@endif
	</div>
</div>
