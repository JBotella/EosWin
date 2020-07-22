<form class="form">
	<div class="form-row">
		<div class="col-12">
			<label for="validationDefault01">Nombre</label>
			<input type="text" class="form-control" id="validationDefault01" placeholder="Nombre" value="Juan" required>
		</div>
		<div class="col-12">
			<label for="validationDefault02">Apellido</label>
			<input type="text" class="form-control" id="validationDefault02" placeholder="Apellido" value="Botella" required>
		</div>
		<div class="col-12">
			<label for="validationDefaultUsername">Usuario</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="inputGroupPrepend2">@</span>
				</div>
				<input type="text" class="form-control" id="validationDefaultUsername" placeholder="Usuario" aria-describedby="inputGroupPrepend2" required>
			</div>
		</div>
	</div>
	<div class="form-row">
		<div class="col-12">
			<label for="validationDefault04">País</label>
			<input type="text" class="form-control" id="validationDefault04" placeholder="País" required>
		</div>
		<div class="col-12">
			<label for="validationDefault03">Localidad</label>
			<input type="text" class="form-control" id="validationDefault03" placeholder="Localidad" required>
		</div>
		<div class="col-12">
			<label for="inputState">Provincia</label>
			<select id="inputState" class="form-control custom-select">
				<option selected>Elegir...</option>
				<option>...</option>
				<option>...</option>
				<option>...</option>
				<option>...</option>
			</select>
		</div>
		<div class="col-12">
			<label for="validationDefault05">CP</label>
			<input type="text" class="form-control" id="validationDefault05" placeholder="CP" required>
		</div>
	</div>
	<div class="form-row">
		<div class="col-12">
			<label for="validationDefault07">Texto</label>
			<textarea class="form-control" id="validationDefault07">Texto de textarea</textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="form-check">
			<input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
			<label class="form-check-label" for="invalidCheck2">
				Acepto términos y condiciones
			</label>
		</div>
	</div>
	<div class="form-row">
		<div class="col-12 text-right">
			<button class="btn btn-form" type="submit">Aplicar</button>
		</div>
	</div>
</form>
