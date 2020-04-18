function Iniciar() {

	$("#opciones a").click(function(e) {

     	e.preventDefault();

        var url = $(this).attr("href");

        $.post(url,function(resultado) {

        	if(url!="#"){

                $("#contenedor").removeClass("d-none");
                //$("#contenedor").addClass("show");
                $("#contenido").html(resultado);

            }     		

        });

    });

    $('#up').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });

}
