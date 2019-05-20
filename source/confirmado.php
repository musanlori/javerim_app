<!DOCTYPE html>
<html>
    <head>
        <title>Asesores_Disponibles</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie-edge">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css_javerim/javerim_style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
                    <a class="nav-link" href="#">acerca de</a>
                </li>            
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
                    <div class="col-6 titulo-nac text-center">
                        <a href="agenda.php"><h1 class="text-nac">Agenda</h1></a>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="container-fluid">
        <?php 
        $servername = "localhost"; 
        $username = "root"; 
        $password = ''; 
        $dbname = "javerim";
        $clv_asesor = $_POST['getID'];
        $asesor_Nom = $_POST['getName'];
        $diaSesion = $_POST['getDate'];
        $horaSesion = $_POST['getTime'];
        $sitioSesion = $_POST['getSite'];
        $valor_Dia_Actual = date("N", time() - 25200); //horario Actual Zona-Horaria CDMX
        $fecha_actual = date("d-m-Y", time() - 25200);//fecha del sistema MX
        $hora_actual = date("H:i:s", time()-25200);//hora del sistema CDMX

        //algoritmo para Calcular la fecha proxima desde el dia actual hasta el dia destino
        switch ($diaSesion) {
            case 'Lunes':
                $intDay = 1;
                break;
            case 'Martes':
                $intDay = 2;
                break;
            case 'Miercoles':
                $intDay = 3;            
                break;
            case 'Jueves':
                $intDay = 4;
                break;
            case 'Viernes':
                $intDay = 5;
                break;
            case 'Sabado':
                $intDay = 6;
                break;
            case 'Domingo':
                $intDay = 7;
                break;
            default:
                $intDay = -1;
                break;
        }

        if ($intDay != -1) {
            $FechaProx = $intDay - $valor_Dia_Actual;
            #Cita dentro de la misma semana
            if($FechaProx > 0){
                $Cita = date("d-m-Y",strtotime($fecha_actual." + ". $FechaProx ." days"));
            }
            #cita para la otra semana
            elseif ($FechaProx < 0) {
                $FechaProx = $FechaProx + 7;
                $Cita = date("d-m-Y",strtotime($fecha_actual."+ ". $FechaProx ." days"));
            }
            #mismo dia
            else{
                #aun se puede agendar
                if (strtotime($hora_actual) < strtotime($horaSesion)){
                    $Cita = $fecha_actual;
                }
                #aun se puede agendar
                else {
                    $Cita = date("d-m-Y",strtotime($fecha_actual."+ 7 days"))."<br>";
                }
            }
        }
        #fin algoritmo
        #Conexion con la base de datos para insertar Info.
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 

            $tabla_Cita = "INSERT INTO cita (fecha_cita,hora_cita,rating_asesor,id_alumno,id_asesor)
            VALUES ('$Cita', '$horaSesion', '5', '2', '$clv_asesor')";

            if ($conn->query($tabla_Cita) === TRUE) {
            ?>
                <div class="container-fluid">
                    <div class="row justify-content-around bordered">
                        <div class="col-8 text-center jumbotron">
                            <h1 class="text-success">Solicitud Procesada</h1>
                            <p>
                                Se ha agendado correctamente la asesoria; Por favor, dirijase a 'Agenda' para verificar<br>
                                o pulse en continuar (o pesataña 'Asesorias') para agregar una nueva cita<br>
                                <?php echo "Prixima Cita: ". $Cita;?><br>
                                <?php echo 'faltan : ' .$FechaProx. ' Dias para su Asesoria'?>
                            </p>
                            <a href="ver_asesorias.php"> Continuar </a>

                        </div>
                    </div>
                </div> 
            <?php
            } else {
            ?>
               <div class="container">
                    <div class="row justify-content-around">
                        <div class="col-8 text-center">
                            <div class="alert alert-danger">
                                <h3>ERROR: insercion de Datos en tabla</h3>
                                <p>Lo sentimos: se ha producido un Error al tratar de agendar su cita<br>
                                    Pongase en contacto con el equipo de UNAM Mobile para que se pueda corregir este Error
                                </p>
                                <a href="ver_asesorias.php">Continuar</a>
                            </div>
                        </div>
                    </div>
               </div> 
            
            <?php }

        ?>
        <!-- Termina el Contenido -->
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
