<?php
session_start();
require 'config/conexion.php';
include 'datosTabla.php';

if (!empty($_POST)) {
	$idE=$_SESSION['usuario']['ID_EMPRESA'];
	$id = $_POST['id'];
	$idP=$_POST['idP'];
	$idPr=$_POST['idPr'];
	$mensaje="";
	$sql = "DELETE FROM equipop where ID_EQUIPOP='$id'";
	$result = $conexion->query($sql);

	if ($result) {
		$mensaje="Se ha eliminado con exito";
		$contenido=obtenerDatos1($idPr);
		$sql1="UPDATE personal SET ESTADO='0' WHERE ID_PERSONAL='$idP'";
		$result1=$conexion->query($sql1);
		$contenido1=obtenerDatos2($idE);
		$contenido2=obtenerDatos4($idPr);
	} else {
 		$mensaje="No se puedo eliminar";
	}
	echo json_encode(array('mensaje'=>$mensaje,'contenido'=>$contenido,'personal'=>$contenido1,'responsable'=>$contenido2));
}
?>