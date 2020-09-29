<div class="col-12 mt-3" id="columnaCabecera">
	<div class="bloqueFormulario">
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
				@slot('nombre', 'Nombre')
				@slot('valor')
					<input type="text" class="form-control" name="NOMBRE" @if($datos) value="{{$datos->NOMBRE}}" @endif />
				@endslot
			@endcomponent
		</div>
		<div class="row">
			@component('components.itemFormulario')
				@slot('class', 'col-6 col-md-6 col-lg-3 col-xl-3')
				@slot('nombre', 'Clave')
				@slot('valor')
					<input type="text" class="form-control" name="CLAVE" @if($datos) value="{{$datos->CLAVE}}" @endif />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-6 col-md-6 col-lg-3 col-xl-3')
				@slot('nombre', 'Epígrafe')
				@slot('valor')
					<input type="text" class="form-control" name="EPIGRAFE" @if($datos) value="{{$datos->EPIGRAFE}}" @endif />
				@endslot
			@endcomponent
			@component('components.itemFormulario')
				@slot('class', 'col-12 col-md-6 col-lg-6 col-xl-6')
				@slot('nombre', 'Periodo')
				@slot('valor')
					<input type="hidden" class="form-control" name="PERIODO" @if($datos) value="{{$datos->PERIODO}}" @endif />
					<select class="form-control custom-select" name="PERIODO">
						@foreach($parametros->ExtraUtilidad['periodo']->get() as $parametro)
							<option value="{{$parametro->CODIGO}}" @if($datos) @if($datos->PERIODO == $parametro->CODIGO) selected @endif @endif>{{$parametro->CODIGO.' - '.$parametro->DESCRIPCION}}</option>
						@endforeach
					</select>
				@endslot
			@endcomponent
		</div>
	</div>
</div>

<div class="col-12 col-md-6" id="columnaIzquierda">
	<div class="bloqueFormulario">
		<div class="subcategoriaBloqueFormulario">Módulos IVA</div>
		<table class="table w-100 tablaFormEditable">
			<tbody>
				@php
					$camposIva = [
						'IVADES1' => 'IVAIMP1',
						'IVADES2' => 'IVAIMP2',
						'IVADES3' => 'IVAIMP3',
						'IVADES4' => 'IVAIMP4',
						'IVADES5' => 'IVAIMP5',
						'IVADES6' => 'IVAIMP6',
						'IVADES7' => 'IVAIMP7',
					];
				@endphp
				@foreach($camposIva as $desCampo => $impCampo)
					<tr class="trEditable w-100">
						<td class="tdEditable w-75" contenteditable='true'>{{$datos->$desCampo}}</td>
						<td class="tdEditable w-25 text-right" contenteditable='true'>{{number_format($datos->$impCampo,2)}}</td>
					</tr>
				@endforeach
					<tr class="trEditable w-100">
						<td class="tdEditable w-75" contenteditable='true'>Porcentaje sobre cuota derivada</td>
						<td class="tdEditable w-25 text-right" contenteditable='true'>{{number_format($datos->PORACTIVIECO,2)}}</td>
					</tr>
					<tr class="trEditable w-100">
						<td class="tdEditable w-75" contenteditable='true'>Porcentaje cuota mínima</td>
						<td class="tdEditable w-25 text-right" contenteditable='true'>{{number_format($datos->MINCUOTA,2)}}</td>
					</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="col-12 col-md-6" id="columnaDerecha">
	<div class="bloqueFormulario">
		<div class="subcategoriaBloqueFormulario">Módulos Renta</div>
		<table class="table w-100 tablaFormEditable">
			<tbody>
				@php
					$camposRenta = [
						'IRPDES1' => 'IRPIMP1',
						'IRPDES2' => 'IRPIMP2',
						'IRPDES3' => 'IRPIMP3',
						'IRPDES4' => 'IRPIMP4',
						'IRPDES5' => 'IRPIMP5',
						'IRPDES6' => 'IRPIMP6',
						'IRPDES7' => 'IRPIMP7',
					];
				@endphp
				@foreach($camposRenta as $desCampo => $impCampo)
					<tr class="trEditable w-100">
						<td class="tdEditable w-75" contenteditable='true'>{{$datos->$desCampo}}</td>
						<td class="tdEditable w-25 text-right" contenteditable='true'>{{number_format($datos->$impCampo,2)}}</td>
					</tr>
				@endforeach
					<tr class="trEditable w-100">
						<td class="tdEditable w-75" contenteditable='true'>Límite</td>
						<td class="tdEditable w-25 text-right" contenteditable='true'>{{number_format($datos->LIMITE,2)}}</td>
					</tr>
					<tr class="trEditable w-100">
						<td class="tdEditable w-75" contenteditable='true'>Límite de empleados</td>
						<td class="tdEditable w-25 text-right" contenteditable='true'>{{number_format($datos->LIMITEEMPLEADOS,2)}}</td>
					</tr>
			</tbody>
		</table>
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
$(document).ready(function(){
	$('.tablaFormEditable td').click(function(event){
		console.log(5);
		event.stopImmediatePropagation();
		event.preventDefault();
	});
});

</script>
