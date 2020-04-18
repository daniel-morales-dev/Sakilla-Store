<div class="seccion-pelicula">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
			EDITAR
		</div>
		<div class="card-body">
			<form id="f-pelicula">
				<div class="form-group">
	            	<label for="id">Id</label>
	            	<input type="text" class="form-control" id="id" name="id" readonly>
	            </div>
	            <div class="form-group">
	            	<label for="titulo">Titulo</label>
	            	<input type="text" class="form-control" id="titulo" name="titulo">
	            </div>
	            <div class="form-group">
	            	<label for="descripcion">Descipcion</label>
	            	<textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
	            </div>
	            <div class="form-group">
	            	<label for="lanzamiento">Lanzamiento</label>
	            	<input type="text" class="form-control" id="lanzamiento" name="lanzamiento">
	            </div>
	            <div class="form-group">
	            	<label for="idioma">Idioma</label>
	            	<select class="form-control" name="idioma" id="idioma"></select>
	            </div>
	            <div class="form-group">
	            	<label for="prestamo">Prestamo(dias)</label>
	            	<input type="text" class="form-control" id="prestamo" name="prestamo">
	            </div>
	            <div class="form-group">
	            	<label for="precio">Precio</label>
	            	<input type="text" class="form-control" id="precio" name="precio">
	            </div>
	            <div class="form-group">
	            	<label for="duracion">Duracion</label>
	            	<input type="text" class="form-control" id="duracion" name="duracion">
	            </div>
	            <div class="form-group">
	            	<label for="perdida">Costo por perdida</label>
	            	<input type="text" class="form-control" id="perdida" name="perdida">
	            </div>
				<div class="form-group">
	            	<label for="clasificacion">Clasificacion</label>
	            	<select class="form-control" name="clasificacion" id="clasificacion">
	            		<option value="G">G</option>
	            		<option value="PG">PG</option>
	            		<option value="PG-13">PG-13</option>
	            		<option value="R">R</option>
	            		<option value="NC-17">NC-17</option>
	            	</select>
	            </div>
	            <label>Extras</label>
				<hr>
	            <div class="form-check">
				  	<input class="form-check-input" type="checkbox" name="extras[]" value="Trailers" id="Trailers">
				  	<label class="form-check-label" for="Trailers">Trailers</label> <br>
				  	<input class="form-check-input" type="checkbox" name="extras[]" value="Commentaries" id="Commentaries">
				  	<label class="form-check-label" for="Commentaries">Commentaries</label> <br>
				  	<input class="form-check-input" type="checkbox" name="extras[]" value="Deleted Scenes" id="DeletedScenes">
				  	<label class="form-check-label" for="DeletedScenes">Deleted Scenes</label> <br>
				  	<input class="form-check-input" type="checkbox" name="extras[]" value="Behind the Scenes" id="BehindtheScenes">
				  	<label class="form-check-label" for="BehindtheScenes">Behind the Scenes</label>
				</div>
				<hr>
            	<button type="submit" class="btn btn-primary" id="actualizar">Actualizar</button>
            	<button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
          </form>
		</div>
	</div>
	<script>
		$("#f-pelicula").validate({
			rules: {
				titulo: "required",
				descripcion: "required",
    			lanzamiento: {
    				required: true,
    				number: true
    			},
    			prestamo: {
    				required: true,
    				number: true
    			},
    			precio: {
    				required: true,
    				number: true
    			},
    			duracion: {
    				required: true,
    				number: true
    			},
    			perdida: {
    				required: true,
    				number: true
    			}
  			},
			messages:{
				titulo: {
					required: "obligatorio"
				},
				descripcion: {
					required: "obligatorio"
				},
				lanzamiento: {
    				required: "obligatorio",
    				number: "solo numeros"
    			},
    			prestamo: {
    				required: "obligatorio",
    				number: "solo numeros"
    			},
    			precio: {
    				required: "obligatorio",
    				number: "solo numeros"
    			},
    			duracion: {
    				required: "obligatorio",
    				number: "solo numeros"
    			},
    			perdida: {
    				required: "obligatorio",
    				number: "solo numeros"
    			}
			},
			submitHandler: function(form) {
  				actualizar();
 			}
 		});
	</script>
</div>