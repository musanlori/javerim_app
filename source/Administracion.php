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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administración</title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/iconos/javerim.png">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css_javerim/javerim_style.css">
</head>

<body>

    <!-------------------------------------------------NavBar--------------------------------------------------------->
    <!--barra de navegacion-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-jav">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#opciones">
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
            </ul>
        </div>
    </nav>
    <!--Titulo-->
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Administración</h1>
            </div>
        </div>
    </div>
    <!--Titulo 1: asesorias a cursar-->
    <!--
  <div class= "container">
    <div class="row ">
      <div class="col-12 bg-primary"><h3 class="text-center">Administración</h3></div>
    </div>
  </div>
-->


    <?php
if( isset($_SESSION['admin']) ):
    $sesion=$_SESSION['admin'];
    echo 'Bienvenido! '.$sesion;
    echo '<br><a href="cerrar.php">Cerrar Sesión</a>';
    
    
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // $stmt = $conn->prepare("SELECT clase.nombre_asig, sesiones.id_sesion, sesiones.dia_semana, sesiones.horario_sesion, sesiones.lugar_sesion FROM `sesiones` INNER JOIN asesor ON sesiones.id_asesor=asesor.id_asesor INNER JOIN clase ON sesiones.id_clase= clase.id_asig"); 
    $stmt = $conn->prepare("SELECT id_asesor FROM asesor WHERE correo_asesor='$sesion'"); 
        
    $stmt->execute();
    $resul =$stmt->fetchAll();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
//
    foreach($resul as $iden){
        //echo $iden['id_asesor'];
        $idasesor=$iden['id_asesor'];
    }
    
    
    //echo $idasesor;
?>
    <!---------------------------------------------------AGREGAR--------------------------------------------------------->
    <form action="Administracion.php" method="POST">
        <?php
         if (isset($_POST['agregar'])) {
             $materia=$_POST['materia'];
             //$tema=$_POST['tema'];
             $dia=$_POST['dia'];
             $hora=$_POST['hora'];
             $lugar=$_POST['lugar'];
             
             $campos =array();
             if($lugar==""){
                 echo "<div class='alert alert-danger'>El tema esta vacio</div>";
             }
             
             try {
                $conn = new PDO("mysql:host=$servername;dbname=javerim", $username, $password);
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
                                <option value="<?php echo $row['id_asig']; ?>"> <?php echo $row['id_asig']; echo $row['nombre_asig']; ?></option>
                                <?php } ?>
                            </select>
                            <!--<label name="tema"><b>Tema: </b></label>
                       <input type="text" name="tema">-->
                            <br>
                            <label name="dia"><b>Dia: </b></label>
                            <select name="dia">
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miércoles">Miércoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sábado">Sábado</option>
                                <option value="Domingo">Domingo</option>
                            </select>
                            <label name="hora"><b>Hora: </b></label>
                            <input name="hora" type="time" name="hora" value="11:45:00" max="22:30:00" min="10:00:00" step="1">
                            <br>
                            <label name="lugar"><b>Lugar: </b></label>
                            <input type="text" name="lugar">
                            <button class="btn  btn-primary" name="agregar">Agregar</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
        <button class="btn btn-primary btn-circle fixed float-right" name="añadir">
            <img src="../img/iconos/2x/baseline_add_white_18dp.png" alt="add">
        </button>
    </form>

    <!---------------------------------------------EDITAR---------------------------------------------------------------------------------->
  


    <!-----------------------------------------------------------MOSTRAR---------------------------------------------------------------------->
    <?php
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // $stmt = $conn->prepare("SELECT clase.nombre_asig, sesiones.id_sesion, sesiones.dia_semana, sesiones.horario_sesion, sesiones.lugar_sesion FROM `sesiones` INNER JOIN asesor ON sesiones.id_asesor=asesor.id_asesor INNER JOIN clase ON sesiones.id_clase= clase.id_asig"); 
    $stmt = $conn->prepare("SELECT clase.nombre_asig, sesiones.id_sesion, sesiones.dia_semana, sesiones.horario_sesion, sesiones.lugar_sesion FROM `sesiones` INNER JOIN asesor ON sesiones.id_asesor=asesor.id_asesor INNER JOIN clase ON sesiones.id_clase= clase.id_asig WHERE sesiones.id_asesor='$idasesor'"); 
        
    $stmt->execute();
    $resultado =$stmt->fetchAll();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
         
		
    ?>

    <div class="container">
        <div class="row">
            <?php foreach ($resultado as $dato): ?>
            <div class="col-md-6">
                <div class="card-body bg-light text-dark">
                    <a href="" class="float-right ml-3" data-toggle="modal" data-target="#myModal" onclick="verDatos('<?php echo $dato['id_sesion']?>','<?php echo $dato['nombre_asig']?>','<?php echo $dato['dia_semana'] ?>','<?php echo $dato['horario_sesion']?>','<?php echo $dato['lugar_sesion'] ?>')">

                        <img src="../img/iconos/1x/baseline_delete_black_18dp.png" class="card-img-top rounded-circle" alt="trash">
                    </a>
                    <?php
    echo $dato['id_sesion']
        ?>
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
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
                        <b>Dia: </b> <?php echo $dato['dia_semana'] ?><br>
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

        function verDatos(id, name, fecha, hora, lugar) {
            $('#showId').val(id);
            $('#showName').val(name);
            $('#showDate').val(fecha);
            $('#showTime').val(hora);
            $('#showSite').val(lugar);

            console.info("Mesaje de log, ", n1);

        }

    </script>

    <?php
else:
?>
    <h3>Tienes que iniciar sesión</h3>
    <?php endif;
?>
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
