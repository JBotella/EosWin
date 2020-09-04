@extends('layouts.app')
@section('content')

	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion">
			<span><i class="fas fa-cog icoCab mr-2"></i></span>
			<span>@lang('configuraciones.configuracion_empresa.titulo_configuracion')</span>
		</div>
		@component('components.seccionFormulario')
			<div class="contenidoFormulario">
				<form class="form">
					<div class="row">
						<div class="col-12 col-md-6" id="columnaIzquierda">
						
							{{-- Datos generales --}}
							<div class="categoriaBloqueFormulario">Datos generales</div>
							<div class="bloqueFormulario">
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
										@slot('nombre', 'Código')
										@slot('valor')
											<input type="text" class="form-control" name="codigo" value="{{$datosEmpresa->MENUMEMPRESA}}" readonly disabled />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
										@slot('nombre', 'Nombre')
										@slot('valor')
											<input type="text" class="form-control" name="nombre" value="{{$datosEmpresa->MENOMBRE}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-4 col-md-4 col-lg-4 col-xl-3')
										@slot('nombre', 'NIF/CIF')
										@slot('valor')
											<input type="text" class="form-control" name="nif" value="{{$datosEmpresa->MECIF}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-4 col-md-4 col-lg-4 col-xl-3')
										@slot('nombre', 'CNAE')
										@slot('valor')
											<input type="text" class="form-control" name="cnae" value="{{$datosEmpresa->MECODCNAE}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
										@slot('nombre', 'Actividad')
										@slot('valor')
											<input type="text" class="form-control" name="actividad" value="{{$datosEmpresa->MEACTIVIDAD}}" />
										@endslot
									@endcomponent
								</div>
							</div>
							{{-- Domicilio --}}
							<div class="categoriaBloqueFormulario">Domicilio</div>
							<div class="bloqueFormulario">
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-12 col-md-12 col-lg-12 col-xl-12')
										@slot('nombre', 'Dirección')
										@slot('valor')
											<input type="text" class="form-control" name="domicilio" value="{{$datosEmpresa->MEDOMICILIO}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-3 col-md-3 col-lg-3 col-xl-3')
										@slot('nombre', 'Número')
										@slot('valor')
											<input type="text" class="form-control" name="numero" value="{{$datosEmpresa->MENUM}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-3 col-md-3 col-lg-3 col-xl-3')
										@slot('nombre', 'Escalera')
										@slot('valor')
											<input type="text" class="form-control" name="escalera" value="{{$datosEmpresa->MEESC}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-3 col-md-3 col-lg-3 col-xl-3')
										@slot('nombre', 'Piso')
										@slot('valor')
											<input type="text" class="form-control" name="piso" value="{{$datosEmpresa->MEPISO}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-3 col-md-3 col-lg-3 col-xl-3')
										@slot('nombre', 'Puerta')
										@slot('valor')
											<input type="text" class="form-control" name="puerta" value="{{$datosEmpresa->MEPUERTA}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', 'Código Postal')
										@slot('valor')
											<input type="text" class="form-control" name="cp" value="{{$datosEmpresa->MECP}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', 'Localidad')
										@slot('valor')
											<input type="text" class="form-control" name="localidad" value="{{$datosEmpresa->MELOCALIDAD}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', 'Provincia')
										@slot('valor')
											<input type="text" class="form-control" name="provincia" value="{{$datosEmpresa->MEPROVINCIA}}" />
										@endslot
									@endcomponent
								</div>
							</div>
							{{-- Contacto --}}
							<div class="categoriaBloqueFormulario">Contacto</div>
							<div class="bloqueFormulario">
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', 'E-Mail')
										@slot('valor')
											<input type="email" class="form-control" name="email" value="{{$datosEmpresa->MECORREOELECT}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', 'Teléfono')
										@slot('valor')
											<input type="text" class="form-control" name="telefono" value="{{$datosEmpresa->METELEFONO}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', 'Fax')
										@slot('valor')
											<input type="text" class="form-control" name="fax" value="{{$datosEmpresa->MENUMEROFAX}}" />
										@endslot
									@endcomponent
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6" id="columnaDerecha">	
							{{-- AEAT --}}
							<div class="categoriaBloqueFormulario">AEAT</div>
							<div class="bloqueFormulario">
								<div class="row">
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', 'CP Administración')
										@slot('valor')
											<input type="email" class="form-control" name="email" value="{{$datosEmpresa->MECODADM}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', 'Delegación')
										@slot('valor')
											<input type="text" class="form-control" name="telefono" value="{{$datosEmpresa->MEDELEGACION}}" />
										@endslot
									@endcomponent
									@component('components.itemFormulario')
										@slot('class', 'col-6 col-md-6 col-lg-6 col-xl-6')
										@slot('nombre', 'Administración')
										@slot('valor')
											<input type="text" class="form-control" name="fax" value="{{$datosEmpresa->MEADMINISTRACION}}" />
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

@endsection
