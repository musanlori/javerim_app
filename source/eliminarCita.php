<!------------------------------------------------------------------------ELIMINAR------------------------------------------------------->
    <?php 
    $id= $_GET['id'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "javerim";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // sql to delete a record
        $sql = "DELETE FROM cita WHERE id_cita = '$id'";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Record deleted successfully";
        header('Location:Administracion.php');
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }

    $conn = null;

    ?>