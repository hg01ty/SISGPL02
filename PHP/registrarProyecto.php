<?php
session_start();
/*if (isset($_SESSION['usuario'])) {
echo "HAY SESSION" . $_SESSION['usuario']['ID_EMPRESA'] . $_SESSION['usuario']['USUARIO'];
} else {
echo "NO hay session";
}*/
require 'config/conexion.php';
include 'datosTabla.php';

if (!empty($_POST)) {
	$idEmpresa = $_SESSION['usuario']['ID_EMPRESA'];
	$codigo    = $_POST['codigo'];
	$nombre    = $_POST['name'];
	//$responsable  = $_POST['responsable'];
	$categoria    = $_POST['cate'];
	$dateI        = $_POST['dateI'];
	$dateF        = $_POST['dateF'];
	$monto        = $_POST['monto'];
	$descripcion  = $_POST['descripcion'];
	$dateRegistro = date("Y-m-d H:i:s");
	$salida="";
	$mensaje="";

	$insertar = "INSERT INTO proyecto(ID_ESTADO,ID_EMPRESA,ID_CATEGORIA_P,NOMBRE_PROYECTO,CODIGO_PROYECTO,DESCRIPCION_PROYECTO,DATESTART,DATEEND,DATEENDFAKE,MONTO,FECHA_REGISTRO_P)
	VALUES(1,'$idEmpresa','$categoria','$nombre','$codigo','$descripcion','$dateI','$dateF',null,'$monto','$dateRegistro')";

	$result= $conexion->query($insertar);

	if ($result) {
		$mensaje=1;
		$salida="";
		$contenido=obtenerDatos();
	} else {
		$mensaje=0;
	}
	echo json_encode(array('mensaje'=>$mensaje,'contenido'=>$contenido));
}
?>

