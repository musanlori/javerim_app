<?php
//coneccion a base de datoa
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "javerim";

try {
    $conn = new PDO("mysql:host=$servername;dbname=javerim", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
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


//COMPROBAR QUE NO ESTE VACIO
if($nombre==""||$celular=""||$correo=""||$carrera=""||$semestre=""||$contrasena=""||$contrasena2=""){
    echo "Campo vacio";
    header('location:form.php');
}else{
    

//COMPROBAR SI EXISTE EL USUARIO
if($escoger=="alumnos"){
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
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
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
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
        $conn = new PDO("mysql:host=$servername;dbname=javerim", $username, $password);
                // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `alumnos` (`nombre_alumno`, `cel_alumno`,`correo_alumno`,`carrera_alumno`,`semestre_alumno`,`contrasena_alumno`) VALUES ('$nombre','$celular', '$correo','$carrera', '$semestre', '$contrasena')";
                // use exec() because no results are returned
        $conn->exec($sql);
    
        $conn = null;
    //header('location:registroP.php');
    echo "New record created successfully";
        
    }else{
        $conn = new PDO("mysql:host=$servername;dbname=javerim", $username, $password);
                // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `asesor` (`nombre_asesor`, `celular_asesor`,`correo_asesor`,`carrera_asesor`,`semestre_asesor`,`contrasena_asesor`) VALUES ('$nombre','$celular', '$correo','$carrera', '$semestre', '$contrasena')";
                // use exec() because no results are returned
        $conn->exec($sql);
    
        $conn = null;
        header('location:form.php');
        echo "New record created successfully";
    }
    
}else{
    header('location:form.php');
    echo 'La contraseñano es valida';
    
}

}
?>