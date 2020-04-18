<div class="seccion-pago">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
			NUEVO
		</div>
		<div class="card-body">
			<form id="f-pago">
				<div class="form-group">
	            	<label for="cliente">Cliente: </label>
	            	<select class="form-control" name="cliente" id="cliente"></select>
	            </div>
	            <div class="form-group">
	            	<label for="empleado">Empleado: </label>
	            	<select class="form-control" name="empleado" id="empleado"></select>
	            </div>
	            <div class="form-group">
	            	<label for="renta">ID Renta: </label>
	            	<select class="form-control" name="renta" id="id_renta"></select>
	            </div>
	            <div class="form-group">
	            	<label for="costo">Costo: </label>
	            	<input type="text" class="form-control" id="costo" name="costo">
	            </div>
				
			<button type="submit" class="btn btn-primary" id="agregar">Agregar</button>
            <button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
			</form>		
		</div>
	</div>
	<script>
		$("#f-pago").validate({
			rules: {
				costo: {
      				required: true,
      				minlength: 3
    			},
  			},
			messages:{
				costo: {
					required: "obligatorio",
					minlength: "solo numeros"
				}
			},
			submitHandler: function(form) {
  				agregar();
 			}
 		});
	</script>
</div>