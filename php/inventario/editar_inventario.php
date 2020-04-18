<div class="seccion-inventario">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
			EDITAR
		</div>
		<div class="card-body">
			<form id="f-inventario">
				<div class="form-group">
	            	<label for="id">Id</label>
	            	<input type="text" class="form-control" id="id" name="id" readonly>
	            </div>
				<div class="form-group">
	            	<label for="film">Pelicula</label>
	            	<select class="form-control" name="film" id="film"></select>
	            </div>
				<div class="form-group">
	            	<label for="store">Tienda</label>
	            	<select class="form-control" name="store" id="store"></select>
	            </div>
            	<button type="button" class="btn btn-primary" id="actualizar">Actualizar</button>
            	<button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
          </form>
		</div>
	</div>
</div>