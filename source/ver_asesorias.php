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
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
                <a class="nav-link" href="#">acerca de</a>
              </li>            
            </ul>
          </div>
        </nav>
        <!--Titulo-->
        <br><br>
        <div class="container">
          <div class="row">
            <div class="col-6 titulo-act text-center">
              <a href="ver_asesorias.php"><h1 class="text-act">Asesorías</h1></a>
            </div>
            <div class="col-6 titulo-nac text-center">
              <a href="agenda.php"><h1 class="text-nac">Agenda</h1></a>
            </div>
          </div>
        </div>
  <!--Targetas-->
  <?php
    try {
      //CONECCION 
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "javerim";

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

          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT nombre_asig FROM clase"); 
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
                    <a href="tabla_asesores.php?nomMat=<?php echo $dato['nombre_asig'] ?>">
                      <img src="../img/iconos/contacts_3695.ico" height="100" alt="">
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

        <!-- Termina el Contenido -->
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
