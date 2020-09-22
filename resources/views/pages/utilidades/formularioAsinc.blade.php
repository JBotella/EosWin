@component('components.seccionFormularioAsinc')
	<div class="accionesFicha">
		@include('includes.complementos.botonLinkVolver', ['ruta' => route('utilidades')])
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
	