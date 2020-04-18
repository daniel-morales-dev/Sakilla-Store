<div class="seccion-ciudad">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
			EDITAR
		</div>
		<div class="card-body">
			<form id="f-ciudad">
				<div class="form-group">
	            	<label for="id">Id</label>
	            	<input type="text" class="form-control" id="id" name="id" readonly>
	            </div>
	            <div class="form-group">
					<label for="ciudad">Ciudad</label>
					<input type="text" class="form-control" id="ciudad" name="ciudad">
	            </div>
	            <div class="form-group">
	            	<label for="pais">Pais</label>
	            	<select class="form-control" name="pais" id="pais"></select>
	            </div>
            	<button type="submit" class="btn btn-primary" id="actualizar">Actualzar</button>
            	<button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
          </form>
		</div>
	</div>
	<script>
		$("#f-ciudad").validate({
			rules: {
				pais: "required"
			messages:{
				pais: {
					required: "obligatorio"
				}
			submitHandler: function() {
				actualizar();
 			}
 		});
	</script>
</div>