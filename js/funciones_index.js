$(document).ready(() => {

	$('#up').click(function(){
	    $("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});

	$.ajax({

		type: 'get',
		url: './php/peliculas/controlador_peliculas.php',
		data: {accion: 'ultimos_estrenos'},
		dataType: 'json'

	}).done(function (e) {

		console.log(e.data);

		$.each(e.data, function(index, value) {

	        var html = `
			<div class="carousel-item">
                <img src="./img/carousel.jpg" class="d-block w-100" alt="img-fondo">
                <div class="carousel-caption d-none d-md-block">
                    <h2>${value.titulo}</h2>
                    <p>${value.descripcion}</p>
                </div>
            </div>
	        `;

			$('.carousel-inner').append(html);

		});	

	});

	$.ajax({

		type: 'get',
		url: './php/peliculas/controlador_peliculas.php',
		data: {accion: 'listar'},
		dataType: 'json'

	}).done(function(e) {		

		$.each(e.data, function(index, value) {

	        var html = `
			<tr>
				<td>
					<div class="card mt-3">
						<div class="card-body">
							<blockquote class="blockquote mb-0">
							<p> <strong>${value.titulo}</strong> </p>
							<hr>
				            <p> ${value.descripcion} </p>
				            <hr>      
				            <p> ${value.actores} </p>  
				            <hr> 
				            <p>available in stores: ${value.tiendas} </p>  
				            <hr> 
				            <footer class="blockquote-footer"> ${value.categoria}  -   ${value.duracion}min -  ${value.clasificacion} </footer>
				            <span class="badge badge-success"> ${value.precio} </span>
				            </blockquote>
			            </div>
		            </div>
	            </td>
	        </tr>
	        `;

			$('tbody').append(html);

		});

		$('#tabla').DataTable({
			ordering:  false
		});		
		//$("#pb").remove();
		
		setTimeout(function(){ 
			$('#contenido').removeClass('d-none');
			$('#up').removeClass('d-none');
			$('#pb').remove();
		 }, 700);
	});

})