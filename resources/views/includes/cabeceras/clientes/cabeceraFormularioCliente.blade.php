<span><i class="fas fa-user icoCab mr-2"></i></span>
<span>@if(!isset($datos)) @lang('texto.nuevo')@endif @lang('texto.cliente')</span>
@if(isset($datos))
	<span class="guionEnCabecera">-</span>
	<span class="nombreEnCabecera">{{$nombreCompleto}}</span>
@endif
<div class="cabSeccBtnAcciones">
	<i class="fas fa-users cabSeccBtnAccion btnAccion" id="cabeceraSeccion" title="@lang('texto.clientes')" data-href="{{ route('listaClientesMin') }}" onclick="listaExtra(this)"></i>
	<a href="{{ route('cliente') }}">
		<i class="fas fa-plus-circle cabSeccBtnAccion btnCrear btnAccion" title="@lang('texto.crear')"></i>
	</a>
</div>
