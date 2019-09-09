<?php
session_start();
//CONECCION 

//$servername = "localhost";
//$username = "root";
////$password = "J4v3rIm4pp_Db";
//$password = "";
//$dbname = "javerim";
include_once 'infoDb.php';

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

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administración</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/iconos/javerim.png">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css_javerim/javerim_style.css">
    <style type="text/css">
        .noborder{
            border: 0;
            text-align: center;
        }
        </style>
</head>

<body>

    <!-------------------------------------------------NavBar--------------------------------------------------------->
    <!--barra de navegacion-->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1976D2;">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#opciones" >
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <!-- logo -->
          <a class="navbar-brand" href="#">
            <img src="../img/iconos/javerim.ico" width="50" height="50" alt="javerin_ico">
          </a>
          
          <!-- enlaces -->
          <div class="collapse navbar-collapse" id="opciones">   
            <ul class="navbar-nav">
              <li class="nav-item">
                <button type="button" class="btn btn-sm text-white" style="background-color: #1976D2;" onclick="location.href='ver_asesorias.php'">Asesorias</button></a>
              </li>
              <?php
                if( isset($_SESSION['alumno'])):
                    $sesion=$_SESSION['alumno'];
                
                ?>
              <li class="nav-item">
                <button type="button" class="btn btn-sm text-white" style="background-color: #1976D2;" onclick="location.href='agenda.php'">Agenda</button></a>
              </li>
              
                <li class="nav-item dropdown">
                 
                  <button type= "button" class="btn btn-sm text-white dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <?php echo 'Bienvenido! '.$sesion;?>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="cerrar.php">Cerrar Sesión</a>
                  </div>
              </li>
            <?php
                endif;
                ?>  
              <?php
                if( isset($_SESSION['admin'])):
                    $sesion=$_SESSION['admin'];
                
                ?>
                <li class="nav-item">
                <button type="button" class="btn btn-sm text-white" style="background-color: #1976D2;" onclick="location.href='Administracion.php'">Administración</button></a>
              </li>
                <li class="nav-item dropdown">
                 
                  <button type= "button" class="btn btn-sm text-white dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <?php echo 'Bienvenido! '.$sesion;?>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="cerrar.php">Cerrar Sesión</a>
                  </div>
              </li>
            
            <?php
                endif;
                ?> 
                <?php
                if(empty($_SESSION['admin']) && empty($_SESSION['alumno'])):
                
                ?>
                <li class="nav-item">
                <button type="button" class="btn btn-sm text-white" style="background-color: #1976D2;" onclick="location.href='form.php'">Registro e Inicio de Sesión</button></a>
                </li> 
                <?php
                endif;
                ?>
              <li class="nav-item">
                <button type="button" class="btn btn-sm text-white" style="background-color: #1976D2;" data-toggle="modal" data-target="#myModal"><span><img src="../img/iconos/1x/baseline_help_outline_white_18dp.png" alt="i"></span> Acerca de</button>
              </li>       
            </ul>
          </div>
        </nav>
    <!--Titulo-->
    

    <?php
if( isset($_SESSION['admin']) ):
    $sesion=$_SESSION['admin'];
    
    
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id_asesor FROM asesor WHERE correo_asesor='$sesion'"); 
        
    $stmt->execute();
    $resul =$stmt->fetchAll();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        echo "no eres Asesor";
    }
    foreach($resul as $iden){
        $idasesor=$iden['id_asesor'];
    }
