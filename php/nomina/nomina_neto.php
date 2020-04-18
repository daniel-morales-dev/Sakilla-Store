<?php
    include_once("modelo_nomina.php");
    $tsalud = $_POST["tsalud"];
    $tpension = $_POST["tpension"];
    $tarl = $_POST["tarl"];
    $tparafiscales = $_POST["tparafiscales"];
    $tcesantia = $_POST["tcesantias"];
    $tinteres = $_POST["tinteres"];
    $tdotacion = $_POST["tdotacion"];
    $totalsalario =$__POST["totalsalario"];
   
    $unanomina = new nomina($tsalud,$tpension,$tarl,$tparafiscales,$tcesantia,$tinteres,$tdotacion,$totalsalario);

    $unanomina->salud();
    $unanomina->pension();
    $unanomina->arl();
    $unanomina->parafiscales();
    $unanomina->cesantias();
    $unanomina->interes();
    $unanomina->dotacion();
    $unanomina->totalsalario();
    
?>

<div class="seccion-nomina">
	<div class="card border-primary">
		<div class="card-header bg-primary text-white">
		</div>
		<div class="card-body">
			<form id="f-nomina">
				<div class="form-group">
	            	<label for="empleado">Empleado</label>
	            	<select class="form-control" name="empleado" id="empleado"></select>
	            </div>
				<div class="form-group">
	            	<label for="tienda">Tienda</label>
	            	<select class="form-control" name="store" id="store"></select>
                </div>
                <div class="form-group">
	            	<label for="dias">Dias laborados</label>
	            	<input type = "text" class="form-control" name="dias" id="dias">
				</div>
				<div class="form-group">
	            	<label for="total">Neto a pagar</label>
                    <input type = "text" class="form-control" name="total " id="total" 
                    disabled="disabled" value='<?php echo $unanomina->totalsalario(); ?>' >
				</div>
                </div>
        