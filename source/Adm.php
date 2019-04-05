<?php
	include_once 'conexion.php';
		$sql_leer= 'SELECT * FROM agenda';
		$gsent = $pdo->prepare($sql_leer);
		$gsent->execute();
		$resultado =$gsent->fetchAll();
		// var_dump($resultado); 
		$sql2_leer= 'SELECT * FROM impartir';
		$gsent2 = $pdo->prepare($sql2_leer);
		$gsent2->execute();
		$resultado2 =$gsent2->fetchAll();


		// $sql = "SELECT * FROM agenda";
		// $result = $conn->query($sql);



		if($_GET) {

			$id=$_GET['id'];

			$sql_unico= 'SELECT * FROM agenda WHERE id=?';
			$gsent_unico = $pdo->prepare($sql_unico);
			$gsent_unico->execute(array($id));
			$resultado_unico = $gsent_unico->fetch();
			//var_dump($resultado_unico);
			
		}


		if (isset($_POST['Agregar'])) {
			// if (empty($_POST['tema'])||empty($_POST['dia'])||empty($_POST['hora']||empty($_POST['lugar'])) {
			// 	# code...
			// 	echo "vacio";
			// }else{
				$tema = $_POST['tema'];
				$dia = $_POST['dia'];
				$hora = $_POST['hora'];
				$lugar = $_POST['lugar'];
                $sql_agregar= 'INSERT INTO agenda (tema,dia,hora,lugar) VALUES (?,?,?,?)'; //algo de seguridad

                $sentencia_agrear = $pdo->prepare($sql_agregar);
                $sentencia_agrear->execute(array($tema, $dia, $hora, $lugar));
                header('location:Adm.php');


			// }
		}


 ?>



 
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Administración</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="datepicker/css/bootstrap-datepicker.min.css">
</head>
<body>
	<h1>Mis Asesorias</h1>
<div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker3'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
            });
        </script>
    </div>
</div>

<!-- 	-----------------------Barra de navegacion---------------------------------------------------------------------- -->

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



	<div class="container">
		<div class="row">
			<div class="col">
<!-- 				<?//php if(!$_GET):  ?>
				<form action="Adm.php" method="POST">
					<label name="tema">Tema</label>
					<input type="text" name="tema">
					<br>
					<label name="horario">Día</label>
					<input type="text" name="dia">
					<br>
					<label name="horario">Hora</label>
					<input type="text"  name="hora">
					<br>
					<label name="lugar">Lugar</label>
					<input type="text" name="lugar">
					<br>
					<button class="btn  btn-primary" name="Agregar">Agregar</button>
				</form>
			<?//php  endif ?> -->


				<?php if($_GET):  ?>
					<h1>Editar</h1>
				<form method="GET" action="editar.php">

					<label name="tema">Tema</label>
					<input type="text" name="tema" value="<?php echo $resultado_unico['tema'] ?>">

					
					<br>

					<label name="dia">Día</label>
					<input type="text" name="dia" value="<?php echo $resultado_unico['dia'] ?>">
					
					<br>

					<label name="hora">Hora</label>
					<input type="text"  name="hora" value="<?php echo $resultado_unico['hora'] ?>">
					
					<br>

					<label name="lugar">Lugar</label>
					<input type="text" name="lugar" value="<?php echo $resultado_unico['lugar'] ?>">
					<input type="hidden" name="id" value="<?php echo $resultado_unico['id'] ?>">
					<br>
					
					<button class="btn  btn-primary" name="editar">Editar</button>
				</form>
			<?php  endif ?>
			</div>
			
		</div>
		
	</div>

	<form action="Adm.php" method="POST">
		<?php if(isset($_POST['añadir'])):  ?>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="alert alert-primary">
							<label name="tema">Tema</label>
							<input type="text" name="tema">
							<label name="horario">Día</label>
							<!-- <input type="text" name="dia"> -->
							<select name="horario" class="Dia" name="dia">
							    <option selected>Días de la semana</option>
							    <option name="dia" type="text" value="Lunes">Lunes</option>
							    <option name="dia" value="Martes">Martes</option>
							    <option name="dia" value="Miercoles">Miercoles</option>
						  	</select>
							<br>
							<label name="horario">Hora</label>
							<input type="text"  name="hora">
							<label name="lugar">Lugar</label>
							<input type="text" name="lugar">
							<br>
							<button class="btn  btn-primary" name="Agregar">Agregar</button>
						</div>
						
					</div>
			</div>

				
			</div>

		<?php endif ?>
		<button class="btn btn-primary btn-circle fixed float-right" name="añadir">
			<i class="fas fa-plus"></i>
		</button>
	</form> 
	
