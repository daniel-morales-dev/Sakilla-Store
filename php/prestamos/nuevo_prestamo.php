<div class="seccion-prestamo">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
			NUEVO
		</div>
		<div class="card-body">
			<form id="f-prestamo">
				<div class="form-group">
	            	<label for="cliente">Cliente</label>
	            	<select class="form-control" name="cliente" id="cliente"></select>
	            </div>
				<div class="form-group">
	            	<label for="inventario">Pelicula</label>
	            	<select class="form-control" name="inventario" id="inventario"></select>
				</div>
				<div class="form-group">
	            	<label for="duracion">Dias del prestamo</label>
	            	<input type="text" class="form-control" name="duracion" id="duracion" readonly>
				</div>
				<div class="form-group">
	            	<label for="empleado">Empleado</label>
	            	<input type="text" class="form-control" name="empleado" id="empleado" readonly>
	            </div>
            	<button type="button" class="btn btn-primary" id="agregar">Agregar</button>
            	<button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
          </form>
		</div>
	</div>
</div>