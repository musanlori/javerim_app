<?php
session_start();
//------------------------SE NECESITA TENER LA UNA SESION INICIADA PARA VER ESTA PAGINA
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administración</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
</head>
<body>
<!--  -----------------------------------NAVBAR-------------------------------------------------------------------------->
    <!--barra de navegacion-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#opciones">
        <span class="navbar-toggler-icon"></span>
      </button>

    <!-- logo -->
      <a class="navbar-brand" href="#">
        <img src="../img/iconos/unam.jpg" width="30" height="30" alt="">
      </a>

          <!-- enlaces -->
          <div class="collapse navbar-collapse" id="opciones">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="ver_asesorias.php">Asesorías</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Administracion.php">Administracion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="agenda.php">Agenda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">acerca de</a>
              </li>
            </ul>
          </div>
        </nav>
        <!--Titulo-->
        <div class="container">
          <div class="row">
            <div class="col-6">
              <h1>BIENVENIDO</h1>
            </div>
          </div>
        </div>
<!----------------------------------------SESION----------------------------------------------------------------->
  
<?php
//------------------------SE NECESITA TENER LA UNA SESION INICIADA PARA VER ESTA PAGINA
if( isset($_SESSION['admin']) ){
    echo 'Bienvenido! '.$_SESSION['admin'];
    echo '<br><a href="cerrar.php">Cerrar Sesión</a>';
}else{
    header('Location:form.php');
}



?> 
   
   
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    
</body>
</html>