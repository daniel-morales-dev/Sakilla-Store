<div class="seccion-prestamo">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
			NUEVO
		</div>
		<div class="card-body">
			<form id="f-prestamo">
				<div class="form-group">
	            	<label for="cliente">Cliente</label>
	            	<input type="text" class="form-control" name="cliente" id="cliente" readonly>
	            </div>
				<div class="form-group">
	            	<label for="empleado">Empleado</label>
	            	<input type="text" class="form-control" name="empleado" id="empleado" readonly>
				</div>
				<div class="form-group">
	            	<label for="prestamo">Prestamo</label>
	            	<input type="text" class="form-control" name="prestamo" id="prestamo" readonly>
				</div>
				<div class="form-group">
	            	<label for="costo">Costo</label>
	            	<input type="text" class="form-control" name="costo" id="costo" readonly>
	            </div>
            	<button type="button" class="btn btn-primary" id="pagar">Pagar</button>
            	<button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
          </form>
		</div>
	</div>
</div>