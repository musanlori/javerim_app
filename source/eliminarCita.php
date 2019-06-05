<!------------------------------------------------------------------------ELIMINAR------------------------------------------------------->
    <?php 
    $id= $_GET['id'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "javerim";


    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id_sesion FROM sesiones INNER JOIN cita ON cita.id_asesor=sesiones.id_asesor AND cita.hora_cita= sesiones.horario_sesion INNER JOIN clase ON sesiones.id_clase=clase.id_asig WHERE cita.id_cita='$id'"); 
        
    $stmt->execute();
    $resultado =$stmt->fetchAll();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        echo "No eres Asesor";
    }

    foreach($resul as $iden){
            //echo $iden['id_asesor'];
            $idsesion=$iden['id_sesion'];
        }

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE sesiones SET Estado='0' WHERE id_sesion=$idsesion";

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
        header('Location:agenda.php');
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }

    $conn = null;

    ?>