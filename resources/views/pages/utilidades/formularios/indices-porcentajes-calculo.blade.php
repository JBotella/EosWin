<div class="col-12 col-md-6" id="columnaIzquierda">

	{{-- Constantes y Porcentajes --}}
	<div class="categoriaBloqueFormulario">@lang($parametros->textos.'.categorias.constantes_porcentajes')</div>
	<div class="bloqueFormulario">
		<div class="subcategoriaBloqueFormulario">@lang($parametros->textos.'.categorias.est_objetiva_modulos')</div>
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice1'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE1" step="0.01" value="{{number_format($datos->INDICE1,2,'.','')}}" />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice2'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE2" step="0.01" value="{{number_format($datos->INDICE2,2,'.','')}}" />
				@endslot
			@endcomponent
		</div>
		<div class="subcategoriaBloqueFormulario">@lang($parametros->textos.'.categorias.est_directa_simplificada')</div>
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice3'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE3" step="0.01" value="{{number_format($datos->INDICE3,2,'.','')}}" />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice4'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE4" step="0.01" value="{{number_format($datos->INDICE4,2,'.','')}}" />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice5'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE5" step="0.01" value="{{number_format($datos->INDICE5,2,'.','')}}" />
				@endslot
			@endcomponent
		</div>
		<div class="subcategoriaBloqueFormulario">@lang($parametros->textos.'.categorias.est_directa_est_directa_simplificada')</div>
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice6'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE6" step="0.01" value="{{number_format($datos->INDICE6,2,'.','')}}" />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice7'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE7" step="0.01" value="{{number_format($datos->INDICE7,2,'.','')}}" />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice8'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE8" step="0.01" value="{{number_format($datos->INDICE8,2,'.','')}}" />
				@endslot
			@endcomponent
		</div>
	</div>
	
	{{-- Índices Estimación Objetiva --}}
	<div class="categoriaBloqueFormulario">@lang($parametros->textos.'.categorias.indices_estimacion_objetiva')</div>
	<div class="bloqueFormulario">
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice9'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE9" step="0.01" value="{{number_format($datos->INDICE9,2,'.','')}}" />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice10'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE10" step="0.01" value="{{number_format($datos->INDICE10,2,'.','')}}" />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice11'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE11" step="0.01" value="{{number_format($datos->INDICE11,2,'.','')}}" />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice12'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE12" step="0.01" value="{{number_format($datos->INDICE12,2,'.','')}}" />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice13'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE13" step="0.01" value="{{number_format($datos->INDICE13,2,'.','')}}" />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice14'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE14" step="0.01" value="{{number_format($datos->INDICE14,2,'.','')}}" />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice15'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE15" step="0.01" value="{{number_format($datos->INDICE15,2,'.','')}}" />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice16'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE16" step="0.01" value="{{number_format($datos->INDICE16,2,'.','')}}" />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice17'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE17" step="0.01" value="{{number_format($datos->INDICE17,2,'.','')}}" />
				@endslot
			@endcomponent
		</div>
		<div class="subcategoriaBloqueFormulario">@lang($parametros->textos.'.categorias.declaracion_anual_modelo_347')</div>
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice18'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE18" step="0.01" value="{{number_format($datos->INDICE18,2,'.','')}}" />
				@endslot
			@endcomponent
		</div>
	</div>

</div>

<div class="col-12 col-md-6" id="columnaDerecha">
	{{-- Índices Correctores IVA --}}
	<div class="categoriaBloqueFormulario">@lang($parametros->textos.'.categorias.indices_correctores_iva')</div>
	<div class="bloqueFormulario">
		<div class="subcategoriaBloqueFormulario">@lang($parametros->textos.'.categorias.poblacion_mas_100000')</div>
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice19'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE19" step="0.01" value="{{number_format($datos->INDICE19,2,'.','')}}" />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice20'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE20" step="0.01" value="{{number_format($datos->INDICE20,2,'.','')}}" />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice21'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE21" step="0.01" value="{{number_format($datos->INDICE21,2,'.','')}}" />
				@endslot
			@endcomponent
		</div>
		<div class="subcategoriaBloqueFormulario">@lang($parametros->textos.'.categorias.poblacion_entre_10000_100000')</div>
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice22'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE22" step="0.01" value="{{number_format($datos->INDICE22,2,'.','')}}" />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice23'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE23" step="0.01" value="{{number_format($datos->INDICE23,2,'.','')}}" />
				@endslot
			@endcomponent
		</div>
		<div class="subcategoriaBloqueFormulario">@lang($parametros->textos.'.categorias.poblacion_menos_10000')</div>
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice24'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE24" step="0.01" value="{{number_format($datos->INDICE24,2,'.','')}}" />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
				@slot('nombre', trans($parametros->textos.'.campos.indice25'))
				@slot('valor')
					<input type="number" class="form-control" name="INDICE25" step="0.01" value="{{number_format($datos->INDICE25,2,'.','')}}" />
				@endslot
			@endcomponent
		</div>
	</div>
</div>

<div class="col-12 col-md-12 mt-3" id="columnaPie">
	<div class="bloqueFormulario">
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12 text-center')
				@slot('valor')
					@component('components.botonesPieFormulario')
						@slot('rutaCancelar', 'utilidades')
					@endcomponent
				@endslot
			@endcomponent
		</div>
	</div>
</div>