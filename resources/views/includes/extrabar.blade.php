<div class="menuLateral_extra @if(isset($extrabar) and $extrabar == 'visible') mLExtraVisible @endif">
	<div class="menuLateral_extraCab">
		<i class="fas fa-angle-double-right btnPlegar btnAccion" onclick="extraBar()"></i>
		<div class="menuLateral_extraCabInt">
		
		{{-- --}}
			<input type="text" class="form-control form-control-sm" name="buscador" id="buscador" placeholder="Buscar...">
		{{-- --}}
		
		</div>
	</div>
	<div class="menuLateral_extraInt"></div>
</div>
