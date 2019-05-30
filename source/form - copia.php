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
    <script scr="validar.js"></script>
</head>
<body>

<!-------------------------------------------------NavBar--------------------------------------------------------->
  <!--barra de navegacion-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-jav">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#opciones" >
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
                <a class="nav-link " href="ver_asesorias.php">Asesorías</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Administracion.php">Administracion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="agenda.php">Agenda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="form.php">Registro e Inicio</a>
              </li> 
              <li>
                <a class="nav-link" href="#">acerca de</a>
              </li>
              
              <li class="nav-item">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Dropdown button
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Link 1</a>
                    <a class="dropdown-item" href="#">Link 2</a>
                    <a class="dropdown-item" href="#">Link 3</a>
                  </div>
              </li>
                         
            </ul>
          </div>
        </nav>
        <!--Titulo-->
        <div class="container">
          <div class="row">
            <div class="col-6">
              <h1>Registro e inicio de Sesión</h1>
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
if( isset($_SESSION['admin']) ):
    $sesion=$_SESSION['admin'];
    echo 'ya has iniciado sesión '.$sesion;
    echo '<br><a href="cerrar.php">Cerrar Sesión</a>';
else:
    ?>
    <div class="text-center">
       <div class="btn-group btn-group-lg btn-center">
          <button id="iniciarSesion1" type="button" class="btn btn-primary" data-target="#iniciarSesion" data-toggle="collapse" aria-expanded="false" aria-controls="iniciarSesion">Iniciar Sesión</button>
          <button id="registro1" type="button" class="btn btn-primary" data-target="#registro" data-toggle="collapse" aria-expanded="false" aria-controls="registro">Registrarse</button>
          <br>
          
        </div>
        
    </div>

    <div class="collapse col-md-6 form-group float-right center" id="registro">
       <div class="container">
           <div class="row">
               <div class="col-md-6 form-group float-right">
                    <h2>Registro</h2>
                    <form action="user.php" method="POST" class="form-register" onsubmit="return validar(this);">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                            <input type="text" class="form-control" id="correo" name="correo" placeholder="email" required>
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
                            <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" required>
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
                            <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="********" required>
                            <input type="password" class="form-control" id="contrasena2" name="contrasena2" placeholder="Ingrese nuevamente Contraseña" required>
                            <select name="escoger" id="escoger">
                                <option value="asesor">Asesor</option>
                                <option value="alumnos">Alumno</option>
                            </select><br>
                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Registrarse</button>
                </form>
            </div>
            
        </div>
    </div>
            </div> 
             
    <div class="collapse col-md-6 form-group float-left center" id="iniciarSesion">
            <div class="container" >
                <div class="row">
                    <div class="col-md-6 form-group">
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
    
<div class="modal" >
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Ya puedes iniciar Sesión</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
    
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
    
    
<script>
if($("#cat option:selected").val() == 0) {
    alert("Debe Seleccionar una categoria");
    return false;
}
</script>

<script>


    </script>
<?php endif;
?>
        
          
            
              
                
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
</body>
</html>