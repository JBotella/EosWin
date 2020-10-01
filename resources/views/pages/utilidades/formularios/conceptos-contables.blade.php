<div class="col-12 mt-3">
	<div class="bloqueFormulario">
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', 'Código')
				@slot('valor')
					<input type="text" class="form-control" name="DESCCODIG" @if($datos) value="{{$datos->DESCCODIG}}" readonly @endif />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', 'Descripción')
				@slot('valor')
					<input type="text" class="form-control" name="DESCCONCE" id="DESCCONCE" @if($datos) value="{{$datos->DESCCONCE}}" @endif />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', 'Variables')
				@slot('valor')
					<div class="lineaElementosClicables">
						<button type="button" class="elementoClicable varConceptoContable" value="+DOC">+ Doc (Nº. de Factura)</button>
						<button type="button" class="elementoClicable varConceptoContable" value="+FEC">+ Fec (Fecha)</button>
						<button type="button" class="elementoClicable varConceptoContable" value="+MES">+ Mes (Mes)</button>
						<button type="button" class="elementoClicable varConceptoContable" value="+CTA">+ Cta (Cuenta)</button>
						<button type="button" class="elementoClicable varConceptoContable" value="+CDE">+ Cde (Título de Cuenta)</button>
					</div>
				@endslot
			@endcomponent
		</div>
	</div>
</div>

<div class="col-12 col-md-12 mt-3" id="columnaPie">
	<div class="bloqueFormulario mb-0">
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12 text-center')
				@slot('valor')
					@component('components.botonesPieFormulario')
						@slot('funcionGuardar', '')
						@slot('funcionCancelar', 'visorFormCerrar(0)')
						@slot('funcionBorrar', '')
					@endcomponent
				@endslot
			@endcomponent
		</div>
	</div>
</div>
<script>
$(document).ready($('.varConceptoContable').click(function(){
	var val = $(this).val();
	var desc = $('#DESCCONCE').val();
	$('#DESCCONCE').val(desc+' '+val);
}));
</script>
