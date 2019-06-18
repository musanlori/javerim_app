<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

//coneccion a base de datoa
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "javerim";

try {
    $conn = new PDO("mysql:host=$servername;dbname=javerim", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
//datos recividos por el POST
    $nombre=$_POST['nombre'];
    $celular=$_POST['celular'];
    $correo=$_POST['correo'];
    $carrera=$_POST['carrera'];
    $semestre=$_POST['semestre'];
    $contrasena=$_POST['contrasena'];
    $contrasena2=$_POST['contrasena2'];
    $escoger=$_POST['escoger'];
 

//COMPROBAR SI EXISTE EL USUARIO
if($escoger=="alumnos"){
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT*FROM alumnos WHERE correo_alumno='$correo'"); 
    $stmt->execute();
    $resultado =$stmt->fetch();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    if($resultado){
        echo 'Existe este Usuario';
        
        die();
    }

        
    }else{
    
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT*FROM asesor WHERE correo_asesor='$correo'"); 
    $stmt->execute();
    $resultado2 =$stmt->fetch();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    if($resultado2){
        echo 'Existe este Usuario';
        
        die();
    } 

    }  
    

    $contrasena=password_hash($contrasena, PASSWORD_DEFAULT);

//	echo '<pre>';
//    var_dump($usuario);
//    var_dump($contrasena);
//    var_dump($contrasena2);
//    echo '</pre>';

                
if(password_verify($contrasena2,$contrasena)){
    echo 'La contrasena es valida<br>';
    if($escoger=="alumnos"){
        $conn = new PDO("mysql:host=$servername;dbname=javerim", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `alumnos` (`nombre_alumno`, `cel_alumno`,`correo_alumno`,`carrera_alumno`,`semestre_alumno`,`contrasena_alumno`) VALUES ('$nombre','$celular', '$correo','$carrera', '$semestre', '$contrasena')";
                // use exec() because no results are returned
        $conn->exec($sql);
        
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
    $mail->addAddress($correo, $nombre);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Bienvenido a Javerim';
    $mail->Body    = 'Hola '.$nombre.', Bienvenido a  <b>Javerim</b>';
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
        $conn = null;
        
        
    //header('location:registroP.php');
        header('location:confirRegistro.php');
    echo "New record created successfully";
        
    }else{
        $conn = new PDO("mysql:host=$servername;dbname=javerim", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `asesor` (`nombre_asesor`, `celular_asesor`,`correo_asesor`,`carrera_asesor`,`semestre_asesor`,`contrasena_asesor`) VALUES ('$nombre','$celular', '$correo','$carrera', '$semestre', '$contrasena')";
                // use exec() because no results are returned
        $conn->exec($sql);
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
    $mail->addAddress($correo, $nombre);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Bienvenido a Javerim';
    $mail->Body    = 'Hola '.$nombre.', Bienvenido a  <b>Javerim</b> <br>'.'Para permanecer en la plataforma tienes que mandar un foto de tu credencial o tira de materias al correo javerim.app@gmail.com junto con el correo con el que te inscribiste. <br>
              También puedes asistir al Laboratorio de UNAM mobile ubicado en el Anexo de ingeniería Edicio Q Salón 308. <br>
              Tienes un límite de una semana';
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    
        $conn = null;
        header('location:confirRegistro.php');
        echo "New record created successfully";
    }
    
}else{
    echo 'La contraseñano no es la misma';
    
}

//}
?>