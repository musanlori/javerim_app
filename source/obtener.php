<?php

if(!empty($_GET['id_sesion'])){
    //DB detalles de conexion
    $Host = 'localhost';
    $Username = 'root';
    $Password = '';
    $bdName = 'javerim';
    
    //Crear conexion y seleccioanr la base de datos
    $conexion = new mysqli($Host, $Username, $Password, $bdName);
    
    if ($conexion->connect_error) {
        die("No hay conexion con la database: " . $db->connect_error);
    }

   //Traer contenido de la base de datos
	$conn->set_charset("utf8");
    $query = $conn->query("SELECT clase.nombre_asig, sesiones.id_sesion, sesiones.dia_semana, sesiones.horario_sesion, sesiones.lugar_sesion FROM `sesiones` INNER JOIN asesor ON sesiones.id_asesor=asesor.id_asesor INNER JOIN clase ON sesiones.id_clase= clase.id_asig WHERE sesiones.id_sesion={$_GET['id_sesion']}");
    
    if($query->num_rows > 0){
        $r_unico = $query->fetch_assoc();
        echo '<h4>'.$contenido['titulo'].'</h4>';
        echo '<p>'.$contenido['contenido'].'</p>';
        echo '<b>Materia: </b>'.$r_unico['nombre_asig'].'<br>';
        echo '<b>Dia: </b>'.$r_unico['dia_semana'].'<br>';
        echo '<b>Hora: </b>'.$r_unico['horario_sesion'].'<br>';
        echo '<b>Lugar: </b>'.$r_unico['lugar_sesion'];
        echo '<b>id: </b>'.$r_unico['id_sesion'];
    }else{
        echo 'No hay contenido...';
    }
}else{
    echo 'No hay contenido...';
}

?>