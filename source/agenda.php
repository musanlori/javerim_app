<?php
session_start();
//CONECCION 

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

//------------------------SE NECESITA TENER LA UNA SESION INICIADA PARA VER ESTA PAGINA
//if( isset($_SESSION['admin']) ){
//    echo 'Bienvenido! '.$_SESSION['admin'];
//    echo '<br><a href="cerrar.php">Cerrar Sesión</a>';
//}else{
//    header('Location:form.php');
//}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie-edge">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css_javerim/javerim_style.css">
  <style type="text/css">
        .noborder{
            border: 0;
            text-align: center;
        }
        </style>
</head>

<body>
  <!--Pantalla Agenda Javerim-->
  <!--barra de navegacion-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-jav">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#opciones" >
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <!-- logo -->
          <a class="navbar-brand" href="#">
            <img src="../img/iconos/unam.jpg" width="30" height="30" alt="">
          </a>
          
          <!-- enlaces -->
          <div class="collapse navbar-collapse" id="opciones">   
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link " href="ver_asesorias.php">Asesorías</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Administracion.php">Administracion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="agenda.php">Agenda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="form.php">Registro e Inicio</a>
              </li> 
              <li>
                <a class="nav-link" href="#">acerca de</a>
              </li>
              <?php
                if( isset($_SESSION['alumno']) ):
                    $sesion=$_SESSION['alumno'];
                ?>
                <li class="nav-item dropdown">
                 
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <?php echo 'Bienvenido! '.$sesion;?>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="cerrar.php">Cerrar Sesión</a>
                  </div>
              </li>
            <?php
                endif;
                ?>            
            </ul>
          </div>
        </nav>
        <!--Titulo-->
        <br><br>
        <div class="container">
          <div class="row">
            <div class="col-6 titulo-nac text-center">
              <a href="ver_asesorias.php"><h1 class="text-nac">Asesorías</h1></a>
            </div>
            <div class="col-6 titulo-act text-center">
              <a href="agenda.php"><h1 class="text-act">Agenda</h1></a>
            </div>
          </div>
        </div>
        
        
<!----Buscando el id del alumno-------------------------------->
 <?php
if( isset($_SESSION['alumno']) ):
    $sesion=$_SESSION['alumno'];
    
    
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // $stmt = $conn->prepare("SELECT clase.nombre_asig, sesiones.id_sesion, sesiones.dia_semana, sesiones.horario_sesion, sesiones.lugar_sesion FROM `sesiones` INNER JOIN asesor ON sesiones.id_asesor=asesor.id_asesor INNER JOIN clase ON sesiones.id_clase= clase.id_asig"); 
    $stmt = $conn->prepare("SELECT id_alumno FROM alumnos WHERE correo_alumno='$sesion'"); 
        
    $stmt->execute();
    $resul =$stmt->fetchAll();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
//
    foreach($resul as $iden){
        //echo $iden['id_asesor'];
        $idalumno=$iden['id_alumno'];
    }
    
    
    //echo $idasesor;
