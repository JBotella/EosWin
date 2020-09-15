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
				<form class="form" method="POST" action="">
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
											<select class="form-control custom-select" name="tipo">
												<option value="I" disabled selected>- Seleccione tipo -</option>
												<option value="I">@lang('texto.form_apunte_periodico.ingreso')</option>
												<option value="G">@lang('texto.form_apunte_periodico.gasto')</option>
											</select>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
										@slot('nombre', trans('texto.form_apunte_periodico.operacion'))
										@slot('valor')
											<select class="form-control custom-select" name="operacion">
												<option value="">...</option>
											</select>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-6')
										@slot('nombre', trans('texto.form_apunte_periodico.cuenta'))
										@slot('valor')
											<select class="form-control custom-select" name="cuenta">
												<option value="">...</option>
											</select>
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
							<div class="bloqueFormulario mt-3">
								<div class="row mt-1">
									@component('components.itemFormulario')
										@slot('class', 'col-7 col-md-7 col-lg-7 col-xl-7')
										@slot('valor')
											<div class="itemCheckbox">
												<input type="checkbox" class="form-control" id="diario" name="diario" />
												<label class="itemCheckLabel" for="diario">@lang('texto.form_apunte_periodico.diario')</label>
											</div>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-5 col-md-5 col-lg-5 col-xl-5 ml-auto')
										@slot('valor')
											<input type="date" class="form-control" name="fechaDiario" value="" />
										@endslot
									@endcomponent
								</div>
								<div class="row mt-1">
									@component('components.itemFormulario')
										@slot('class', 'col-3 col-md-3 col-lg-3 col-xl-3')
										@slot('valor')
											<div class="itemCheckbox">
												<input type="checkbox" class="form-control" id="semanal" name="semanal" />
												<label class="itemCheckLabel" for="semanal">@lang('texto.form_apunte_periodico.semanal')</label>
											</div>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-4 col-md-4 col-lg-4 col-xl-4')
										@slot('valor')
											<select class="form-control custom-select" name="diaSemana">
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
											<input type="date" class="form-control" name="fechaSemanal" value="" />
										@endslot
									@endcomponent
								</div>
								<div class="row mt-1">
									@component('components.itemFormulario')
										@slot('class', 'col-7 col-md-7 col-lg-7 col-xl-7')
										@slot('valor')
											<div class="itemCheckbox">
												<input type="checkbox" class="form-control" id="mensual" name="mensual" />
												<label class="itemCheckLabel" for="mensual">@lang('texto.form_apunte_periodico.mensual')</label>
											</div>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-5 col-md-5 col-lg-5 col-xl-5 ml-auto')
										@slot('valor')
											<input type="date" class="form-control" name="fechaMensual" value="" />
										@endslot
									@endcomponent
								</div>
								<div class="row mt-1">
									@component('components.itemFormulario')
										@slot('class', 'col-7 col-md-7 col-lg-7 col-xl-7')
										@slot('valor')
											<div class="itemCheckbox">
												<input type="checkbox" class="form-control" id="biensual"" name="biensual" />
												<label class="itemCheckLabel" for="biensual">@lang('texto.form_apunte_periodico.bimensual')</label>
											</div>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-5 col-md-5 col-lg-5 col-xl-5 ml-auto')
										@slot('valor')
											<input type="date" class="form-control" name="fechaBiensual" value="" />
										@endslot
									@endcomponent
								</div>
								<div class="row mt-1">
									@component('components.itemFormulario')
										@slot('class', 'col-7 col-md-7 col-lg-7 col-xl-7')
										@slot('valor')
											<div class="itemCheckbox">
												<input type="checkbox" class="form-control" id="trimestral" name="trimestral" />
												<label class="itemCheckLabel" for="trimestral">@lang('texto.form_apunte_periodico.trimestral')</label>
											</div>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-5 col-md-5 col-lg-5 col-xl-5 ml-auto')
										@slot('valor')
											<input type="date" class="form-control" name="fechaTrimestral" value="" />
										@endslot
									@endcomponent
								</div>
								<div class="row mt-1">
									@component('components.itemFormulario')
										@slot('class', 'col-7 col-md-7 col-lg-7 col-xl-7')
										@slot('valor')
											<div class="itemCheckbox">
												<input type="checkbox" class="form-control" id="concreta" name="concreta" />
												<label class="itemCheckLabel" for="concreta">@lang('texto.form_apunte_periodico.fecha_concreta')</label>
											</div>
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-5 col-md-5 col-lg-5 col-xl-5 ml-auto')
										@slot('valor')
											<input type="date" class="form-control" name="fechaConcreta" value="" />
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
											<button class="btn btn-form mt-1 btn-form" type="submit">
												<i class="fas fa-save mr-1"></i>
												@lang('texto.guardar')
											</button>
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
	<select>
	</select>
@endsection
