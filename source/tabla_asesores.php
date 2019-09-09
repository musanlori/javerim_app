<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Asesores_Disponibles</title>
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
        <!-- Empieza el Contenido -->
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
            <br><br>
            <div class="container">
                <div class="row">
                    <div class="col-6 titulo-nac text-center">
                        <a href="ver_asesorias.php"><h3 class="text-nac">Asesorías</h3></a>
                    </div>
                    <div class="col-6 titulo-nac text-center">
                        <a href="agenda.php"><h3 class="text-nac">Agenda</h3></a>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="container-fluid">
            
            <!--Conectando con la base de datos-->
        <?php
            $nombreMat = $_GET['nomMat'];
            $idclase = $_GET['idclass'];
//            $servername = "localhost";
//            $username = "root";
//            $password = "J4v3rIm4pp_Db";
//            $dbname = "javerim";
            include_once 'infoDb.php';
            try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            $stmt = $conn->prepare("SELECT asesor.id_asesor, asesor.nombre_asesor, asesor.correo_asesor, asesor.carrera_asesor, asesor.semestre_asesor,clase.nombre_asig, sesiones.dia_semana, sesiones.horario_sesion, sesiones.lugar_sesion, sesiones.Estado FROM `sesiones` INNER JOIN asesor ON sesiones.id_asesor=asesor.id_asesor INNER JOIN clase ON sesiones.id_clase= clase.id_asig WHERE clase.nombre_asig ='$nombreMat'"); 
                
            $stmt->execute();
            $resultado =$stmt->fetchAll();
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
                
                
            ?>
            <!--Definicion del espacio para las targetas que muestran a los asesores disponibles-->
            <div class="container">
                <div class="row justify-content-around">
                    <!--generacion del Listado-->
                    <?php foreach ($resultado as $dato): ?>
                    <div class="col-md-5 mt-5 border shadow">
                        <br>
                        <div class="row justify-content-between">
                            <div class="col-4"><!--Foto-->
                                <img src="../img/iconos/contacts_3695.ico" class="rounded-circle" alt="photo">
                            </div>
                            <div class="col-8"><!--datos asesor-->
                                <b> </b> <?php echo $dato['nombre_asesor'] ?> <br>
                                <b> </b> <?php echo $dato['carrera_asesor'] ?> <br>
                                <b>Semestre actual: </b> <?php echo $dato['semestre_asesor'] ?> <br>
                                <img src="../img/iconos/1x/baseline_calendar_today_black_18dp.png" alt="calendar">
                                <b> </b> <?php if($dato['dia_semana'] == 'Miercoles'){
                                                echo 'Miércoles';
                                                $comodin = 'Miércoles';
                                            }elseif($dato['dia_semana'] == 'Sabado'){
                                                echo 'Sábado';
                                                $comodin = 'Sábado';
                                            }else{
                                                echo $dato['dia_semana'];
                                                $comodin = $dato['dia_semana'];
                                            }  ?>
                                <img src="../img/iconos/1x/baseline_query_builder_black_18dp.png" alt="calendar">
                                <b> </b> <?php echo $dato['horario_sesion'] ?> <br>
                                <img src="../img/iconos/1x/baseline_location_on_black_18dp.png" alt="calendar">
                                <b> </b> <?php echo $dato['lugar_sesion'] ?> <br><br><br>
                                
                            </div>
                            <div class="col-12" style="position: absolute; bottom: 0; left: 0;"><!--Boton/cuadro de dialogo-->
                                <?php if($dato['Estado'] != 1){ ?>
                                <button type='submit' class='btn btn-success btn-block' data-toggle="modal" data-target="#diag_conf" 
                                    onclick="verDatos('<?php echo $dato['id_asesor']?>','<?php echo $idclase?>','<?php echo $dato['nombre_asesor']?>','<?php echo $dato['correo_asesor']?>','<?php echo $dato['dia_semana'] ?>','<?php echo $dato['horario_sesion']?>','<?php echo $dato['lugar_sesion'] ?>', '<?php echo $nombreMat ?>', '<?php echo $comodin?>')">
                                    Agendar Asesoria
                                </button>
                                <?php } else { ?>
                                    <button type='Button' class='btn btn-danger btn-block'>
                                    Actualmente ocupado
                                </button>
                                <?php } ?>
                                <div class="modal fade" id="diag_conf">
                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                        <div class="modal-content">
                                    
                                            <!-- cabecera del diálogo -->
                                            <div class="modal-header bg-primary text-light">
                                                <h4 class="modal-title">Confirmar Asesoría</h4>
                                                <button type="button" class="close" data-dismiss="modal">X</button>
                                            </div>
                                        
                                            <!-- cuerpo del diálogo -->
                                            <form method="POST" action="confirmado.php">
                                                <div class="modal-body">
                                                    <div class="container-fluid">   
                                                        <div class="row">       
                                                            <div class="col">        
                                                                <div class="card text-center">
                                                                    <img src="../img/iconos/contacts_3695.ico" class="card-img-top rounded-circle" alt="photo">            
                                                                    <div class="card-body">
                                                                        <input type="text" id="hideID" name="getID" readonly="readonly" class="noborder"/>
                                                                        <input type="text" id="hideIDC" name="getIDC" readonly="readonly" class="noborder"/>
                                                                        <p class="card-text"><input type="text" id="showName" name="getName" readonly="readonly" class="noborder"/></p>
                                                                        <p class="card-text"><input type = "text" id="correo" name="getmail" readonly="readonly" class="noborder"/></p>
                                                                        <p class="card-text"><input type = "text" id="showDate" name="getDate" readonly="readonly" class="noborder"/></p>
                                                                        <p class="card-text"><input type = "text" id="Scomodin"  readonly="readonly" class="noborder"/></p>
                                                                        <p class="card-text"><input type = "text" id="showTime" name="getTime" readonly="readonly" class="noborder"/></p>
                                                                        <p class="card-text"><input type = "text" id="showSite" name="getSite" readonly="readonly" class="noborder"/></p>
                                                                        <p class="card-text"><input type = "text" id="materia" name="materia" readonly="readonly" class="noborder"/></p>
                                                                    </div>
                                                                </div>          
                                                            </div>   
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <!-- pie del diálogo: insercion de datos en la DB javerin -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success btn-block">Confirmar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        
                        
                    </div>
                    <?php endforeach ?>
                </div>
                <br>
            </div>
            
        <?php include "footer.php"; ?>
        <?php include "acercaDe.php"; ?>
        <!-- Termina el Contenido -->
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script type="text/javascript">
        //recibe los datsos a mostrar desde la targeta y los envia al modal
        function verDatos(id, idCl, name, correo, fecha, hora, lugar, materia, com) {
            
            $('#hideID').val(id);
            $('#hideIDC').val(idCl);
            $('#showName').val(name);
            $('#correo').val(correo);
            $('#showDate').val(fecha);
            $('#showTime').val(hora);
            $('#showSite').val(lugar);
            $('#materia').val(materia);
            $('#Scomodin').val(com);

            $('#hideID').css("display","none");
            $('#hideIDC').css("display","none");
            $('#correo').css("display","none");
            $('#showDate').css("display","none");


        }
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#')
            });
        </script>
    </body>
</html>
