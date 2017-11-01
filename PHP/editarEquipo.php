<?php 
	require 'config/conexion.php';
	include 'datosTabla.php';
	if (!empty($_POST)) {
		$mensaje="";
		$idEquipo=$conexion->real_escape_string($_POST['idEquipo']);
		$idProyecto=$conexion->real_escape_string($_POST['idPro']);
		$tarea=$conexion->real_escape_string($_POST['tareaE']);
		$fechai=$conexion->real_escape_string($_POST['fechaEI']);
		$fechaf=$conexion->real_escape_string($_POST['fechaEF']);
		$dateMod=date("Y-m-d H:i:s");
		$contenido="";

		$sql="UPDATE equipop SET TAREA='$tarea',FECHA_I='$fechai',FECHA_F='$fechaf',FECHA_MOD='$dateMod' where ID_EQUIPO='$idEquipo'";
		$resul=$conexion->query($sql);

		if ($resul) {
			$mensaje=1;
			$contenido=obtenerDatos1($idProyecto);
		}else{
			$mensaje="no se actualizo";
		}
		echo json_encode(array('mensaje'=>$mensaje,'contenido'=>$contenido));
	}

 ?>