?>
   <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <p class="blockquote">Agrega las asesorías que quieras impartir pulsando el botón azul</p>
            </div>
        </div>
    </div>
    <!---------------------------------------------------AGREGAR--------------------------------------------------------->
    <form action="Administracion.php" method="POST">
        <?php
         if (isset($_POST['agregar'])) {
             $materia=$_POST['materia'];
             //$tema=$_POST['tema'];
             $rdia=$_POST['dia'];
            if($rdia == 'Miércoles'){
              $dia = 'Miercoles';
            }
            elseif($rdia == 'Sábado'){
              $dia = 'Sabado';
            }
            else{
             $dia = $rdia;
            }
             $hora=$_POST['hora'];
             $lugar=$_POST['lugar'];
             
             $campos =array();
             
             try {
                $conn = new PDO("mysql:host=$servername;dbname=javerim", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO `sesiones` (`id_sesion`, `dia_semana`, `horario_sesion`, `lugar_sesion`,`Estado`, `id_asesor`, `id_clase`) VALUES (NULL, '$dia', '$hora', '$lugar', '0', '$idasesor', '$materia')";
                // use exec() because no results are returned
                $conn->exec($sql);
                //echo "New record created successfully";
                }
            catch(PDOException $e)
                {
                echo $sql . "<br>" . $e->getMessage();
                }

            
         }
         
         ?>

        <?php  if(isset($_POST['añadir'])): ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-body bg-light text-dark">
                        <p>
                            <label name="materia"><b>Materia: </b></label>
                            <select name="materia">
                                <?php
                           $sqlquery=$conn->prepare('SELECT nombre_asig,id_asig FROM clase ORDER BY id_asig DESC');
                           $sqlquery->execute();
                           while($row=$sqlquery->fetch(PDO::FETCH_ASSOC)){
                               extract($row)    
                        ?>
                                <option value="<?php echo $row['id_asig']; ?>"> <?php echo $row['nombre_asig']; ?></option>
                                <?php } ?>
                            </select>
                            <br>
                            <label name="dia"><b>Dia: </b></label>
                            <select name="dia">
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miércoles">Miércoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sábado">Sábado</option>
                            </select>
                            <label name="hora"><b>Hora: </b></label>
                            <input name="hora" type="time" name="hora" value="11:45:00" max="22:30:00" min="10:00:00" step="1">
                            <br>
                            <label name="lugar"><b>Lugar: </b></label>
                            <input type="text" name="lugar" data-toggle="tooltip" title="hola" required>
                            <button class="btn  btn-primary" name="agregar">Agregar</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
        <button class="btn btn-primary btn-circle fixed float-right" name="añadir">
            Agregar
        </button>
    </form>

    <!---------------------------------------------Dias ocupados---------------------------------------------------------------------------------->
     <?php
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT asesor.correo_asesor, asesor.nombre_asesor, cita.fecha_cita, cita.hora_cita, alumnos.correo_alumno, cita.lugar_cita ,cita.nombre_materia, cita.id_cita, cita.id_asesor FROM `cita` INNER JOIN asesor ON cita.id_asesor=asesor.id_asesor INNER JOIN alumnos ON cita.id_alumno= alumnos.id_alumno WHERE asesor.id_asesor='$idasesor'"); 
        
    $stmt->execute();
    $rocupado =$stmt->fetchAll();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
    
    
    <div class="container">
        <div class="row">
           <?php foreach($rocupado as $iden):?>
            <div class="col-md-6">
               <div class="card-body bg-danger">
                 <a href="" class="float-right ml-3" data-toggle="modal" data-target="#modalOcupado" onclick="seeDatos('<?php echo $iden['nombre_asesor']?>', '<?php echo $iden['correo_asesor']?>', '<?php echo $iden['id_cita']?>', '<?php echo $iden['id_asesor']?>', '<?php echo $iden['nombre_materia'] ?>', '<?php echo $iden['correo_alumno'] ?>', '<?php echo $iden['fecha_cita'] ?>', '<?php echo $iden['hora_cita'] ?>', '<?php echo $iden['lugar_cita'] ?>')">

                        <img src="../img/iconos/1x/baseline_delete_black_18dp.png" class="card-img-top rounded-circle" alt="trash">
                    </a>
                    
                      <!-- The Modal -->
                      <div class="modal" id="modalOcupado">
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
                              <input type="hidden" id="shownomAsesor" name="nomAsesor" readonly="readonly">
                              <input type="hidden" id="showcorAsesor" name="corAsesor" readonly="readonly">
                              <input type="hidden" id="showIdcita" name="id" readonly="readonly">
                              <input type="hidden" id="showIdasesor" name="idAsesor" readonly="readonly" class="noborder">
                              <b>Materia: </b><input type="text" id="showMateria" name="materia" readonly="readonly" class="noborder"><br>
                              <b>Alumno: </b><input type="text" id="showAlumno" name="correoAlumno" readonly="readonly" class="noborder"><br>
                              <b>Fecha: </b><input type="text" id="showFecha" name="fecha" readonly="readonly" class="noborder"><br>
                              <b>Hora: </b><input type="text" id="showHora" name="hora" readonly="readonly" class="noborder"><br>
                              <b>Lugar: </b><input type="text" id="showLugar" name="lugar" readonly="readonly" class="noborder"><br>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-success btn-block">Eliminar</button>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>
                    
                    <div class="card-tex">
                      <b>Materia: </b> <?php echo $iden['nombre_materia'] ?>
                      <b>Alumno: </b> <?php echo $iden['correo_alumno'] ?> <br>
                      <b>Fecha: </b> <?php echo $iden['fecha_cita'] ?> <br>
                      <b>Hora: </b> <?php echo $iden['hora_cita'] ?> <br>
                      <b>Lugar: </b> <?php echo $iden['lugar_cita'] ?> <br>
                   
                    </div>
                  
               </div>
               <br>
                
            </div>
            <?php endforeach ?>
        </div>
    </div>

     
      


    <!-----------------------------------------------------------MOSTRAR---------------------------------------------------------------------->
    <?php
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT clase.nombre_asig, sesiones.id_sesion, sesiones.dia_semana, sesiones.horario_sesion, sesiones.lugar_sesion FROM `sesiones` INNER JOIN asesor ON sesiones.id_asesor=asesor.id_asesor INNER JOIN clase ON sesiones.id_clase= clase.id_asig WHERE sesiones.id_asesor='$idasesor'"); 
        
    $stmt->execute();
    $resultado =$stmt->fetchAll();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        echo "No eres Asesor";
    }
    ?>

    <div class="container">
        <div class="row">
            <?php foreach ($resultado as $dato):
              if($dato['dia_semana'] == 'Miercoles'){
                $comodin = 'Miércoles';
              }
              elseif($dato['dia_semana'] == 'Sabado'){
                $comodin = 'Sábado';
              }
              else{
              $comodin = $dato['dia_semana'];
              }
            
              ?>

            <div class="col-md-6">
                <div class="card-body bg-light text-dark">
                   
                    <a href="" class="float-right ml-3" data-toggle="modal" data-target="#ModalAdmin" onclick="verDatos('<?php echo $dato['id_sesion']?>','<?php echo $dato['nombre_asig']?>','<?php echo $comodin ?>','<?php echo $dato['horario_sesion']?>','<?php echo $dato['lugar_sesion'] ?>')">

                        <img src="../img/iconos/1x/baseline_delete_black_18dp.png" class="card-img-top rounded-circle" alt="trash">
                    </a>
                    
                    <!-- The Modal -->
                    <div class="modal" id="ModalAdmin">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">¿Seguro que desea eliminar esta asesoría?</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <form action="delete.php" method="GET" >
                                <div class="modal-body">
                                    
                                        <div class="car-body bg-light text-dark">
                                           
                                            <input type="hidden" id="showId" name="id"><br>
                                            <b>Materia: </b><output id="showName"></output><br>
                                            <p class="card-text">
                                                <b>Dia: </b><output id="showDate"></output><br>
                                                <b>Hora: </b><output id="showTime"></output><br>
                                                <b>Lugar: </b><output id="showSite"></output>
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
                    <b>Materia: </b> <?php echo $dato['nombre_asig'] ?> <br>
                    <p class="card-text">
                        <b>Dia: </b> <?php
                            if($dato['dia_semana'] == 'Miercoles'){
                              echo 'Miércoles';
                            }elseif($dato['dia_semana'] == 'Sabado'){
                              echo 'Sábado';
                            }else{
                              echo $dato['dia_semana'];
                            } 
                             ?><br>
                        <b>Hora: </b> <?php echo $dato['horario_sesion'] ?><br>
                        <b>Lugar: </b> <?php echo $dato['lugar_sesion'] ?>
                    </p>
                </div>

            </div>
            <?php endforeach ?>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#')
        });

        function verDatos(id, name, comodin, hora, lugar) {
            $('#showId').val(id);
            $('#showName').val(name);
            $('#showDate').val(comodin);
            $('#showTime').val(hora);
            $('#showSite').val(lugar);


            console.info("Mesaje de log, ", n1);

        }
        
        function seeDatos(nomAsesor, corAsesor, id, idasesor, materia, alumno, fecha, hora, lugar) {
            $('#shownomAsesor').val(nomAsesor);
            $('#showcorAsesor').val(corAsesor);
            $('#showIdcita').val(id);
            $('#showIdasesor').val(idasesor);
            $('#showMateria').val(materia);
            $('#showAlumno').val(alumno);
            $('#showFecha').val(fecha);
            $('#showHora').val(hora);
            $('#showLugar').val(lugar);
            console.info("Mesaje de log, ", n1);

        }

    </script>

    <?php
else:
?>
    <h3>Tienes que iniciar sesión como Asesor</h3>
    <?php endif;
?>
    <?php include "acercaDe.php"; ?>
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
