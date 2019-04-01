<?php
    //Recibimiento de datos desde asignatura para crear cita
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

    $recuperaid = $_GET['id_asesor'];
    

    $citaTable = "INSERT INTO cita (fecha, raiting, hora, id_alumno, id_asesor)
    VALUES ('08083019', '5', '06:55', '1', $recuperaid)";

    if ($conn->query($asesorTable) === TRUE) {
        echo "Creada la Tabla para cita";
    } else {
        echo "Error: " . $asesorTable . "<br>" . $conn->error;
    }

    $conn->close(); //se cierra la conexion
?>