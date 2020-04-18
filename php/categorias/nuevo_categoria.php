<div class="seccion-categoria">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
			NUEVO
		</div>
		<div class="card-body">
			<form id="f-categoria">
	            <div class="form-group">
	            	<label for="categoria">Categoria</label>
	            	<input type="text" class="form-control" id="categoria" name="categoria">
	            </div>
            	<button type="submit" class="btn btn-primary" id="agregar">Agregar</button>
            	<button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
          </form>
		</div>
	</div>
	<script>
		$("#f-categoria").validate({
			rules: {
				categoria: "required" 
  			},
			messages:{
				categoria: {
					required: "obligatorio"
				},
			},
			submitHandler: function() {
				agregar();
 			}
 		});
	</script>
</div>