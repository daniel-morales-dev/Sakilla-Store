<div class="seccion-pais">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
			EDITAR
		</div>
		<div class="card-body">
			<form id="f-pais">
				<div class="form-group">
	            	<label for="id">Id</label>
	            	<input type="text" class="form-control" id="id" name="id" readonly>
	            </div>
	            <div class="form-group">
	            	<label for="pais">Pais</label>
	            	<input type="text" class="form-control" id="pais" name="pais">
	            </div>
            	<button type="submit" class="btn btn-primary" id="actualizar">Actualizar</button>
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
				actualizar();
 			}
 		});
	</script>
</div>