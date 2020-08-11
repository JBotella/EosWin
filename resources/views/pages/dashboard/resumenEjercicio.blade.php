@php
	$b = 30520.5;
	$g = 22198.15;
	$p = 2198.15;
@endphp
<div class="col-md-6 col-xl-3 mb-4">
	@component('components.tarjetaDashboard')
		@slot('class','estilo-tarjeta-azulAnalogo')
		@slot('titulo',trans('texto.dashboard.ingresos'))
		@slot('valor',number_format($b,2,',','.').'€')
		@slot('nota','Ejercicio 2019')
		@slot('icono','fas fa-euro-sign')
		@slot('link','')
	@endcomponent
</div>

<div class="col-md-6 col-xl-3 mb-4">
	@component('components.tarjetaDashboard')
		@slot('class','estilo-tarjeta-rojoOpuesto')
		@slot('titulo',trans('texto.dashboard.gastos'))
		@slot('valor',number_format($g,2,',','.').'€')
		@slot('nota',trans('texto.ejercicio').' 2019')
		@slot('icono','fas fa-shopping-bag')
		@slot('link','')
	@endcomponent
</div>

<div class="col-md-6 col-xl-3 mb-4">
	@component('components.tarjetaDashboard')
		@slot('class','estilo-tarjeta-principal')
		@slot('titulo',trans('texto.dashboard.beneficios'))
		@slot('valor',number_format(($b-$g),2,',','.').'€')
		@slot('nota',trans('texto.ejercicio').' 2019')
		@slot('icono','fas fa-award')
		@slot('link','')
	@endcomponent
</div>

<div class="col-md-6 col-xl-3 mb-4">
	@component('components.tarjetaDashboard')
		@slot('class','estilo-tarjeta-moradoAnalogo')
		@slot('titulo',trans('texto.dashboard.pendiente_cobros_pagos'))
		@slot('valor',number_format((-$p),2,',','.').'€')
		@slot('nota',trans('texto.ejercicio').' 2019')
		@slot('icono','fas fa-tags')
		@slot('link','')
	@endcomponent
</div>
