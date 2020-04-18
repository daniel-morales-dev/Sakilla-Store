<?php 
  
  session_start();

  if (!isset($_SESSION['rol']) || $_SESSION['rol']!='admin') {
    header('location: ../index.html');
  }

 ?>

<!DOCTYPE html>
<html lang="es">

  <head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../jquery/data-table/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>

  <body>

  	<nav class="navbar navbar-dark bg-primary">
      <a class="navbar-brand" href="index.html">
        <img src="../img/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        <b>SAKILA</b>
      </a>
      <ul class="navbar-nav mr-auto">
        <!-- opciones de la barra -->
      </ul>
      <form class="form-inline" action="./sesion/logout.php" method="POST">
        <label class="navbar-brand"><span class="badge badge-pill badge-light"><?php echo $_SESSION['rol'].' - '.$_SESSION['usuario'] ?></span></label>
        <button class="btn btn-danger my-2 my-sm-0" type="submit">Cerrar sesion</button> 
      </form>
    </nav>
  	
    <div class="container p-5" style="background-color: rgba(0,0,0,0.7); min-height: 100vh;">
      <div class="card border-primary">
        <div class="card-header bg-primary text-white">
          ADMNISTRAR
        </div>
        <div class="card-body">
          <ul class="nav nav-tabs" id="opciones">
            <li class="nav-item">
              <a class="nav-link" href="actores/index.php">Actores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="categorias/index.php">Categorías</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ciudades/index.php">Ciudades</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="empleados/index.php">Empleados</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="idiomas/index.php">Idiomas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="paises/index.php">Países</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="peliculas/index.php">Películas</a>
            </li> -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Películas
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="peliculas/index.php">Ver películas</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="pelixactor/index.php">Asignar actores</a>         
                <a class="dropdown-item" href="pelixcategoria/index.php">Asignar categorias</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tiendas/index.php">Tiendas</a>
            </li>
          </ul>

          <div class="card-body mt-2" id="contenedor">
            <div id="contenido">
              <div class="jumbotron jumbotron-fluid" style="margin-top: 2rem">
                <div class="container">
                  <h1 class="display-4">Bienvenido <?php echo $_SESSION['usuario'] ?></h1>
                  <p class="lead">espacio de trabajo para administradores</p>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>

    <a id="up" class="flotante" href="#"><img src="../img/flecha.png" alt="flecha"></a>
      
    <script src="../jquery/jquery.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../jquery/data-table/jquery.dataTables.min.js"></script>
    <script src="../jquery/data-table/dataTables.bootstrap4.min.js"></script>
    <script src="../jquery/data-table/jquery-ui.min.js"></script>
    <script src="../sweetalert/sweetalert2.all.js"></script>
    <script src="../jquery/jquery.validate.min.js"></script>
    
    <script src="../js/funciones_jquery.js"></script>

    <script>
      $(document).ready(Iniciar);
    </script>
    
  </body>

</html>