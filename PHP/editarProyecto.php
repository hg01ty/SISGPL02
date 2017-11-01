<?php
session_start();
require 'config/conexion.php';
include 'datosTabla.php';
if (!empty($_POST)) {
	$mensaje="";
	$salida="";
	$id     = $_POST['mod_id'];
	$codigo = $_POST['mod_code'];
	$nombre = $_POST['mod_nombre'];
	$estado = $_POST['mod_estado'];
	$cate   = $_POST['mod_cate'];
	$fechai = $_POST['mod_fechai'];
	$fechaf = $_POST['mod_fechaf'];
	$monto  = $_POST['mod_monto'];
	$des    = $_POST['mod_des'];

$sql   = "UPDATE proyecto SET ID_ESTADO='$estado',ID_CATEGORIA_P='$cate',CODIGO_PROYECTO='$codigo',NOMBRE_PROYECTO='$nombre',DESCRIPCION_PROYECTO='$des',DATESTART='$fechai',DATEEND='$fechaf',MONTO='$monto' WHERE ID_PROYECTO='$id'";
$resul = $conexion->query($sql);

if ($resul) {
 $mensaje=1;
 $contenido=obtenerDatos();
} else {
 $mensaje="Error ala actualizar";
}
echo json_encode(array('mensaje'=>$mensaje,'contenido'=>$contenido));
}

?>