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
    
    <script>
function validateForm() {
  var x = document.forms["regis"]["contrasena"].value;
  var x2 = document.forms["regis"]["contrasena2"].value;
  
  if(x2!=x){
  	alert("La contraseña no es la misma");
    return false;
  }
}
</script>


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
                <button type="button" class="btn btn-sm text-white" style="background-color: #1976D2;" onclick="location.href='ver_asesorias.php'">Asesorias</button></a>
              </li>
              <?php
                if( isset($_SESSION['alumno'])):
                    $sesion=$_SESSION['alumno'];
                
                ?>
              <li class="nav-item">
                <button type="button" class="btn btn-sm text-white" style="background-color: #1976D2;" onclick="location.href='agenda.php'">Agenda</button></a>
              </li>
              
                <li class="nav-item dropdown">
                 
                  <button type= "button" class="btn btn-sm text-white dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <?php echo 'Bienvenido! '.$sesion;?>
                  </button>
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
                <button type="button" class="btn btn-sm text-white" style="background-color: #1976D2;" onclick="location.href='Administracion.php'">Administración</button></a>
              </li>
                <li class="nav-item dropdown">
                 
                  <button type= "button" class="btn btn-sm text-white dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <?php echo 'Bienvenido! '.$sesion;?>
                  </button>
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
                <button type="button" class="btn btn-sm text-white" style="background-color: #1976D2;" onclick="location.href='form.php'">Registro e Inicio de Sesión</button></a>
                </li> 
                <?php
                endif;
                ?>
              <li class="nav-item">
                <button type="button" class="btn btn-sm text-white" style="background-color: #1976D2;" data-toggle="modal" data-target="#myModal"><span><img src="../img/iconos/1x/baseline_help_outline_white_18dp.png" alt="i"></span> Acerca de</button>
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
<!-- ------------------------------------------FORMULARIOS------------------------------------------------------------------->
   <?php

if(empty($_SESSION['admin']) && empty($_SESSION['alumno'])):
    ?>
    <div class="container">
      <div class="row">
       <div class="col-6">
          <button id="iniciarSesion1" type="button" class="btn btn-outline-dark btn-block" data-target="#iniciarSesion" data-toggle="collapse" aria-expanded="false" aria-controls="iniciarSesion">Iniciar Sesión</button>
       </div>
       <div class="col-6">
          <button id="registro1" type="button" class="btn btn-outline-dark btn-block" data-target="#registro" data-toggle="collapse" aria-expanded="false" aria-controls="registro">Registrarse</button>
        </div>
      </div>
    </div>

      <div class="collapse col-md-6 form-group float-right center" id="registro">
        <div class="container">
          <div class="row">
            <div class="col-md-12 form-group float-right">
              <br> 
              <h4>Registro</h4>
                <form name="regis" action="user.php" method="POST" onsubmit="return validateForm()">
                   <input type="text" class="form-control" name="nombre" placeholder="Nombre" maxlength="30" pattern="[A-Za-z' 'ZñÑáéíóúÁÉÍÓÚ]{2,30}" title="Introduce entre 2 y 30 letras" required>
                   <br>
                   <input type="email" class="form-control" name="correo" placeholder="email" required>
                   <br>
                   <select class="form-control" name="carrera" id="carrera" required>
                       <option value="">Carrera</option>
                       <option value="Ingeniería Ambiental">Ingeniería Ambiental</option>
                       <option value="Ingeniería Civil">Ingeniería Civil</option>
                       <option value="Ingeniería en Computación">Ingeniería en Computación</option>
                        <option value="Ingeniería Eléctrica y Electrónica">Ingeniería Eléctrica y Electrónica</option>
                        <option value="Ingeniería Geofísica">Ingeniería Geofísica</option>
                        <option value="Ingeniería Geológica">Ingeniería Geológica</option>
                        <option value="Ingeniería Geomática">Ingeniería Geomática</option>
                        <option value="Ingeniería Mecánica">Ingeniería Mecánica</option>
                        <option value="Ingeniería Mecatrónica">Ingeniería Mecatrónica</option>
                        <option value="Ingeniería de Minas y Metalurgia">Ingeniería de Minas y Metalurgia</option>
                        <option value="Ingeniería Petrolera">Ingeniería Petrolera</option>
                        <option value="Ingeniería en Sistemas Biomédicos">Ingeniería en Sistemas Biomédicos</option>
                        <option value="Ingeniería en Telecomunicaciones">Ingeniería en Telecomunicaciones</option>
                   </select>
                   <br>
                   <input type="text" class="form-control" name="celular" placeholder="Celular" maxlength="30" pattern="[0-9]{10}" title="Introduce números entre el 1 y 9| Máximo 10 números" required>
                   <br>
                   <select name="semestre" class="form-control" id="semestre" required>
                       <option value="">Semestre</option>
                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                       <option value="6">6</option>
                       <option value="7">7</option>
                       <option value="8">8</option>
                       <option value="9">9</option>
                       <option value="10">10</option>
                   </select>
                   <br>
                   <input type="password" class="form-control" name="contrasena" placeholder="********" required>
                   <br>
                   <input type="password" class="form-control" name="contrasena2" placeholder="Ingrese nuevamente Contraseña" required>
                   <br>
                   <label for="escoger">Elige:</label>
                   <select name="escoger" class="form-control" id="escoger">
                        <option value="asesor">Quiero ser asesor</option>
                        <option value="alumnos">Quiero recibir asesorías</option>
                   </select>
                   <br>
                    
                    
                    <button type="submit" class="btn btn-success btn-block" >Registrarse</button>
                </form>
            </div>
            
        </div>
      </div>
    </div> 
             
    <div class="collapse col-md-6 form-group float-left center" id="iniciarSesion">
      <div class="container" >
        <div class="row">
                  <div class="col-md-12 form-group">
                  <form action="login.php" method="POST">
                      <br>
                      <h4>Iniciar Sesión</h4>
                      <input type="email" class="form-control" name="correo" placeholder="correo" required><br>
                      <input type="password" class="form-control" name="contrasena" placeholder="********" required><br>
                      <select name="escoger" class="form-control" id="escoger">
                      <option value="asesor">Asesor</option>
                    <option value="alumnos">Alumno</option>
                  </select>
                <br>
              <button type="submit" class="btn btn-success btn-block">Iniciar sesion</button>
            </form>
          </div>
        </div>
      </div>          
    </div>  
    
<script>
$(document).ready(function(){
  $(".registro1").click(function(){
    $(".collapse").collapse('hide');
  });
  $(".iniciarSesion1").click(function(){
    $(".collapse").collapse('hide');
  });
});
</script>    
    
    


    
<?php 
    else:
?>
<h3>Ya has iniciado sesión</h3>
<?php 
    endif;
?>
       
        <?php include "footer.php"; ?>   
        <?php include "acercaDe.php"; ?>        
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
</body>
</html>