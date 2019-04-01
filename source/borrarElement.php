<?php
    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "javerim";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // sql to delete a record
    $tabAsesor = "DELETE FROM asesor WHERE id_asesor=6";

    if ($conn->query($tabAsesor) === TRUE) {
        echo "se ha borrado elemento de asesor <br>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $tabAlumno = "DELETE FROM alumnos WHERE id_alumno=2";

    if ($conn->query($tabAlumno) === TRUE) {
        echo "se ha borrado elemento de alumnos <br>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $tabClase = "DELETE FROM clase WHERE id_asig=4";

    if ($conn->query($tabClase) === TRUE) {
        echo "se ha borrado elemento de clase <br>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
?>