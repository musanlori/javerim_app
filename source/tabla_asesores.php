<!DOCTYPE html>
<html>
    <head>
        <title>javerin_sc_II</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie-edge">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css_javerim/javerim_style.css">
    </head>
    <body>
        <!-- Empieza el Contenido -->
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
            <br><br>
            <div class="container-fluid">
            
            <!--Conectando con la base de datos-->
            <table class = "table-responsive-sm table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th> Asesor </th>
                <th> Materia </th>
                <th> Tema </th>
                <th> Dia </th>
                <th> Horario </th>
                <th> Lugar </th>
              </tr>
            </thead>
              <?php
                $nombreMat = $_GET['nomMat'];
                
                class TableRows extends RecursiveIteratorIterator { 
                    function __construct($it) { 
                        parent::__construct($it, self::LEAVES_ONLY); 
                    }

                    function current() {
                        return "<td width = '250px'> " . parent::current(). " </td>";
                    }

                    function beginChildren() { 
                        echo "<tr>"; 
                    } 

                    function endChildren() { 
                        echo "<td><button type='submit' class='btn btn-primary'>+</button></td></tr>" . "\n";
                    } 
                } 

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "javerim";

                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT asesor.nombre_asesor, clase.nombre_asig, clase.Tema_asig, sesiones.dia_semana, sesiones.horario_sesion, sesiones.lugar_sesion FROM `sesiones` INNER JOIN asesor ON sesiones.id_asesor=asesor.id_asesor INNER JOIN clase ON sesiones.id_clase= clase.id_asig WHERE clase.nombre_asig ='$nombreMat'"); 
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
            </table>
        </div>
        <!-- Termina el Contenido -->
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
