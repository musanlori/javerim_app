<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Panel de Asesorias</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie-edge">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css_javerim/javerim_style.css">
    </head>
    <body>
        <!-- Empieza el Contenido -->
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
        <br><br>
        <div class="container">
          <div class="row">
            <div class="col-6 titulo-act text-center">
              <a href="ver_asesorias.php"><h3 class="text-act">Asesorías</h3></a>
            </div>
            <div class="col-6 titulo-nac text-center">
              <a href="agenda.php"><h3 class="text-nac">Agenda</h3></a>
            </div>
          </div>
        </div>
  <!--Mensage-->
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <p class="h3">Elige una asesoría que desees tomar</p>
        </div>
      </div>
    </div>
  <?php
    try {
      //CONECCION 
      /*$servername = "localhost";
      $username = "root";
      $password = "J4v3rIm4pp_Db";
      $dbname = "javerim";*/
        include_once 'infoDb.php';

      try {
          $conn = new PDO("mysql:host=$servername;dbname=javerim", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //echo "Connected successfully"; 
          }
      catch(PDOException $e)
          {
          echo "Connection failed: " . $e->getMessage();
          }

          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT nombre_asig, id_asig FROM clase"); 
          $stmt->execute();
          $resultado =$stmt->fetchAll();
          }
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  ?>
          <div class="container">  
            <div class="row justify-content-around">
                <?php
                $depName = ' ';
                foreach ($resultado as $dato):
                  if($depName != $dato['nombre_asig']){ ?>
                  <div class="col-sm-3 mt-3 ml-3 mr-3 border shadow text-center cartas">
                    <a href="tabla_asesores.php?nomMat=<?php echo $dato['nombre_asig'] ?>&idclass=<?php echo $dato['id_asig']?>">
                      <img src="../img/iconos/libros.png" height="100" alt="materias">
                      <br>
                      <?php echo $dato['nombre_asig'] ?> <br>
                    </a>  
                  </div>
                  <?php
                  }
                    $depName = $dato['nombre_asig'];
                  ?>
                <?php endforeach ?>
            </div>
          </div>

        <?php include "footer.php"; ?>
        <?php include "acercaDe.php"; ?>
        <!-- Termina el Contenido -->
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
