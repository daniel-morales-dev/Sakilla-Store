<div class="seccion-cliente">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
			EDITAR
		</div>
		<div class="card-body">
			<form id="f-cliente">
				<div class="form-group">
	            	<label for="id">Id</label>
	            	<input type="text" class="form-control" id="id" name="id" readonly>
	            </div>
				<div class="form-group">
	            	<label for="tienda">Tienda</label>
	            	<select class="form-control" name="tienda" id="tienda"></select>
	            </div>
	            <div class="form-group">
	            	<label for="nombre">Nombre</label>
	            	<input type="text" class="form-control" id="nombre" name="nombre">
	            </div>
	            <div class="form-group">
	            	<label for="apellido">Apellido</label>
	            	<input type="text" class="form-control" id="apellido" name="apellido">
	            </div>
	            <div class="form-group">
	            	<label for="email">Email</label>
	            	<input type="text" class="form-control" id="email" name="email">
	            </div>
	            <div class="form-group form-check">
					<input class="form-check-input" type="checkbox" value="1" id="estado" name="estado">
					<label class="form-check-label" for="estado">Activo</label>
				</div>
				<hr>
				<label>Direccion</label>
				<div class="form-group">
					<div class="form-row">
						<div class="col-3">
							<input type="text" class="form-control" id="id_dir" name="id_dir" placeholder="id" readonly>
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
							<select class="form-control" name="ciudad" id="ciudad" title="Cuidad"></select>
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
		$("#f-cliente").validate({
			rules: {
				nombre: {
      				required: true,
      				minlength: 3
    			},
				apellido: {
      				required: true,
      				minlength: 3
    			},
    			email: {
    				required: true,
    				email: true
    			},
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
				nombre: {
					required: "obligatorio",
					minlength: "minimo 3 caracteres"
				},
				apellido: {
					required: "obligatorio",
					minlength: "minimo 3 caracteres"
				},
				email: {
    				required: "obligatorio",
    				email: "escriba un email valido"
    			},
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