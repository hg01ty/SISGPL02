<?php 
	require 'config/conexion.php';
	$id=$_SESSION['usuario']['ID_EMPRESA'];
	$sql="SELECT ID_PERSONAL,CONCAT(NOMBRE_PERSONAL,'',APELLIDO_PERSONAL) AS NOMBRE_COMPLETO FROM personal WHERE ID_EMPRESA='$id' and ESTADO='0'";
	$res=$conexion->query($sql);
 ?>