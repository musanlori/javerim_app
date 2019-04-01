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

$tablaAsesor = "SELECT * FROM asesor";
$resultAsesor = $conn->query($tablaAsesor);

echo "Consultmaos la Tabla de Asesores". "<br>";
if ($resultAsesor->num_rows > 0) {
    // output data of each row
    while($row = $resultAsesor->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Nombre: " . $row["nombre"]. " Celular " . $row["celular"].  " e-mail" . $row["correo"]. " carrera" . $row["carrera"]. " semestre" . $row["semestre"]."<br>";
    }
} else {
    echo "0 results";
}

$tablaAlumno = "SELECT * FROM alumnos";
$resultAlumno = $conn->query($tablaAsesor);

echo "Consultamos la Tabla de Alumnos". "<br>";
if ($resultAlumno->num_rows > 0) {
    // output data of each row
    while($row = $resultAlumno->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Nombre: " . $row["nombre"]. " Celular " . $row["celular"].  " e-mail" . $row["correo"]. " carrera" . $row["carrera"]. " semestre" . $row["semestre"]."<br>";
    }
} else {
    echo "0 results";
}

$tablaclase = "SELECT * FROM clase";
$resultclase = $conn->query($tablaclase);

echo "Consultamos La tabla de Materias y Temas que se imparten ". "<br>";
if ($resultclase->num_rows > 0) {
    // output data of each row
    while($row = $resultclase->fetch_assoc()) {
        echo "id: " . $row["idC"]. " - Clase: " . $row["nombreC"]. " Tema" . $row["TemaC"].  " Semestre" . $row["semstre"]."<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>