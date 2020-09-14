@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion">
			<span><i class="fas fa-cog icoCab mr-2"></i></span>
			<span>@lang('configuraciones.configuracion_empresa.titulo_configuracion')</span>
		</div>
		@component('components.seccionFormulario')
			<div class="contenidoFormulario">
				<form class="form" method="POST" action="{!!route('guardaEmpresa')!!}">
					@csrf
					@if(Session::has('success'))
						@component('components.mensajeAlerta')
							@slot('tipo', 'success')
							@slot('mensaje', Session::get('success'))
						@endcomponent
					@endif
					<div class="row">
						<div class="col-12 col-md-6" id="columnaIzquierda">
							{{-- Datos generales --}}
							<div class="categoriaBloqueFormulario">@lang('texto.form_empresa.datos_generales')</div>
							<div class="bloqueFormulario">
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
										@slot('nombre', trans('texto.form_empresa.codigo'))
										@slot('valor')
											<input type="text" class="form-control" name="codigo" value="{{$datosEmpresa->MENUMEMPRESA}}" readonly disabled />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
										@slot('nombre', trans('texto.form_empresa.nombre'))
										@slot('valor')
											<input type="text" class="form-control" name="nombre" value="{{$datosEmpresa->MENOMBRE}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-4 col-md-4 col-lg-4 col-xl-3')
										@slot('nombre', trans('texto.form_empresa.nif_cif'))
										@slot('valor')
											<input type="text" class="form-control" name="cif" value="{{$datosEmpresa->MECIF}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-4 col-md-4 col-lg-4 col-xl-3')
										@slot('nombre', trans('texto.form_empresa.cnae'))
										@slot('valor')
											<input type="text" class="form-control" name="cnae" value="{{$datosEmpresa->MECODCNAE}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
										@slot('nombre', trans('texto.form_empresa.actividad'))
										@slot('valor')
											<input type="text" class="form-control" name="actividad" value="{{$datosEmpresa->MEACTIVIDAD}}" />
										@endslot
									@endcomponent
								</div>
							</div>
							{{-- Domicilio --}}
							<div class="categoriaBloqueFormulario">@lang('texto.form_empresa.domicilio')</div>
							<div class="bloqueFormulario">
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
										@slot('nombre', trans('texto.form_empresa.direccion'))
										@slot('valor')
											<input type="text" class="form-control" name="domicilio" value="{{$datosEmpresa->MEDOMICILIO}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-3 col-md-3 col-lg-3 col-xl-3')
										@slot('nombre', trans('texto.form_empresa.numero'))
										@slot('valor')
											<input type="text" class="form-control" name="numero" value="{{$datosEmpresa->MENUM}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-3 col-md-3 col-lg-3 col-xl-3')
										@slot('nombre', trans('texto.form_empresa.escalera'))
										@slot('valor')
											<input type="text" class="form-control" name="escalera" value="{{$datosEmpresa->MEESC}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-3 col-md-3 col-lg-3 col-xl-3')
										@slot('nombre', trans('texto.form_empresa.piso'))
										@slot('valor')
											<input type="text" class="form-control" name="piso" value="{{$datosEmpresa->MEPISO}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-3 col-md-3 col-lg-3 col-xl-3')
										@slot('nombre', trans('texto.form_empresa.puerta'))
										@slot('valor')
											<input type="text" class="form-control" name="puerta" value="{{$datosEmpresa->MEPUERTA}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', trans('texto.form_empresa.codigo_postal'))
										@slot('valor')
											<input type="text" class="form-control" name="cp" value="{{$datosEmpresa->MECP}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', trans('texto.form_empresa.localidad'))
										@slot('valor')
											<input type="text" class="form-control" name="localidad" value="{{$datosEmpresa->MELOCALIDAD}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', trans('texto.form_empresa.provincia'))
										@slot('valor')
											<input type="text" class="form-control" name="provincia" value="{{$datosEmpresa->MEPROVINCIA}}" />
										@endslot
									@endcomponent
								</div>
							</div>
							{{-- Contacto --}}
							<div class="categoriaBloqueFormulario">@lang('texto.form_empresa.contacto')</div>
							<div class="bloqueFormulario">
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
										@slot('nombre', trans('texto.form_empresa.email'))
										@slot('valor')
											<input type="email" class="form-control" name="email" value="{{$datosEmpresa->MECORREOELECT}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', trans('texto.form_empresa.telefono'))
										@slot('valor')
											<input type="text" class="form-control" name="telefono" value="{{$datosEmpresa->METELEFONO}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', trans('texto.form_empresa.fax'))
										@slot('valor')
											<input type="text" class="form-control" name="fax" value="{{$datosEmpresa->MENUMEROFAX}}" />
										@endslot
									@endcomponent
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6" id="columnaDerecha">	
							{{-- AEAT --}}
							<div class="categoriaBloqueFormulario">@lang('texto.form_empresa.aeat')</div>
							<div class="bloqueFormulario">
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', trans('texto.form_empresa.cp_administracion'))
										@slot('valor')
											<input type="text" class="form-control" name="cpAdministracion" value="{{$datosEmpresa->MECODADM}}" data-href="{{ route('listaDelegacionesMin') }}" onclick="listaExtra(this)" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', trans('texto.form_empresa.delegacion'))
										@slot('valor')
											<input type="text" class="form-control" name="delegacion" value="{{$datosEmpresa->MEDELEGACION}}" data-href="{{ route('listaDelegacionesMin') }}" onclick="listaExtra(this)" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', trans('texto.form_empresa.administracion'))
										@slot('valor')
											<input type="text" class="form-control" name="administracion" value="{{$datosEmpresa->MEADMINISTRACION}}" data-href="{{ route('listaDelegacionesMin') }}" onclick="listaExtra(this)" />
										@endslot
									@endcomponent
								</div>
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
										@slot('nombre', trans('texto.form_empresa.criterio_caja'))
										@slot('valor')
											<div class="itemCheckbox">
												<input type="checkbox" class="form-control" id="criterioCaja" name="criterioCaja" @if($datosEmpresa->CRITERIOCAJA == -1) checked @endif />
												<label for="criterioCaja">
													@lang('texto.form_empresa.criterio_caja_label')
												</label>
											</div>
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
	<script>
		function cargaDatosDelegacion(datosDelegacion){
			$('input[name="cpAdministracion"]').val(datosDelegacion.cpAdministracion);
			$('input[name="delegacion"]').val(datosDelegacion.delegacion);
			$('input[name="administracion"]').val(datosDelegacion.administracion);
			extraBar();
		}
	</script>
@endsection
