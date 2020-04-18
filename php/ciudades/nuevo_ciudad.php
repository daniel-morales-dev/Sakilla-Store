<div class="seccion-ciudad">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
			NUEVO
		</div>
		<div class="card-body">
			<form id="f-ciudad">
	            <div class="form-group">
					<label for="ciudad">Ciudad</label>
					<input type="text" class="form-control" id="ciudad" name="ciudad">
	            </div>
	            <div class="form-group">
	            	<label for="pais">Pais</label>
	            	<select class="form-control" name="pais" id="pais"></select>
	            </div>
            	<button type="submit" class="btn btn-primary" id="agregar">Agregar</button>
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
				agregar();
 			}
 		});
	</script>
</div>