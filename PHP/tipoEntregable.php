<?php 
	require 'config/conexion.php';
	$sql="SELECT * FROM tipo_entregable";
	$resultado=$conexion->query($sql);
 ?>