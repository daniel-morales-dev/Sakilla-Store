<div class="seccion-categoria">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
			EDITAR
		</div>
		<div class="card-body">
			<form id="f-categoria">
				<div class="form-group">
	            	<label for="id">Id</label>
	            	<input type="text" class="form-control" id="id" name="id" readonly>
	            </div>
	            <div class="form-group">
	            	<label for="categoria">Categoria</label>
	            	<input type="text" class="form-control" id="categoria" name="categoria">
	            </div>
            	<button type="submit" class="btn btn-primary" id="actualizar">Actualizar</button>
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
				actualizar();
 			}
 		});
	</script>
</div>