<!-- CARRUSEL -->


<!-- <div class="container">
    <div  id="demo" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                	<?php// foreach ($resultado as $dato): ?>
                	<div class="col-4">
						
						<div class=" alert alert-primary"> <b>Tema: </b> <?php// echo $dato['tema']; ?>   
							<b>Dia: </b> <?php// echo $dato['dia'] ?> <br>
							<b>Hora: </b><?php// echo $dato['hora'] ?>
							<b>Lugar: </b> <?php// echo $dato['lugar'] ?>

							<a href="eliminar.php?id=<?php// echo $dato['id'] ?>" class="float-right ml-3">
								<i class="fas fa-minus-circle"></i>
							</a>

							<a href="Adm.php?id=<?php// echo $dato['id'] ?>" class="float-right">
								<i class="far fa-edit"></i>
						</a>
					</div>
			

                </div>
                <?php// endforeach ?>

            </div>

        </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
	    		<span class="carousel-control-prev-icon"></span>
	  		</a>
	  		<a class="carousel-control-next" href="#demo" data-slide="next">
	    		<span class="carousel-control-next-icon"></span>
	  		</a>
    </div>
</div> -->



	
	<div class="container">

		<div class="row">
			<div class="col-6">
				<p>
			  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
			    Asesorias a cursar
			  </a>
			</p>
			</div>
		</div>
		
		<div class="row collapse" id="collapseExample">	
			<?php foreach ($resultado as $dato): ?>		
			<div class="col-md-6">
				
				<div class=" alert alert-primary"> <b>Tema: </b> <?php echo $dato['tema']; ?>   
					<b>Dia: </b> <?php echo $dato['dia'] ?> <br>
					<b>Hora: </b><?php echo $dato['hora'] ?>
					<b>Lugar: </b> <?php echo $dato['lugar'] ?>

					<a href="eliminar.php?id=<?php echo $dato['id'] ?>" class="float-right ml-3">
						<i class="fas fa-minus-circle"></i>
					</a>

					<a href="Adm.php?id=<?php echo $dato['id'] ?>" class="float-right">
						<i class="far fa-edit"></i>
					</a>
				</div>
				
			</div>
			<?php endforeach ?>
		</div>

		<div class="row collapse" id="collapseExample2">			
			<!-- <div class="col-md-6">
				<?php //foreach ($resultado2 as $dato): ?>
				<div class=" card-body bg-success"> <b>Tema: </b> <?php // $dato['tema']; ?>   
					<b>Dia: </b> <?php //echo $dato['dia'] ?> <br>
					<b>Hora: </b><?php //echo $dato['hora'] ?>
					<b>Lugar: </b> <?php //echo $dato['lugar'] ?>

					<a href="eliminar.php?id=<?php //echo $dato['id'] ?>" class="float-right ml-3">
						<i class="fas fa-minus-circle"></i>
					</a>

					<a href="Adm.php?id=<?php // $dato['id'] ?>" class="float-right">
						<i class="far fa-edit"></i>
					</a>
				</div>
				<?php //endforeach ?>
			</div> -->

		</div>

	</div>


	<div>
		
	</div>

<!-- 	<?php 
		

	

		








	 ?> -->












	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script src="datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="datepicker/local/bootstrap-datepicker.sr-latin.min.js"></script>
</body>
</html>