<div class="seccion-nomina">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
			NUEVO
		</div>
		<div class="card-body">
			<form id="f-nomina">
				<div class="form-group">
	            	<label for="empleado">Empleado</label>
	            	<select class="form-control" name="empleado" id="empleado"></select>
	            </div>
				<div class="form-group">
	            	<label for="tienda">Tienda</label>
	            	<select class="form-control" name="store" id="store"></select>
                </div>
                <div class="form-group">
	            	<label for="dias">Dias laborados</label>
	            	<input type = "text" class="form-control" name="dias" id="dias">
				</div>
				
				<!--<div class="form-group">
	            	<label for="salud">Salud</label>
	            	<input type = "text" class="form-control" name="salud" id="salud" disabled>
				</div>
				<div class="form-group">
	            	<label for="pension">Pension</label>
	            	<input type = "text" class="form-control" name="pension" id="pension"disabled>
				</div>
				<div class="form-group">
	            	<label for="arl">Arl</label>
	            	<input type = "text" class="form-control" name="arl" id="arl" disabled>
				</div>
				<div class="form-group">
	            	<label for="parafiscales">Parafiscales</label>
	            	<input type = "text" class="form-control" name="parafiscales" id="parafiscales" disabled>
				</div>
				<div class="form-group">
	            	<label for="cesantias">Cesantias</label>
	            	<input type = "text" class="form-control" name="cesantias" id="cesantias" disabled>
				</div>
				<div class="form-group">
	            	<label for="interes">Intereses a las cesantias</label>
	            	<input type = "text" class="form-control" name="interes" id="intereses" disabled>
				</div>
				<div class="form-group">
	            	<label for="dotacion">Dotacion</label>
	            	<input type = "text" class="form-control" name="dotacion" id="dotacion" disabled>
				</div>
-->
            	<button type="submit" class="btn btn-primary" id="agregar">Agregar</button>
            	<button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
          </form>
		</div>
	</div>
	<script>
		$("#f-nomina").validate({
			rules: {
				dias: {
      				required: true,
      				minlength: 1
    			}
  			},
			messages:{
				dias: {
					required: "obligatorio",
					minlength: "minimo 1 caracteres"
				}
			},
			submitHandler: function(form) {
  				agregar();
 			}
 		});
	</script>
</div>