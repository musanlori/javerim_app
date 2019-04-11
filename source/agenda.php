<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie-edge">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>

<body>
  <!--Pantalla Agenda Javerim-->
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
              <h1>Agenda</h1>
            </div>
          </div>
        </div>
  <!--Titulo 1: asesorias a cursar-->
  <div class= "container">
    <div class="row ">
      <div class="col-12 bg-primary"><h3 class="text-center">Asesorias a cursar</h3></div>
    </div>
  </div>
  <!--lista de asesorias a Cursar-->
    <table class= "table-responsive-small table-bordered table-hover">
      <tr><th>asignatura</th><th>fecha</th><th>hora</th><th>asesor</th><th>Lugar de la sesión</th><th>Rating</th>
  <?php

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:250px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "javerim";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT clase.nombre_asig, cita.fecha_cita, cita.hora_cita, asesor.nombre_asesor,sesiones.lugar_sesion ,cita.rating_asesor  FROM `cita` INNER JOIN asesor ON cita.id_asesor=asesor.id_asesor INNER JOIN alumnos ON cita.id_alumno= alumnos.id_alumno INNER JOIN sesiones ON asesor.id_asesor=sesiones.id_asesor INNER JOIN clase ON sesiones.id_clase=clase.id_asig WHERE alumnos.id_alumno=2" );
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

    $conn = null;
?>

</tabla>


<!-- Termina el Contenido -->
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>





</body>
</html>
