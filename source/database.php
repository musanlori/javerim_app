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
    VALUES ('Ricardo', '5576836086', 'ricardo@correo.com', 'computacion', '10')";

    $alumnoTable = "INSERT INTO alumnos (nombre_alumno, cel_alumno, correo_alumno, carrera_alumno, semestre_alumno)
    VALUES ('Santiago', '5556826187', 'santiago@correo.com', 'computacion', '2')";

    $claseTable = "INSERT INTO clase (nombre_asig, Tema_asig, semstre_asig)
    VALUES ('Algebra Lineal', 'Espacios Vectoriales', '1')";

    if ($conn->query($asesorTable) === TRUE) {
        echo "Creada la Tabla para Asesor" . '<br>';
    } else {
        echo "Error: " . $asesorTable . "<br>" . $conn->error;
    }

    if ($conn->query($alumnoTable) === TRUE) {
        echo "Creada la Tabla para Alumno" . '<br>';
    } else {
        echo "Error: " . $alumnoTable . "<br>" . $conn->error;
    }

    if ($conn->query($claseTable) === TRUE) {
        echo "Creada la Tabla para Clase" . '<br>';
    } else {
        echo "Error: " . $claseTable . "<br>" . $conn->error;
    }

    $conn->close(); //se cierra la conexion
?>