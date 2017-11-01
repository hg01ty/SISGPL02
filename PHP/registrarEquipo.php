<?php 
	require 'config/conexion.php';
	include 'datosTabla.php';
	session_start();
	$idE=$_SESSION['usuario']['ID_EMPRESA'];
	$id=$conexion->real_escape_string($_POST['addPersona']);
	$idP=$conexion->real_escape_string($_POST['idProyecto']);
	$tarea=$conexion->real_escape_string($_POST['tarea']);
	$fechai=$conexion->real_escape_string($_POST['fechaI']);
	$fechaf=$conexion->real_escape_string($_POST['fechaF']);
	$dateRegistro = date("Y-m-d H:i:s");
	$mensaje="";
	$contenido="";
	$sql="INSERT INTO equipop(ID_PERSONAL,ID_PROYECTO,TAREA,FECHA_I,FECHA_F,FECHA_R) VALUES('$id','$idP','$tarea','$fechai','$fechaf','$dateRegistro')";
	$resultado=$conexion->query($sql);
	if ($resultado) {
		$mensaje="Se agrego con exito";
		$contenido1=obtenerDatos1($idP);
		$sql1="UPDATE personal SET ESTADO='1' WHERE ID_PERSONAL='$id'";
		$resultado1=$conexion->query($sql1);
		$contenido2=obtenerDatos2($idE);
		$contenido3=obtenerDatos4($idP);
		echo json_encode(array('mensaje'=>$mensaje,'contenido'=>$contenido1,'personal'=>$contenido2,'responsable'=>$contenido3));
	}else{
		$mensaje="No se pudo agregar";
		echo json_encode(array('mensaje'=>$mensaje));
	}
 ?>