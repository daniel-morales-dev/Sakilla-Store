<div class="seccion-pelicula">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
			EDITAR
		</div>
		<div class="card-body">
			<form id="f-pelixactor">
				<div class="form-group">
	            	<label for="FID">Película id</label>
	            	<input type="text" class="form-control" id="FID" name="FID" readonly>
	            </div>
				<div class="form-group">
	            	<label for="pelicula">Película</label>
	            	<select class="form-control" name="pelicula" id="pelicula"></select>
	            </div>
	            <div class="form-group">
	            	<label for="AID">Actor id</label>
	            	<input type="text" class="form-control" id="AID" name="AID" readonly>
	            </div>
	            <div class="form-group">
	            	<label for="actor">Actor</label>
	            	<select class="form-control" name="actor" id="actor"></select>
	            </div>
            	<button type="button" class="btn btn-primary" id="actualizar">Actualizar</button>
            	<button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
          </form>
		</div>
	</div>
</div>