?>
  <!--lista de asesorias a Cursar-->
  <?php
    try {
      //CONECCION
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

          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT cita.fecha_cita, cita.hora_cita, asesor.nombre_asesor,cita.lugar_cita ,cita.nombre_materia, cita.id_cita, cita.id_asesor  FROM `cita` INNER JOIN asesor ON cita.id_asesor=asesor.id_asesor INNER JOIN alumnos ON cita.id_alumno= alumnos.id_alumno WHERE alumnos.id_alumno=$idalumno");
          $stmt->execute();
          $resultado =$stmt->fetchAll();
      }
      catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
    ?>


      <div class="container">
          <div class="row justify-content-around">
              <?php foreach ($resultado as $dato): ?>
              <div class="col-md-5 mt-5 border shadow">
                  <br>
                  <div class="row justify-content-between">
                      <div class="col-4">
                          <img src="../img/iconos/contacts_3695.ico" class="rounded-circle" alt="photo">
                      </div>
                      <div class="col-6">
                        <a href="" data-toggle="modal" data-target="#myModal" onclick="verDatos('<?php echo $dato['id_cita']?>','<?php echo $dato['id_asesor']?>','<?php echo $dato['fecha_cita']?>','<?php echo $dato['hora_cita'] ?>','<?php echo $dato['nombre_asesor']?>','<?php echo $dato['lugar_cita'] ?>','<?php echo $dato['nombre_materia'] ?>')">
                          <img src="../img/iconos/2x/baseline_delete_black_18dp.png" align="right" alt="eliminar"> <br>
                        </a>
                        <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">¿Seguro que desea eliminar esta cita?</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <form action="eliminarCita.php" method="GET" >
                                <div class="modal-body">
                                    
                                        <div class="car-body bg-light text-dark">
                                           
                                            <input type="text" id="showId" name="id" readonly="readonly" class="noborder"><br>
                                            <input type="text" id="showIdasesor" name="idAsesor" readonly="readonly" class="noborder"><br>
                                            
                                            <p class="card-text">
                                                <b>Fecha: </b><input type="text" id="showFecha" name="fecha" readonly="readonly" class="noborder"><br>
                                                <b>Hora: </b><input type="text" id="showHora" name="hora" readonly="readonly" class="noborder"><br>
                                                <b>Asesor: </b><input type="text" id="showAsesor" readonly="readonly" class="noborder"><br>
                                                <b>Lugar: </b><input type="text" id="showLugar" name="lugar" readonly="readonly" class="noborder"><br>
                                                <b>Materia: </b><input type="text" id="showMateria" name="materia" readonly="readonly" class="noborder"><br>
                                                
                                            </p>
                                        </div>
                                        

                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-block">Eliminar</button>
                                    

                                </div>
                            </form>

                            </div>
                        </div>
                    </div>
                         
                          <b> </b> <?php echo $dato['id_cita'] ?> <br>
                          <b> </b> <?php echo $dato['id_asesor'] ?> <br>
                          <b> </b> <?php echo $dato['nombre_materia'] ?> <br>
                          <b> </b> <?php echo "Asesor: ". $dato['nombre_asesor'] ?> <br>
                          <img src="../img/iconos/1x/baseline_calendar_today_black_18dp.png" alt="calendar">
                          <b> </b> <?php echo $dato['fecha_cita'] ?>
                          <img src="../img/iconos/1x/baseline_query_builder_black_18dp.png" alt="calendar">
                          <b> </b> <?php echo $dato['hora_cita'] ?> <br>
                          <img src="../img/iconos/1x/baseline_location_on_black_18dp.png" alt="calendar">
                          <b> </b> <?php echo $dato['lugar_cita'] ?> <br>

                      </div>
                      <div class="col-12">
                          <a href="">
                              <button type='submit' class='btn btn-success btn-block'>Calificar asesoría</button>
                          </a>
                      </div>
                  </div>


              </div>
              <?php endforeach ?>
          </div>
      </div>
      
      
      
    <script type="text/javascript">
        $(document).ready(function() {
            $('#')
        });

        function verDatos(id, idasesor, fecha, hora, asesor, lugar, materia) {
            $('#showId').val(id);
            $('#showIdasesor').val(idasesor);
            $('#showFecha').val(fecha);
            $('#showHora').val(hora);
            $('#showAsesor').val(asesor);
            $('#showLugar').val(lugar);
            $('#showMateria').val(materia);

            console.info("Mesaje de log, ", n1);

        }
        function enviarDatos(id, fecha, hora, asesor, lugar, materia) {
            $('#showIdA').val(id);
            $('#showDate').val(fecha);
            $('#showTime').val(hora);
            $('#showTeacher').val(asesor);
            $('#showSite').val(lugar);
            $('#showMater').val(materia);

            console.info("Mesaje de log, ", n1);

        }

    </script>

<?php endif;
?>



<!--Termina el Contenido -->
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>





</body>
</html>
