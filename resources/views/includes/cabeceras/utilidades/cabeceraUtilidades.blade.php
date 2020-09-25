@php
	if(isset($parametros->clicListado)){
		$clicListado = $parametros->clicListado;
	}else{
		$clicListado = 'no';
	}
@endphp
<span><i class="fas fa-cogs icoCab mr-2"></i></span>
<span id="cabeceraListado_0">@lang($parametros->textos.'.nombre')</span><span class="cabCantLista" id="cabCantLista_0"></span>
<div class="cabSeccBtnAcciones">
	<i class="fas fa-sync cabSeccBtnAccion btnActualizar btnAccion" title="@lang('texto.actualizar')" onclick="recargarListar(0)"></i>
	<a onclick="abreForm('{{route("utilidadFormAsinc",[$id])}}')">
		<i class="fas fa-plus-circle cabSeccBtnAccion btnCrear btnAccion" title="@lang('texto.crear')"></i>
	</a>
</div>
