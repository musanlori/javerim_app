<?php
session_start();
//coneccion a base de datoa
//$servername = "localhost";
//$username = "root";
////$password = "J4v3rIm4pp_Db";
//$password = "";
//$dbname = "javerim";
include_once 'infoDb.php';

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

$correo_login = $_POST['correo'];
$contrasena_login = $_POST['contrasena'];
$escoger_login=$_POST['escoger'];
$id;

    if($escoger_login=="alumnos"){
        try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT*FROM alumnos WHERE correo_alumno='$correo_login'"); 
    $stmt->execute();
    $resultado =$stmt->fetch();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
        if(!$resultado){
        //matar la operación
        echo 'El correo que haz introducido no coincide con ningún usuario';
        echo '<br><a href="form.php" class="text-white blockquote">Regresar</a>';
        die();
        }
        
    }else{
        try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT*FROM asesor WHERE correo_asesor='$correo_login'"); 
    $stmt->execute();
    $resultado =$stmt->fetch();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
        if(!$resultado){
        //matar la operación
        echo 'El correo que haz introducido no coincide con ningún usuario';
        echo '<br><a href="form.php" class="text-white blockquote">Regresar</a>';
        die();
        }
    }
    
if($escoger_login=="alumnos"){
    if(password_verify($contrasena_login, $resultado['contrasena_alumno']) ){
    //las contraseñas son iguales

    $_SESSION['alumno'] = $correo_login;
    echo 'Las contraseñas son iguales';
        
    header('Location:ver_asesorias.php');

}else{
    echo '¡Contraseña incorrecta!';
    echo '<br><a href="form.php" class="text-white blockquote">Regresar</a>';
    die();
}
    
}else{
    if(password_verify($contrasena_login, $resultado['contrasena_asesor']) ){
    //las contraseñas son iguales
    $_SESSION['admin'] = $correo_login;
    echo 'Las contraseñas son iguales';
    header('Location:Administracion.php');

}else{
    echo '¡Contraseña incorrecta!';
    echo '<br><a href="form.php" class="text-white blockquote">Regresar</a>';
    die();
}
    
}


?>
