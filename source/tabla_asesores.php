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
