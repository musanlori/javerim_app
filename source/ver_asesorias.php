<!DOCTYPE html>
<html>
    <head>
        <title>javerin_sc_II</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie-edge">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    </head>
    <body>
        <!-- Empieza el Contenido -->
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
              <h1>Asesorías</h1>
            </div>
          </div>
        </div>
  <!--Targetas-->
        <div class="container">
          <div class="card-deck mt-3">
            <div class="card text-center border-info">
              <div class="card-body">
                <a href="tabla_asesores.php?nomMat=Algebra"><img class="card-img-top" src="../img/Materias/algebra.jpg" height="250" alt=""></a>
                <h4 class="card-title">Algebra</h4>
                <p class="card-text"> asesores para temas de algebra </p>
              </div>
            </div>

            <div class="card text-center border-info">
              <div class="card-body">
                <a href="tabla_asesores.php?nomMat=Calculo Diferencial"><img class="card-img-top" src="../img/Materias/calculod.jpg" height="250" alt=""></a>
                <h4 class="card-title">Cálculo Diferencial</h4>
                <p class="card-text"> asesores para temas de cálculo diferencial </p>
              </div>
            </div>

            <div class="card text-center border-info">
              <div class="card-body">
                <a href="tabla_asesores.php?nomMat=Fisica"><img class="card-img-top" src="../img/Materias/Fisica.jpg" height="250" alt=""></a>
                <h4 class="card-title">Fisica</h4>
                <p class="card-text"> asesores para temas de física </p>
              </div>
            </div>
          </div>
<!-- segunda fila de targetas-->
          <div class="card-deck mt-3">
            <div class="card text-center border-info">
              <div class="card-body">
                <a href="tabla_asesores.php?nomMat=Programacion"><img class="card-img-top" src="../img/Materias/programacion.jpg" height="250" alt=""></a>
                <h4 class="card-title">Programación</h4>
                <p class="card-text"> asesores para temas de programación </p>
              </div>
            </div>

            <div class="card text-center border-info">
              <div class="card-body">
                <a href="tabla_asesores.php?nomMat=Quimica"><img class="card-img-top" src="../img/Materias/quimica.jpg" height="250" alt=""></a>
                <h4 class="card-title">Química</h4>
                <p class="card-text"> asesores para temas de química </p>
              </div>
            </div>

            <div class="card text-center border-info">
              <div class="card-body">
                <a href="tabla_asesores.php?nomMat=Geometria Analitica"><img class="card-img-top" src="../img/Materias/Geometria.jpg" height="250" alt=""></a>
                <h4 class="card-title">Geometría Análitica</h4>
                <p class="card-text"> asesores para temas de geometría análitica </p>
              </div>
            </div>
          </div>
<!--Tercer Fila de Targetas-->
          <div class="card-deck mt-3">
            <div class="card text-center border-info">
              <div class="card-body">
                <a href="tabla_asesores.php?nomMat=Algebra Lineal"><img class="card-img-top" src="../img/Materias/aLineal.png" height="250" alt=""></a>
                <h4 class="card-title">Algebra lineal</h4>
                <p class="card-text"> asesores para temas de algebra lineal </p>
              </div>
            </div>

            <div class="card text-center border-info">
              <div class="card-body">
                <a href="tabla_asesores.php?nomMat=Calculo Integral"><img class="card-img-top" src="../img/Materias/calculoi.jpg" height="250" alt=""></a>
                <h4 class="card-title">Cálculo Integral</h4>
                <p class="card-text"> asesores para temas de cálculo integral </p>
              </div>
            </div>

            <div class="card text-center border-info">
              <div class="card-body">
                <a href="tabla_asesores.php?nomMat=Mecanica"><img class="card-img-top" src="../img/Materias/mecanica.jpg" height="250" alt=""></a>
                <h4 class="card-title">Mecánica</h4>
                <p class="card-text"> asesores para temas de Mecánica </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Termina el Contenido -->
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
