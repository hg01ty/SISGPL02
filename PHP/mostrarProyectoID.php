<?php
require 'config/conexion.php';
if (!empty($_POST)) {
	$mesaje="";
$id        = $_POST['id'];
$sql       = "SELECT ID_PROYECTO,CODIGO_PROYECTO,NOMBRE_PROYECTO,(SELECT DESCRIPCION FROM estado_proyecto WHERE estado_proyecto.ID_ESTADO=proyecto.ID_ESTADO) AS ESTADO,(SELECT DESCRIPCION FROM categoria_proyecto WHERE categoria_proyecto.ID_CATEGORIA_P=proyecto.ID_CATEGORIA_P) AS CATEGORIA,DESCRIPCION_PROYECTO,DATESTART,DATEEND,DATEENDFAKE,MONTO FROM proyecto WHERE ID_PROYECTO='$id'";
$proyectos = $conexion->query($sql);
$dato=$proyectos->fetch_assoc();

if ($proyectos) {
	$mensaje="Con exito!";
} else {
 	$mensaje= "Sin exito";
}
 echo json_encode(array('mensaje'=>$mensaje,'contenido'=>$dato));
}
?>