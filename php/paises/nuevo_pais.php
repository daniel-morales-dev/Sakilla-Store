<div class="seccion-pais">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
			NUEVO
		</div>
		<div class="card-body">
			<form id="f-pais">
	            <div class="form-group">
	            	<label for="pais">Pais</label>
	            	<input type="text" class="form-control" id="pais" name="pais">
	            </div>
            	<button type="submit" class="btn btn-primary" id="agregar">Agregar</button>
            	<button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
          </form>
		</div>
	</div>
	<script>
		$("#f-pais").validate({
			rules: {
				pais: "required" 
  			},
			messages:{
				pais: {
					required: "obligatorio"
				},
			},
			submitHandler: function() {
				agregar();
 			}
 		});
	</script>
</div>