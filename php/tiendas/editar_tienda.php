<div class="seccion-tienda">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
			EDITAR
		</div>
		<div class="card-body">
			<form id="f-tienda">
				<div class="form-group">
			    	<label for="id">Id</label>
			    	<input type="text" class="form-control" id="id" name="id" readonly>
			    </div>
			    <div class="form-group">
			    	<label for="jefe">Jefe</label>
			    	<select class="form-control" name="jefe" id="jefe"></select>
			    </div>
				<hr>
				<label>Direccion</label>
				<div class="form-group">
					<div class="form-row">
					<div class="col-3">
						<input type="text" class="form-control" id="id_dir" name="id_dir" placeholder="id_dir" readonly>
					</div>	
					<div class="col-3">
						<input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion">
					</div>
					<div class="col-3">
						<input type="text" class="form-control" id="distrito" name="distrito" placeholder="distrito">
					</div>
					<div class="col-3">
						<input type="text" class="form-control" id="cod_postal" name="cod_postal" placeholder="cod_postal">
					</div>	                
					</div>
				</div>
				<div class="form-group">
					<div class="form-row">
						<div class="col-3">
							<input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono">
						</div>
						<div class="col-3">
							<select class="form-control" name="ciudad" id="ciudad" title="Ciudad"></select>
						</div> 
					</div>
				</div>
				<hr>
				<button type="submit" class="btn btn-primary" id="actualizar">Actualizar</button>
				<button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
			</form>
		</div>
	</div>
	<script>
		$("#f-tienda").validate({
			rules: {
    			direccion: {
    				required: true,
    			},
    			distrito: {
    				required: true,
    			},
    			cod_postal: {
    				required: true,
    				number: true,
      				minlength: 4
    			},
    			telefono: {
    				required: true,
    				number: true,
      				minlength: 7
    			}
  			},
			messages:{
    			direccion: {
    				required: "obligatorio",
    			},
    			distrito: {
    				required: "obligatorio",
    			},
    			cod_postal: {
    				required: "obligatorio",
    				number: "solo numeros",
      				minlength: "minimo 4 caracteres"
    			},
    			telefono: {
    				required: "obligatorio",
    				number: "solo numeros",
      				minlength: "minimo 7 caracteres"
    			}
			},
			submitHandler: function(form) {
  				actualizar();
 			}
 		});
	</script>
</div>