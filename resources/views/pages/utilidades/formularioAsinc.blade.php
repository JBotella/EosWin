@component('components.seccionFormularioAsinc')
	<div class="cabeceraVisorFormAsinc">
		<div class="tituloVisorFormAsinc">
			<span class="tituloCabeceraFormAsinc" id="tituloCabeceraFormAsinc">
				<i class="fas fa-cogs icoCab mr-2"></i>
				@lang($parametros->textos.'.nombre')
			</span>
			{{--<span class="accionFormAsic">
				@include('includes.complementos.botonVisorAsincCerrar')
			</span>--}}
		</div>
	</div>
	<div class="contenidoFormulario">
		<form class="form" method="POST" action="#">
			@csrf
			<div class="row">
				@include('pages.utilidades.formularios.'.$id.'')
			</div>
		</form>
	</div>
@endcomponent
