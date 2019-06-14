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
  <!--Titulo 1: asesorias a cursar-->
<!--
  <div class= "container">
    <div class="row ">
      <div class="col-12 bg-primary"><h3 class="text-center">Inicio de sesion</h3></div>
    </div>
  </div>
-->
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
                        <option value="Ingeniería de Minas y Metalurgia">Ingeniería de Minas y Metalurgia</option>
                        <option value="Ingeniería Petrolera">Ingeniería Petrolera</option>
                        <option value="Ingeniería en Sistemas Biomédicos">Ingeniería en Sistemas Biomédicos</option>
                        <option value="Ingeniería en Telecomunicaciones">Ingeniería en Telecomunicaciones</option>
                   </select>
                   <br>
                   <input type="text" class="form-control" name="celular" placeholder="Celular" maxlength="30" pattern="[0-9]{10}" title="Introduce números entre el 1 y 9" required>
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
                   <select name="escoger" class="form-control" id="escoger">
                        <option value="asesor">Asesor</option>
                        <option value="alumnos">Alumno</option>
                   </select>
                   <br>
                    
                    
                    <button type="submit" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">Registrarse</button>
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
    
<!--
    <div class="container collapse" id="registro">
        <div class="row">
            <div class="col-md-6 form-group float-right">
                <h2>Registro</h2>
                <form action="user.php" method="POST" class="was-validated">
                <div class="form-group">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                    <div class="valid-feedback">:).</div>
                    <div class="invalid-feedback">Falta nombre.</div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="correo" placeholder="email" required>
                    <div class="valid-feedback">:).</div>
                    <div class="invalid-feedback">Falta correo.</div>
                    <div id="checkusername" class=""></div>
                </div>
                <div class="form-group">
                    <select class="form-group" name="carrera" id="carrera">
                       <option selected>Carrera</option>
                        <option value="Ingeniería Ambiental">Ingeniería Ambiental</option>
                        <option value="Ingeniería Civil">Ingeniería Civil</option>
                        <option value="Ingeniería en Computación">Ingeniería en Computación</option>
                        <option value="Ingeniería Eléctrica y Electrónica">Ingeniería Eléctrica y Electrónica</option>
                        <option value="Ingeniería Geofísica">Ingeniería Geofísica</option>
                        <option value="Ingeniería Geológica">Ingeniería Geológica</option>
                        <option value="Ingeniería Geomática">Ingeniería Geomática</option>
                        <option value="Ingeniería Mecánica">Ingeniería Mecánica</option>
                        <option value="Ingeniería de Minas y Metalurgia">Ingeniería de Minas y Metalurgia</option>
                        <option value="Ingeniería Petrolera">Ingeniería Petrolera</option>
                        <option value="Ingeniería en Sistemas Biomédicos">Ingeniería en Sistemas Biomédicos</option>
                        <option value="Ingeniería en Telecomunicaciones">Ingeniería en Telecomunicaciones</option>
                    </select><br>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="celular" placeholder="Celular" required>
                    <div class="valid-feedback">:).</div>
                    <div class="invalid-feedback">Falta celular.</div>
                </div>
                <div class="form-group">
                    <select name="semestre" id="semestre">
                      <option selected>Semestre</option>
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

                    </select><br>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="contrasena" placeholder="********" required>
                    <div class="valid-feedback">:).</div>
                    <div class="invalid-feedback">Falta contraseña.</div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="contrasena2" placeholder="Ingrese nuevamente Contraseña" required>
                    <div class="valid-feedback">:).</div>
                    <div class="invalid-feedback">Ingrese nuevamente.</div>
                </div>
                <div class="form-group">
                    <select name="escoger" id="escoger">
                        <option value="asesor">Asesor</option>
                        <option value="alumnos">Alumno</option>
                    </select><br>
                </div>
                    
                    
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Registrarse</button>
                </form>
            </div>
            
        </div>
    </div>
-->
    

    
<!--
    <div class="container collapse" id="iniciarSesion">
        <div class="row">
            <div class="col-md-6">
                <form action="login.php" method="POST" class="was-validated">
                  <br>
                   <h2>Iniciar Sesión</h2>
                    <input type="text" name="correo" placeholder="correo"><br>
                    <input type="password" name="contrasena" placeholder="********"><br>
                    <select name="escoger" id="escoger">
                        <option value="asesor">Asesor</option>
                        <option value="alumnos">Alumno</option>
                    </select><br>
                    <button type="sunmit" class="btn btn-primary">Iniciar sesion</button>
                </form>
            </div>
        </div>
    </div>
-->
    

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
        
          
            
              
                
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
</body>
</html>