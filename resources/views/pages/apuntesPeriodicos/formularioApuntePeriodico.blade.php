@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion" id="cabeceraSeccionFormulario">
			<span><i class="fas fa-cog icoCab mr-2"></i></span>
			<span>@lang('texto.apunte_periodico')</span>
		</div>
		@component('components.seccionFormulario')
			<div class="accionesFicha">
				@include('includes.complementos.botonLinkVolver', ['ruta' => route('apuntesPeriodicos')])
			</div>
			
			<div class="contenidoFormulario">
				<form class="form" method="POST" action="{!!route('guardaApuntePeriodico', $id)!!}">
					@csrf
					<div class="row">
					
						<div class="col-12 col-md-6" id="columnaIzquierda">
							{{-- Datos genéricos --}}
							<div class="categoriaBloqueFormulario">@lang('texto.form_apunte_periodico.datos_genericos')</div>
							<div class="bloqueFormulario">
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12')
										@slot('nombre', trans('texto.form_apunte_periodico.descripcion'))
										@slot('valor')
											<textarea class="form-control" rows="2" name="descripcion" placeholder="..."></textarea>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
										@slot('nombre', trans('texto.form_apunte_periodico.tipo'))
										@slot('valor')
											<select class="form-control custom-select" name="tipo" id="selectorTipo" data-carga-select="selectorOperacion,selectorCuenta" data-ruta="{{route('apuntePeriodicoTipo')}}" required>
												<option value="" disabled selected>- @lang('texto.form_apunte_periodico.seleccione_tipo') -</option>
												<option value="I">@lang('texto.form_apunte_periodico.ingreso')</option>
												<option value="G">@lang('texto.form_apunte_periodico.gasto')</option>
											</select>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
										@slot('nombre', trans('texto.form_apunte_periodico.operacion'))
										@slot('valor')
											<select class="form-control custom-select" name="operacion" id="selectorOperacion" data-tipo="select">
												<option value="">- @lang('texto.form_apunte_periodico.seleccione_tipo') -</option>
											</select>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
										@slot('nombre', trans('texto.form_apunte_periodico.cuenta'))
										@slot('valor')
											<input type="text" class="form-control" list="selectorCuenta" name="cuenta" id="selectorCuentaDatalist" placeholder="- @lang('texto.form_apunte_periodico.seleccione_tipo') -" data-placeholder="- @lang('texto.seleccionar') @lang('texto.form_apunte_periodico.cuenta') -" onchange="opcionDatalist(this)" />
											<datalist id="selectorCuenta" data-tipo="datalist"></datalist>
											<input type="hidden" name="cuentaId" id="selectorCuentaDatalistId" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
										@slot('nombre', trans('texto.form_apunte_periodico.base_imponible'))
										@slot('valor')
											<input type="text" class="form-control" name="baseImponible" value="" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', trans('texto.form_apunte_periodico.iva'))
										@slot('valor')
											<select class="form-control custom-select" name="iva">
												<option value="">...</option>
											</select>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', trans('texto.form_apunte_periodico.irpf'))
										@slot('valor')
											<select class="form-control custom-select" name="irpf">
												<option value="">...</option>
											</select>
										@endslot
									@endcomponent
								</div>
							</div>
						</div>
						
						<div class="col-12 col-md-6" id="columnaDerecha">
							{{-- Periodicidad --}}
							<div class="categoriaBloqueFormulario">@lang('texto.form_apunte_periodico.periodicidad')</div>
							<div class="bloqueFormulario mt-0">
								<div class="row mt-0">
									@component('components.itemFormulario')
										@slot('class', 'col-7 col-md-7 col-lg-7 col-xl-7')
										@slot('nombre', trans('texto.form_apunte_periodico.periodicidad'))
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-5 col-md-5 col-lg-5 col-xl-5 ml-auto')
										@slot('nombre', trans('texto.form_apunte_periodico.fecha_inicio'))
									@endcomponent
								</div>
								<div class="row mt-1 rowRadio" data-row="diario">
									@component('components.itemFormulario')
										@slot('class', 'col-7 col-md-7 col-lg-7 col-xl-7')
										@slot('valor')
											<div class="itemCheckbox custom-control custom-radio p-0 pl-3">
												<input type="radio" class="form-control custom-control-input" id="diario" name="periodicidad" value="diario" />
												<label class="itemCheckLabel custom-control-label" for="diario">@lang('texto.form_apunte_periodico.diario')</label>
											</div>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-5 col-md-5 col-lg-5 col-xl-5 ml-auto')
										@slot('valor')
											<input type="date" class="form-control" name="fechaDiario" data-id="diario" value="" />
										@endslot
									@endcomponent
								</div>
								<div class="row mt-1 rowRadio" data-row="semanal">
									@component('components.itemFormulario')
										@slot('class', 'col-3 col-md-3 col-lg-3 col-xl-3')
										@slot('valor')
											<div class="itemCheckbox custom-control custom-radio p-0 pl-3">
												<input type="radio" class="form-control custom-control-input" id="semanal" name="periodicidad" value="semanal" />
												<label class="itemCheckLabel custom-control-label" for="semanal">@lang('texto.form_apunte_periodico.semanal')</label>
											</div>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-4 col-md-4 col-lg-4 col-xl-4')
										@slot('valor')
											<select class="form-control custom-select" name="diaSemana" data-id="semanal">
												<option value="lunes">@lang('texto.dia.lunes')</option>
												<option value="martes">@lang('texto.dia.martes')</option>
												<option value="miercoles">@lang('texto.dia.miercoles')</option>
												<option value="jueves">@lang('texto.dia.jueves')</option>
												<option value="viernes">@lang('texto.dia.viernes')</option>
												<option value="sabado">@lang('texto.dia.sabado')</option>
												<option value="domingo">@lang('texto.dia.domingo')</option>
											</select>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-5 col-md-5 col-lg-5 col-xl-5')
										@slot('valor')
											<input type="date" class="form-control" name="fechaSemanal" data-id="semanal" value="" />
										@endslot
									@endcomponent
								</div>
								<div class="row mt-1 rowRadio" data-row="mensual">
									@component('components.itemFormulario')
										@slot('class', 'col-7 col-md-7 col-lg-7 col-xl-7')
										@slot('valor')
											<div class="itemCheckbox custom-control custom-radio p-0 pl-3">
												<input type="radio" class="form-control custom-control-input" id="mensual" name="periodicidad" value="mensual" />
												<label class="itemCheckLabel custom-control-label" for="mensual">@lang('texto.form_apunte_periodico.mensual')</label>
											</div>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-5 col-md-5 col-lg-5 col-xl-5 ml-auto')
										@slot('valor')
											<input type="date" class="form-control" name="fechaMensual" data-id="mensual" value="" />
										@endslot
									@endcomponent
								</div>
								<div class="row mt-1 rowRadio" data-row="bimensual">
									@component('components.itemFormulario')
										@slot('class', 'col-7 col-md-7 col-lg-7 col-xl-7')
										@slot('valor')
											<div class="itemCheckbox custom-control custom-radio p-0 pl-3">
												<input type="radio" class="form-control custom-control-input" id="bimensual" name="periodicidad" value="bimensual" />
												<label class="itemCheckLabel custom-control-label" for="bimensual">@lang('texto.form_apunte_periodico.bimensual')</label>
											</div>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-5 col-md-5 col-lg-5 col-xl-5 ml-auto')
										@slot('valor')
											<input type="date" class="form-control" name="fechaBiensual" data-id="bimensual" value="" />
										@endslot
									@endcomponent
								</div>
								<div class="row mt-1 rowRadio" data-row="trimestral">
									@component('components.itemFormulario')
										@slot('class', 'col-7 col-md-7 col-lg-7 col-xl-7')
										@slot('valor')
											<div class="itemCheckbox custom-control custom-radio p-0 pl-3">
												<input type="radio" class="form-control custom-control-input" id="trimestral" name="periodicidad" value="trimestral" />
												<label class="itemCheckLabel custom-control-label" for="trimestral">@lang('texto.form_apunte_periodico.trimestral')</label>
											</div>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-5 col-md-5 col-lg-5 col-xl-5 ml-auto')
										@slot('valor')
											<input type="date" class="form-control" name="fechaTrimestral" data-id="trimestral" value="" />
										@endslot
									@endcomponent
								</div>
								<div class="row mt-1 rowRadio" data-row="concreta">
									@component('components.itemFormulario')
										@slot('class', 'col-7 col-md-7 col-lg-7 col-xl-7')
										@slot('valor')
											<div class="itemCheckbox custom-control custom-radio p-0 pl-3">
												<input type="radio" class="form-control custom-control-input" id="concreta" name="periodicidad" value="concreta" />
												<label class="itemCheckLabel custom-control-label" for="concreta">@lang('texto.form_apunte_periodico.fecha_concreta')</label>
											</div>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-5 col-md-5 col-lg-5 col-xl-5 ml-auto')
										@slot('valor')
											<input type="date" class="form-control" name="fechaConcreta" data-id="concreta" value="" />
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
												@slot('rutaCancelar', 'apuntesPeriodicos')
												@slot('rutaBorrar', '')
											@endcomponent
										@endslot
									@endcomponent
								</div>
							</div>
						</div>
						
					</div>
				</form>
			</div>
		@endcomponent
	</div>
	<script>
		// Selector tipo que carga en función de su valor los valores de los selectores de 'operación y cuenta'
		$('#selectorTipo').change(function(){
			var obj = this;
			var ruta = $(obj).data('ruta');
			var cargaSelect = $(obj).data('carga-select').split(',');
			selectorChange(obj,ruta,cargaSelect)
		});
		$(document).ready(function(){
			compruebaRowRadios();
		});
	</script>
@endsection
