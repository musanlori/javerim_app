<?php
//CONECCION 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "javerim";

try {
    $conn = new PDO("mysql:host=$servername;dbname=javerim", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
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
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
</head>
<body>
   
    <h1>Mis Asesorias</h1>
    
<!-------------------------------------------------NavBar--------------------------------------------------------->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <a class="navbar-brand" href="#">Javerim</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item active">
                 <a class="nav-link" href="#"><i class="fas fa-id-badge"></i> Perfil<span class="sr-only">(current)</span></a> 
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Notificaciones</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Agenda</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link disabled" href="#">Editar Disponibilidad</a>
              </li>
          </ul>
           
       </div>
   </nav>
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
                $sql = "INSERT INTO `sesiones` (`id_sesion`, `dia_semana`, `horario`, `lugar`, `id_asesor`, `id_clase`) VALUES (NULL, '$dia', '$hora', '$lugar', '2', '$materia')";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "New record created successfully";
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
                   <div class="alert alert-primary">
                       <label name="materia"><b>Materia: </b></label>
                       <select name="materia">
                       <?php
                           $sqlquery=$conn->prepare('SELECT nombreC,idC FROM clase ORDER BY idC DESC');
                           $sqlquery->execute();
                           while($row=$sqlquery->fetch(PDO::FETCH_ASSOC)){
                               extract($row)    
                        ?>
                            <option value="<?php echo $row['idC']; ?>"> <?php echo $row['idC']; echo $row['nombreC']; ?></option>
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
                   </div>
               </div>
           </div>  
         </div>
         <?php endif ?>
         <button class="btn btn-primary btn-circle fixed float-right" name="añadir">
            <i class="fas fa-plus"></i>
        </button>
     </form>
     
<!---------------------------------------------EDITAR---------------------------------------------------------------------------------->
    <?php

         
//         if($_GET) {
//
//			$id=$_GET['id_sesion'];
//
//			$sql_unico= "SELECT * FROM sesiones WHERE id_sesion=?";
//			$gsent_unico = $conn->prepare($sql_unico);
//			$gsent_unico->execute(array($id));
//			$resultado_unico = $gsent_unico->fetch();
//			//var_dump($resultado_unico);
//			
//		}
    ?>
    
<!--
    <div class="container">
        <div class="row">
            <div class="col">
               <?php //if($_GET):  ?>
               <div class="alert alert-primary">
                  <form action="edit.php" method="GET"></form>
                    <label name="materia"><b>Materia: </b></label>
                    <input type="text" name="tema" value="<?php //echo $resultado_unico['idC'] ?>">
                    <br>
                    <label name="dia"><b>Dia: </b></label>
                    <input type="text" name="dia" value="<?php //echo $resultado_unico['dia'] ?>">
                    <br>
                    <label name="hora"><b>Hora</b></label>
                    <input type="text" name="hora" value="<?php //echo $resultado_unico['horario'] ?>">
                    <br>
                    <label name="lugar">Lugar</label>
                    <input type="text" name="lugar" value="<?php //echo $resultado_unico['lugar'] ?>">
                    <input type="hidden" name="id" value="<?php //echo $resultado_unico['id_sesion'] ?>">
                    <br>

                    <button class="btn  btn-primary" name="editar">Editar</button>
                   
               </div>
               <?php  //endif ?>
            </div>
        </div>
    </div>
-->
   

     
<!-----------------------------------------------------------MOSTRAR---------------------------------------------------------------------->
     <?php
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT clase.nombreC, sesiones.id_sesion, sesiones.dia_semana, sesiones.horario, sesiones.lugar FROM `sesiones` INNER JOIN asesor ON sesiones.id_asesor=asesor.id INNER JOIN clase ON sesiones.id_clase= clase.idC"); 
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
                 <div class="alert alert-primary">
                    <b>Materia: </b> <?php echo $dato['nombreC'] ?> <br>
                    <b>Dia: </b> <?php echo $dato['dia_semana'] ?>
                    <b>Hora: </b> <?php echo $dato['horario'] ?> <br>
                    <b>Lugar: </b> <?php echo $dato['lugar'] ?>
                    <a href="delete.php?id=<?php echo $dato['id_sesion'] ?>" class="float-right ml-3">
                        <i class="fas fa-minus-circle"></i>
                    </a>
                 </div>
                  
              </div>
              <?php endforeach ?>
          </div>
      </div>
       
   
       
       
   
     
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>  
</body>
</html>