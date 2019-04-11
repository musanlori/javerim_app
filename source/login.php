<?php
session_start();
//coneccion a base de datoa
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "javerim";

try {
    $conn = new PDO("mysql:host=$servername;dbname=javerim", $username, $password);
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

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT*FROM $escoger_login WHERE correo='$correo_login'"); 
    $stmt->execute();
    $resultado =$stmt->fetch();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
if(!$resultado){
    //matar la operación
    echo 'No exite usuario';
    die();
}

if( password_verify( $contrasena_login, $resultado['contrasena']) ){
    //las contraseñas son iguales
    $_SESSION['admin'] = $correo_login;
    echo 'Las contraseñas son iguales';
    header('Location:bienvenido.php');

}else{
    echo 'No son iguales las contraseñas!';
    die();
}

?>
