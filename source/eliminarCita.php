<!------------------------------------------------------------------------ELIMINAR------------------------------------------------------->
    <?php 
    $id = $_GET['id'];
    $fecha = $_GET['fecha'];
    $hora = $_GET['hora'];
    $materia = $_GET['materia'];
    $idAsesor = $_GET['idAsesor'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "javerim";

    var_dump($id);
    var_dump($fecha);
    var_dump($materia);
    var_dump($idAsesor);

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // $stmt = $conn->prepare("SELECT clase.nombre_asig, sesiones.id_sesion, sesiones.dia_semana, sesiones.horario_sesion, sesiones.lugar_sesion FROM `sesiones` INNER JOIN asesor ON sesiones.id_asesor=asesor.id_asesor INNER JOIN clase ON sesiones.id_clase= clase.id_asig"); 
    $stmt = $conn->prepare("SELECT id_asig FROM clase WHERE  nombre_asig='$materia'"); 
        
    $stmt->execute();
    $resultado =$stmt->fetchAll();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        
    }

    foreach($resultado as $iden){
        //echo $iden['id_asesor'];
        $idmateria=$iden['id_asig'];
        echo "aas";
        echo $iden['id_asig'];
    }
    $idAsignatura=$iden['id_asig'];
    echo $idAsignatura;

    $dias = array('Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado');
    $fec = $dias[date('N', strtotime($fecha))];
    $fech = $dias[date('N', strtotime('05-06-2019'))];
    echo $fec;
    echo $fech;

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE sesiones SET Estado='0' WHERE dia_semana='$fec' and id_asesor = '$idAsesor' and id_clase = '$idAsignatura'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

    
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // sql to delete a record
        $sql = "DELETE FROM cita WHERE id_cita = '$id'";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Record deleted successfully";
        //('Location:agenda.php');
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }

    $conn = null;

    ?>