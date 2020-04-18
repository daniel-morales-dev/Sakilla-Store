<div class="seccion-actor">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
			NUEVO
		</div>
		<div class="card-body">
			<form id="f-actor">
	            <div class="form-group">
	            	<label for="nombre">Nombre</label>
	            	<input type="text" class="form-control" id="nombre" name="nombre">
	            </div>
	            <div class="form-group">
	            	<label for="apellido">Apellido</label>
	            	<input type="text" class="form-control" id="apellido" name="apellido">
	            </div>
            	<button type="submit" class="btn btn-primary" id="agregar">Agregar</button>
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
			submitHandler: function() {
				agregar();
 			}
 		});
	</script>
</div>