<?php
//crea extrae los datos desde la tabla de Asesor y envia la informacion a Cita
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
    echo '<form action="cita.php">';
    while($row = $resultAsesor->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Nombre: " . $row["nombre"]. " Celular " . $row["celular"].  " e-mail" . $row["correo"]. " carrera" . $row["carrera"]. " semestre" . $row["semestre"]."<a href='cita.php?id=id_asesor=".$row["id"]."'> Enviar </a><br>";
    }
    echo '</form>';
} else {
    echo "0 results";
}

$conn->close();
?>