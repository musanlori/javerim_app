<?php
    $servername = "localhost"; //servidor 127.0.0.0
    $username = "root"; //usuario mysql
    $password = ''; //contraseña del usuario mysql
    $dbname = "javerim"; //referencia  la base datos 

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname); //objeto de tipo mysql
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $asesorTable = "INSERT INTO asesor (nombre_asesor, celular_asesor, correo_asesor, carrera_asesor, semestre_asesor)
    VALUES ('Diego N', '5587947197', 'diego@correo.com', ' Ing Minas', '4')";

    if ($conn->query($asesorTable) === TRUE) {
        echo "Creada la Tabla para Asesor" . '<br>';
    } else {
        echo "Error: " . $asesorTable . "<br>" . $conn->error;
    }

    $conn->close(); //se cierra la conexion
?>