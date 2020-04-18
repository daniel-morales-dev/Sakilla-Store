<div class="seccion-actor">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
			EDITAR
		</div>
		<div class="card-body">
			<form id="f-actor">
				<div class="form-group">
	            	<label for="id">Id</label>
	            	<input type="text" class="form-control" id="id" name="id" readonly>
	            </div>
	            <div class="form-group">
	            	<label for="nombre">Nombre</label>
	            	<input type="text" class="form-control" id="nombre" name="nombre">
	            </div>
	            <div class="form-group">
	            	<label for="apellido">Apellido</label>
	            	<input type="text" class="form-control" id="apellido" name="apellido">
	            </div>
            	<button type="submit" class="btn btn-primary" id="actualizar">Actualizar</button>
            	<button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
          </form>
		</div>
	</div>
	<script>
		$("#f-actor").validate({
			rules: {
				nombre: {
      				required: true,
      				minlength: 3
    			},
				apellido: {
      				required: true,
      				minlength: 3
    			}
  			},
			messages:{
				nombre: {
					required: "obligatorio",
					minlength: "minimo 3 caracteres"
				},
				apellido: {
					required: "obligatorio",
					minlength: "minimo 3 caracteres"
				}
			},
			submitHandler: function(form) {
  				actualizar();
 			}
 		});
	</script>
</div>