<?php 
	require 'config/conexion.php';
	if (!empty($_POST)) {
		$mensaje="";
		$id=$conexion->real_escape_string($_POST['id']);
		$sql="SELECT ID_EQUIPO,ID_PROYECTO,TAREA,FECHA_I,FECHA_F from equipo_proyecto WHERE ID_EQUIPO='$id'";

		$resul=$conexion->query($sql);

		$dato=$resul->fetch_assoc();

		if ($resul) {
			$mensaje="Con exito";
		}else{
			$mensaje="Sin exito";
		}
		echo json_encode(array('mensaje'=>$mensaje,'contenido'=>$dato));
	}


 ?>