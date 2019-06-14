<!------------------------------------------------------------------------ELIMINAR------------------------------------------------------->
    <?php 
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

    $id = $_GET['id'];
    $fecha = $_GET['fecha'];
    $hora = $_GET['hora'];
    $materia = $_GET['materia'];
    $lugar = $_GET['lugar'];
    $idAsesor = $_GET['idAsesor'];
    $correoAlumno= $_GET['correoAlumno'];
    $nomAsesor = $_GET['nomAsesor'];
    $corAsesor = $_GET['corAsesor'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "javerim";

    var_dump($id);
    var_dump($fecha);
    var_dump($materia);
    var_dump($idAsesor);
    var_dump($correoAlumno);
    var_dump($corAsesor);
   

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

    $sql = "UPDATE sesiones SET Estado='0' WHERE dia_semana='$fec' and id_asesor = '$idAsesor' and id_clase = '$idAsignatura' and horario_sesion='$hora' and lugar_sesion='$lugar'";

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
        //header('Location:ver_asesorias.php');
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }



        try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'javerim.app@gmail.com';                     // SMTP username
    $mail->Password   = 'UNAMmobile*1';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('javerim.app@gmail.com', 'Javerim');
    $mail->addAddress($correoAlumno);     // Add a recipient
    $mail->addAddress($corAsesor);
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Se ha cancelado una asesoria';
    $mail->Body    = 'Se ha cancelado la siguiente asesoria:<br>'.'<b>Fecha: <b/>'.$fecha.'<br><b>Hora: <b/>'.$hora.'<br><b>Materia: <b/>'.$materia.'<br><b>Lugar: <b/>'.$lugar.'<br><b>Correo asesor: <b/>'.$corAsesor.'<br><b>Correo alumno: <b/>'.$correoAlumno;
    

    $mail->send();
    echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }





    $conn = null;


if( isset($_SESSION['alumno'])){
echo "hola";
    header('Location:agenda.php');
}


if(isset($_SESSION['admin'])){
    echo "asesor";

    header('Location:Administracion.php');
}

    ?>