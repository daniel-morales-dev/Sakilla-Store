<div class="seccion-pelicula">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
			EDITAR
		</div>
		<div class="card-body">
			<form id="f-pelixcateg">
				<div class="form-group">
	            	<label for="FID">Película id</label>
	            	<input type="text" class="form-control" id="FID" name="FID" readonly>
	            </div>
				<div class="form-group">
	            	<label for="pelicula">Película</label>
	            	<select class="form-control" name="pelicula" id="pelicula"></select>
	            </div>
	            <div class="form-group">
	            	<label for="CID">Categoría id</label>
	            	<input type="text" class="form-control" id="CID" name="CID" readonly>
	            </div>
	            <div class="form-group">
	            	<label for="categoria">Categoria</label>
	            	<select class="form-control" name="categoria" id="categoria"></select>
	            </div>
            	<button type="button" class="btn btn-primary" id="actualizar">Actualizar</button>
            	<button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
          </form>
		</div>
	</div>
</div>