<?php
session_start();
require 'config/conexion.php';
include 'datosTabla.php';
$id = $_POST['id'];
$mensaje="";
$sql = "DELETE FROM proyecto where ID_PROYECTO='$id'";
$result = $conexion->query($sql);

if ($result) {
	$mensaje="Se ha eliminado con exito";
	$contenido=obtenerDatos();
} else {
 $mensaje="No se puedo eliminar";
}
echo json_encode(array('mensaje'=>$mensaje,'contenido'=>$contenido));
?>
