<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro e Inicio de Sesion</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
</head>
<body>
<!--    --------------------------------------NAVBAR---------------------------------------------------------------->
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
              <h1>Inicio de Sesion/registro</h1>
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
    <div class="container">
        <div class="row">
            <div class="col-md-6 form-group">
                <h2>Registro</h2>
                <form action="user.php" method="POST">
            
                    <input type="text" name="nombre" placeholder="Nombre"> <br>
             
                    <input type="text" name="celular" placeholder="Celular"><br>
           
                    <input type="text" name="correo" placeholder="email"><br>
             
                    <input type="text" name="carrera" placeholder="Carrera"><br>
               
                    <input type="text" name="semestre" placeholder="Semestre"><br>
                    <input type="password" name="contrasena" placeholder="********"><br>
                    <input type="password" name="contrasena2" placeholder="Ingrese nuevamente Contraseña"><br>
                    
                    <select name="escoger" id="escoger">
                        <option value="asesor">Asesor</option>
                        <option value="alumnos">Alumno</option>
                    </select><br>
                    
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </form>
            </div>
            <div class="col-md-6">
                <form action="login.php" method="POST">
                   <h2>Login</h2>
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
      
        
          
            
              
                
                  
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>   
</body>
</html>