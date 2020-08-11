<span><i class="fas fa-user icoCab mr-2"></i></span>
<span>@lang('texto.cliente')</span>
<span class="guionEnCabecera">-</span>
<span class="nombreEnCabecera">{{$nombreCompleto}}</span>
<div class="cabSeccBtnAcciones">
	<i class="fas fa-users cabSeccBtnAccion btnAccion" id="cabeceraSeccion" title="@lang('texto.clientes')" data-href="{{ route('listaClientesMin') }}" onclick="listaExtra(this)"></i>
	<i class="fas fa-plus-circle cabSeccBtnAccion btnCrear btnAccion" title="@lang('texto.crear')"></i>
</div>
