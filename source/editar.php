<?php 
	// echo 'editar.php?id=1&tema=Sistemas&dia=lunes&hora=12:00&lugar=Cloud';
	// echo '<br>';

	$id = $_GET['id'];
	$tema = $_GET['tema'];
	$dia = $_GET['dia'];
	$hora = $_GET['hora'];
	$lugar = $_GET['lugar'];

	echo $id;
	echo '<br>';
	echo $tema;
	echo '<br>';
	echo $dia;
	echo '<br>';
	echo $hora;
	echo '<br>';
	echo $lugar;
	echo '<br>';

	include_once 'conexion.php';

	$sql_editar = 'UPDATE agenda SET tema=?, dia=?, hora=?, lugar=? WHERE id=?';
	$sentencia_editar= $pdo->prepare($sql_editar);
	$sentencia_editar->execute(array($tema, $dia, $hora, $lugar, $id));
	header('location:Adm.php');

 ?>