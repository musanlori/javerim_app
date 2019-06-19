<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro e Inicio de Sesion</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/iconos/javerim.png" >
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css_javerim/javerim_style.css">
</head>
<body>

<!-------------------------------------------------NavBar--------------------------------------------------------->
  <!--barra de navegacion-->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1976D2;">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#opciones" >
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <!-- logo -->
          <a class="navbar-brand" href="#">
            <img src="../img/iconos/javerim.ico" width="50" height="50" alt="javerin_ico">
          </a>
          
          <!-- enlaces -->
          <div class="collapse navbar-collapse" id="opciones">   
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link " href="ver_asesorias.php">Asesorías</a>
              </li>
              <?php
                if( isset($_SESSION['alumno'])):
                    $sesion=$_SESSION['alumno'];
                
                ?>
              <li class="nav-item">
                <a class="nav-link" href="agenda.php">Agenda</a>
              </li>
              
                <li class="nav-item dropdown">
                 
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <?php echo 'Bienvenido! '.$sesion;?>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="cerrar.php">Cerrar Sesión</a>
                  </div>
              </li>
            <?php
                endif;
                ?>  
              <?php
                if( isset($_SESSION['admin'])):
                    $sesion=$_SESSION['admin'];
                
                ?>
                <li class="nav-item">
                <a class="nav-link" href="Administracion.php">Administracion</a>
              </li>
                <li class="nav-item dropdown">
                 
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <?php echo 'Bienvenido! '.$sesion;?>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="cerrar.php">Cerrar Sesión</a>
                  </div>
              </li>
            
            <?php
                endif;
                ?> 
                <?php
                if(empty($_SESSION['admin']) && empty($_SESSION['alumno'])):
                
                ?>
                <li class="nav-item">
                <a class="nav-link" href="form.php">Registro e Inicio</a>
                </li> 
                <?php
                endif;
                ?>
                <li class="nav-item">
                <button type="button" class="btn btn-sm text-white" style="background-color: #1976D2;" data-toggle="modal" data-target="#myModal"> ? Acerca De</button>
              </li>          
            </ul>
          </div>
        </nav>
        <!--Titulo-->
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 text-center">
              <img src="../img/javerim_loging.jpg" class="img-fluid" alt="login" width="512">
            </div>
          </div>
        </div>
        
        
        <div class="container fluid">
            <div class="row">
                <div class=" col alert alert-success">
                  <p class="text-center blockquote">
                      ¡Ya puedes iniciar Sesión! <br>
                      Para permanecer en la plataforma es necesario mandar un foto de tu credencial o tira de materias al correo <a href="mailto:javerim.app@gmail.com">javerim.app@gmail.com</a> junto con el correo con el que te inscribiste. <br>
                      También puedes asistir al Laboratorio de UNAM mobile ubicado en el Anexo de ingeniería Edicio Q Salón 308. <br>
                      Tienes hasta el <b><?php $fecha_actual = date("d-m-Y", time() - 25200);
                      echo date("d-m-Y",strtotime($fecha_actual."+ 7 days"));?></b>
                    
                    <br>
                    <button class="btn btn-success"><a href="form.php" class="text-white blockquote">Iniciar Sesión</a></button>
                    
                    
                  </p>
                    
                </div>
            </div>
        </div>
        
          
            
              
        <?php include "acercaDe.php"; ?>        
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
</body>
</html>