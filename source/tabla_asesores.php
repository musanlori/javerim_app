<!DOCTYPE html>
<html>
    <head>
        <title>javerin_sc_II</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie-edge">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    </head>
    <body>
        <!-- Empieza el Contenido -->
        <!--Conectando con la base de datos-->
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
        ?>
        <!--Tabla con la lista de asesores disponibles para cada materia-->
        <div class="container">
                <table class="table table-responsive-sm table-bordered table-hover">
                  <thead> 
                    <tr> 
                      <th>img</th> 
                      <th>Nombre</th>
                      <th>Telefono</th>
                      <th>correo</th>
                      <th>carrera</th>
                      <th>semestre</th>
                    </tr> 
                  </thead>
                  <tbody>
                    <?php
                      if ($resultAsesor->num_rows > 0) {
                        // output data of each row
                        while($row = $resultAsesor->fetch_assoc()) {
                            echo "<tr>";
                            echo '<td><img src="../img/contacts_3695.ico" height="50" alt=""></td>';
                            echo "<td>". $row["nombre_asesor"] ."</td>";
                            echo "<td>". $row["celular_asesor"] ."</td>";
                            echo "<td>". $row["correo_asesor"] ."</td>";
                            echo "<td>". $row["carrera_asesor"] ."</td>";
                            echo "<td>". $row["semestre_asesor"] ."</td>";
                            echo '<td><button type="submit" class="btn btn-primary">Agregar</button></td>';
                            echo "<tr>";
                        }
                      } else {
                        echo "0 results";
                      }
                    ?>
                  </tbody>
                </table>
             </div> 
        <!-- Termina el Contenido -->
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
